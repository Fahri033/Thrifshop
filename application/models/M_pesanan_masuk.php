<!-- MODEL Pesanan Masuk - ADMIN-->
<!-- Model digunakan untuk mengambil data dan informasi yang ada di database -->
<!-- Controller Admin -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan_masuk extends CI_Model {

	// PASANAN MASUK - pesanan masuk
	public function pesanan()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('status_order=0');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	// HAPUS - v_pesanan_masuk
	public function delete_transaksi($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('tbl_transaksi', $data);
	}
	// PASANAN MASUK - pesanan masuk
	public function pesanan_diproses()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('status_order=1');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	// PASANAN MASUK - diproses - dikirim
	public function pesanan_dikirim()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('status_order=2');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	// PASANAN MASUK - dikirim - selesai
	public function pesanan_selesai()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('status_order=3');
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	// PASANAN MASUK - pesanan masuk - diproses
	public function update_order($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('tbl_transaksi', $data);
	}


	// RINCIAN PESANAN - v_rincian_pesanan_masuk
	public function rincian_pesanan_masuk()
	{
		$this->db->select('*');
		$this->db->from('tbl_rinci_transaksi');
		$this->db->join('tbl_transaksi','tbl_transaksi.no_order = tbl_rinci_transaksi.no_order','left');
		$this->db->join('tbl_barang','tbl_barang.id_barang = tbl_rinci_transaksi.id_barang','left');
		$this->db->where('status_bayar=1');
		return $this->db->get()->result();
	}
	// HAPUS - v_rincian_pesanan_masuk
	//public function delete($data)
	//{
		//$this->db->where('id_rinci', $data['id_rinci']);
		//$this->db->delete('tbl_rinci_transaksi', $data);
	//}

}