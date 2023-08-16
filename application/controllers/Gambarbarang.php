<!-- BAGIAN CONTROLL -
	v_nav_backend, 
	v_gambarbarang(Gambar Barang), 
	v_add(Add Gambar Barang),
	m_gambarbarang,
	m_barang - ADMIN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambarbarang extends CI_Controller 
{
	// Bagian Mengaitkan database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_gambarbarang');
		$this->load->model('m_barang');
		
	}
	// Gambar Barang - v_gambarbarang
	public function index()
	{
		$data = array(
			'title' => 'Gambar Barang',
			'gambarbarang' => $this->m_gambarbarang->get_all_data(),
			'isi' => 'gambarbarang/v_gambarbarang',
		);
		$this->load->view('layout/v_wrapper_backend', $data , FALSE);
	}
	// ADD GAMBAR BARANG - v_add
	public function add($id_barang)
	{
		$this->form_validation->set_rules('ket','Ket Gambar','required', array('required' => '%s Harus Diisi !!!')
		);

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']   = './assets/gambarbarang';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|ico';
			$config['max_size']      = '10000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) 
			{
				$data = array(
					'title' => 'Add Gambar Barang',
					'error_upload' => $this->upload->display_errors(),
					'barang' => $this->m_barang->get_data($id_barang),
					'gambar' => $this->m_gambarbarang->get_gambar($id_barang),
					'isi' => 'gambarbarang/v_add',
				);
				$this->load->view('layout/v_wrapper_backend', $data , FALSE);

			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library']   = 'gd2';
				$config['source_image']   = './assets/gambarbarang/'.$upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang' => $id_barang,
					'ket' => $this->input->post('ket'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_gambarbarang->add($data);
				$this->session->set_flashdata('pesan', 'Gambar Berhasil Ditambahkan !');
				redirect('gambarbarang/add/'.$id_barang);
			}
		}

		$data = array(
			'title' => 'Add Gambar Barang',
			'barang' => $this->m_barang->get_data($id_barang),
			'gambar' => $this->m_gambarbarang->get_gambar($id_barang),
			'isi' => 'gambarbarang/v_add',
		);
		$this->load->view('layout/v_wrapper_backend', $data , FALSE);
	}
	// ADD GAMBAR BARANG - v_add - delete
	public function delete($id_barang, $id_gambar)
	{
		//Hapus gambar beserta filenya di assets/gambar
		$gambar = $this->m_gambarbarang->get_data($id_gambar);
		if ($gambar->gambar != "") 
		{
			unlink('./assets/gambarbarang/'. $gambar->gambar);
		}
		// Delete
		$data = array('id_gambar' => $id_gambar);
		$this->m_gambarbarang->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
		redirect('gambarbarang/add/'. $id_barang);
	}
}
