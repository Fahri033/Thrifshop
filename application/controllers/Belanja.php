<!-- BAGIAN CONTROLL -
	v_nav_frontend, 
	v_belanja(Keranjang Belanja), 
	v_cekout(Check Out Belanja), 
	m_transaksi - PELANGGAN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_transaksi');
	}

	// v_belanja - KERANJANG BELANJA 
	public function index() 
	{
		//proteksi halaman
		$this->pelanggan_login->proteksi_halaman();
		// Saat data barang di keranjang dihapus semua akan otomatis kembali ke halaman utama
		if (empty($this->cart->contents())) {
			redirect('home');
		}
		$data = array(
			'title' => 'Keranjang Belanja',
			//'barang' => $this->m_home->get_all_data(),
			'isi' => 'v_belanja',
		);
		$this->load->view('layout/v_wrapper_frontend', $data , FALSE);
	}

	// Lihat Keranjang v_nav_frontend, v_belanja
	public function add() 
	{
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('name'),
			
		);
		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}

	// Delete v_belanja hapus data yang dipilih
	public function delete($rowid) 
	{
		$this->cart->remove($rowid);
		redirect('belanja');
	}

	// Update v_belanja data apabila barang lebih dari satu ! - Update
	public function update() 
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty'   => $this->input->post($i. '[qty]'),
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('belanja');
	}

	// Hapus semua data v_belanja - Clear
	public function clear() 
	{
		$this->cart->destroy();
		redirect('belanja');
	}

	// v_cekout - CEK OUT BELANJA 
	public function cekout() 
	{
		//proteksi halaman
		$this->pelanggan_login->proteksi_halaman();
		// notifikasi apabila provinsi belum di isi
		$this->form_validation->set_rules('provinsi','Tujuan Pengiriman','required', array('required' => '%s Harus Diisi !!!')
		);

		if ($this->form_validation->run() == FALSE) {
				$data = array(
				'title' => 'Check Out Belanja',
				//'barang' => $this->m_home->get_all_data(),
				'isi' => 'v_cekout',
			);
			$this->load->view('layout/v_wrapper_frontend', $data , FALSE);
		} else { 
			// Simpan ke tabel transaksi
			$data = array(
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'no_order' => $this->input->post('no_order'),
				'tgl_order' => date('Y-m-d'),
				'nama_penerima' => $this->input->post('nama_penerima'),
				'telepon_penerima' => $this->input->post('telepon_penerima'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota'),
				'alamat' => $this->input->post('alamat'),
				'kode_pos' => $this->input->post('kode_pos'),
				'expedisi' => $this->input->post('expedisi'),
				'paket' => $this->input->post('paket'),
				'estimasi' => $this->input->post('estimasi'),
				'ongkir' => $this->input->post('ongkir'),
				'berat' => $this->input->post('berat'),
				'grand_total' => $this->input->post('grand_total'),
				'total_bayar' => $this->input->post('total_bayar'),
				'status_bayar' => '0',
				'status_order' => '0',
			);
			$this->m_transaksi->simpan_transaksi($data);

			// Simpan ke tabel rinci transaksi
			$i = 1;
			foreach ($this->cart->contents() as $items) {
				$data_rinci = array(
					'no_order' => $this->input->post('no_order'),  
					'id_barang' => $items['id'],
					'qty' => $this->input->post('qty'. $i++), 
				);
				$this->m_transaksi->simpan_rinci_transaksi($data_rinci);
			}
			$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !');
			$this->cart->destroy(); // menghapus data keranjang apabila sudah chekout
			redirect('pesanan_saya');
		}
	}

} ?>