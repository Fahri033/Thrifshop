<!-- BAGIAN CONTROLL -
	v_nav_backend, 
	v_data_pelanggan(Data Pelanggan), 
	m_data_pelanggan - ADMIN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_pelanggan');
	}

	// v_data_pelanggan - DATA PELANGGAN
	public function index($offset = 0)
	{
		$data = array(
			'title' => 'Data Pelanggan',
			'pelanggan' => $this->m_data_pelanggan->get_all_data(),
			'isi' => 'v_data_pelanggan'
		);
		$this->load->view('layout/v_wrapper_backend', $data , FALSE);
	}
	// v_data_pelanggan - Tambah
	public function add()
	{
		$data = array(
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		$this->m_data_pelanggan->add($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !');
		redirect('datapelanggan');
	}
	// v_data_pelanggan - Edit
	public function edit( $id_pelanggan = NULL )
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		$this->m_data_pelanggan->edit($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !');
		redirect('datapelanggan');
	}
	// v_data_pelanggan - Delete
	public function delete( $id_pelanggan = NULL )
	{
		$data = array('id_pelanggan' => $id_pelanggan );
		$this->m_data_pelanggan->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !');
		redirect('datapelanggan');
	}
} 

?>