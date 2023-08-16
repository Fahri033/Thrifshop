<!-- BAGIAN CONTROLL -
	v_nav_frontend, 
	v_home(Home), 
	v_kategoribarang(Kategori - Hoodie,Sweater,Kaos), 
	v_detailbarang(Detail Barang), 
	M_home - PELANGGAN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
	}

	// v_home - HOME (HALAMAN UTAMA)
	public function index()
	{
		$data = array(
			'title' => 'Home',
			'barang' => $this->m_home->get_all_data(),
			'isi' => 'v_home',
		);
		$this->load->view('layout/v_wrapper_frontend', $data , FALSE);
	}

	// v_kategoribarang - KATEGORI
	public function kategori($id_kategori)
	{
		$kategori = $this->m_home->kategori($id_kategori);
		$data = array(
			'title' => 'Kategori '. $kategori->nama_kategori,
			'barang' => $this->m_home->get_all_data_barang($id_kategori),
			'isi' => 'v_kategoribarang',
		);
		$this->load->view('layout/v_wrapper_frontend', $data , FALSE);
	}

	// v_detailbarang - DETAIL BARANG
	public function detail_barang($id_barang)
	{
		$data = array(
			'title' => 'Detail Barang',
			'gambar' => $this->m_home->gambar_barang($id_barang),
			'barang' => $this->m_home->detail_barang($id_barang),
			'isi' => 'v_detailbarang',
		);
		$this->load->view('layout/v_wrapper_frontend', $data , FALSE);
	}
}

?>