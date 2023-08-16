<!-- BAGIAN CONTROLL -
	v_nav_backend, 
	v_laporan(Laporan),
	v_lap_harian(Laporan Harian),
	v_lap_bulanan(Laporan Bulanan),
	v_lap_tahunan(Laporan Tahunan),
	m_laporan - ADMIN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
	}
	
	// v_laporan - LAPORAN
	public function index()
	{
		$data = array(
			'title' => 'Laporan',
			'isi' => 'v_laporan',
		);	
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
	// v_lap_harian - LAPORAN HARIAN
	public function lap_harian()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Harian',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_harian($tanggal, $bulan, $tahun),
			'isi' => 'v_lap_harian',
		);	
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
	// v_lap_bulanan - LAPORAN BULANAN
	public function lap_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Bulanan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_bulanan($bulan, $tahun),
			'isi' => 'v_lap_bulanan',
		);	
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
	// v_lap_tahunan - LAPORAN TAHUNAN
	public function lap_tahunan()
	{
		$tahun = $this->input->post('tahun');

		$data = array(
			'title' => 'Laporan Tahunan',
			'tahun' => $tahun,
			'laporan' => $this->m_laporan->lap_tahunan($tahun),
			'isi' => 'v_lap_tahunan',
		);	
		$this->load->view('layout/v_wrapper_backend', $data, FALSE);
	}
}