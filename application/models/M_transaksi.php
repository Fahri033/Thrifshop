<!-- MODEL Transaksi - PELANGGAN-->
<!-- Model digunakan untuk mengambil data dan informasi yang ada di database -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function simpan_transaksi($data)
	{
		$this->db->insert('tbl_transaksi', $data);
	}

	public function simpan_rinci_transaksi($data_rinci)
	{
		$this->db->insert('tbl_rinci_transaksi', $data_rinci);
	}

	// v_pesanan_saya
	public function belum_bayar()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));//Filter pesanan dari pelanggan lain
		$this->db->where('status_order=0');//Filter pesanan yang sudah di verifikasi atau di proses admin
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}
	// v_pesanan_saya
	public function diproses()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));//Filter pesanan dari pelanggan lain
		$this->db->where('status_order=1');//Filter pesanan yang sudah di verifikasi atau di proses admin
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	public function dikirim()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));//Filter pesanan dari pelanggan lain
		$this->db->where('status_order=2');//Filter pesanan yang sudah di verifikasi atau di proses admin
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	// v_pesanan saya 
	public function selesai()
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));//Filter pesanan dari pelanggan lain
		$this->db->where('status_order=3');//Filter pesanan yang sudah di verifikasi atau di proses admin
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get()->result();
	}

	// v_bayar - Pembayaran
	public function detail_pesanan($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get()->row();
	}	
	// v_bayar
	//public function rekening()
	//{
		//$this->db->select('*');
		//$this->db->from('tbl_rekening');
		//return $this->db->get()->result();
	//}
	// v_bayar
	public function upload_buktibayar($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('tbl_transaksi', $data);
	}
}