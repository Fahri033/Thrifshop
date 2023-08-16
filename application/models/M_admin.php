<!-- MODEL - ADMIN-->
<!-- Model digunakan untuk mengambil data dan informasi yang ada di database -->
<!-- Controller Admin -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	// v_admin/Dashboard
	public function total_barang()
	{
		return $this->db->get('tbl_barang')->num_rows();
	}
	// v_admin/Dashboard
	public function total_kategori()
	{
		return $this->db->get('tbl_kategori')->num_rows();
	}
	// v_admin/Dashboard
	public function total_pelanggan()
	{
		return $this->db->get('tbl_pelanggan')->num_rows();
	}
	// v_admin/Dashboard
	public function total_pesanan()
	{
		return $this->db->get('tbl_transaksi')->num_rows();
	}
	
	
	// v_setting
	public function data_setting()
	{
		$this->db->select('*');
		$this->db->from('tbl_setting');
		$this->db->where('id', 1);
		return $this->db->get()->row();
	}
	// v_setting
	public function edit($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('tbl_setting', $data);
	}

}
