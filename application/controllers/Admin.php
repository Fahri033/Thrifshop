<!-- BAGIAN CONTROLL - 
	v_nav_backend, 
	v_admin(Dashboard), 
	v_setting(Setting), 
	v_pesanan_masuk(Pesanan Masuk), 
	v_rincian_pesanan_masuk(Rincian Pesanan), 
	m-admin, 
	m_pesanan_masuk - ADMIN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->model('m_pesanan_masuk');
	}

	// v_admin - Dashboard
	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'total_barang' => $this->m_admin->total_barang(),
			'total_kategori' => $this->m_admin->total_kategori(),
			'total_pelanggan' => $this->m_admin->total_pelanggan(),
			'total_pesanan' => $this->m_admin->total_pesanan(),
			'isi' => 'v_admin',
		);	
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}


	// v_setting - Setting
	public function setting()
	{
		$this->form_validation->set_rules('nama_toko','Nama Toko','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('kota','Kota','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('alamat_toko','Alamat Toko','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('no_telpon','No Telpon','required', array('required' => '%s Harus Diisi !!!')
		);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
			'title' => 'Setting',
			'setting' => $this->m_admin->data_setting(),
			'isi' => 'v_setting',
			);	
			$this->load->view('layout/v_wrapper_backend', $data, FALSE);
		} else {
			$data = array(
				'id' => 1,
				'lokasi' => $this->input->post('kota'),
				'nama_toko' => $this->input->post('nama_toko'),
				'alamat_toko' => $this->input->post('alamat_toko'),
				'no_telpon' => $this->input->post('no_telpon'),
			);
			$this->m_admin->edit($data);
			$this->session->set_flashdata('pesan', 'Berhasil di Ganti !');
			redirect('admin/setting');
		}
	}
	
	
	// v_pesanan_masuk - Pesanan Masuk, diproses, dikirim, selesai
	public function pesanan_masuk()
	{
		$data = array(
			'title' => 'Pesanan Masuk',
			'pesanan' => $this->m_pesanan_masuk->pesanan(),
			'pesanan_diproses' => $this->m_pesanan_masuk->pesanan_diproses(),
			'pesanan_dikirim' => $this->m_pesanan_masuk->pesanan_dikirim(),
			'pesanan_selesai' => $this->m_pesanan_masuk->pesanan_selesai(),
			'isi' => 'v_pesanan_masuk',
		);	
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
	// v_pesanan_masuk Hapus
	public function delete_transaksi( $id_transaksi = NULL )
	{
		$data = array('id_transaksi' => $id_transaksi );
		$this->m_pesanan_masuk->delete_transaksi($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
		redirect('admin/pesanan_masuk');
	}
	// v_pesanan_masuk - diproses
	public function proses($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '1',
		);	
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Di Proses !');
		redirect('admin/pesanan_masuk');
	}
	// v_pesanan_masuk - dikirim
	public function kirim($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'no_resi' => $this->input->post('no_resi'),
			'status_order' => '2',
		);	
		$this->m_pesanan_masuk->update_order($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Di Kirim !');
		redirect('admin/pesanan_masuk');
	}


	// v_rincian_pesanan_masuk - Rincian Pesanan
	public function rincian_pesanan_masuk()
	{
		$data = array(
			'title' => 'Rincian Pesanan',
			'rincian' => $this->m_pesanan_masuk->rincian_pesanan_masuk(),
			'isi' => 'v_rincian_pesanan_masuk',
		);	
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
	// v_rincian_pesanan_masuk Delete
	//public function delete( $id_rinci = NULL )
	//{
		//$data = array('id_rinci' => $id_rinci );
		//$this->m_pesanan_masuk->delete($data);
		//$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
		//redirect('admin/rincian_pesanan_masuk');
	//}
} 

?>