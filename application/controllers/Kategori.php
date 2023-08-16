<!-- BAGIAN CONTROLL -
	v_nav_backend, 
	v_kategori(Kategori), 
	m_kategori - ADMIN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori');
	}

	// v_kategori - KATEGORi
	public function index()
	{
		$data = array(
			'title' => 'Kategori',
			'kategori' => $this->m_kategori->get_all_data(),
			'isi' => 'v_kategori',
		);
		$this->load->view('layout/v_wrapper_backend', $data , FALSE);
	}
	// v_kategori - Tambah
	public function add()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
		);
		$this->m_kategori->add($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !');
		redirect('kategori');
	}
	// v_kategori - Edit
	public function edit( $id_kategori = NULL )
	{
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_kategori' => $this->input->post('nama_kategori')
		);
		$this->m_kategori->edit($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
		redirect('kategori');
	}
	// Delete
	public function delete( $id_kategori = NULL )
	{
		$data = array('id_kategori' => $id_kategori );
		$this->m_kategori->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
		redirect('kategori');
	}
} 

?>