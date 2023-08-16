<!-- MODEL REGISTER -->
<!-- Model digunakan untuk mengambil data dan informasi yang ada di database -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model 
{
	// Daftar
	public function register($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
	}

	public function akun()
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));//Filter dari pelanggan lain
		return $this->db->get()->result();
	}

}