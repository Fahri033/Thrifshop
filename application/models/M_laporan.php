<!-- MODEL - ADMIN -->
<!-- Model digunakan untuk mengambil data dan informasi yang ada di database -->
<!-- Controller Laporan -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model 
{
	public function lap_harian($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_rinci_transaksi');
		$this->db->join('tbl_transaksi','tbl_transaksi.no_order = tbl_rinci_transaksi.no_order','left');
		$this->db->join('tbl_barang','tbl_barang.id_barang = tbl_rinci_transaksi.id_barang','left');
		$this->db->where('DAY(tbl_transaksi.tgl_order)', $tanggal);
		$this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
		$this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
		$this->db->where('status_bayar=1'); //pelanggan yang sudah membayar
		return $this->db->get()->result();
	}

	public function lap_bulanan($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_rinci_transaksi');
		$this->db->join('tbl_transaksi','tbl_transaksi.no_order = tbl_rinci_transaksi.no_order','left');
		$this->db->join('tbl_barang','tbl_barang.id_barang = tbl_rinci_transaksi.id_barang','left');
		$this->db->where('MONTH(tbl_transaksi.tgl_order)', $bulan);
		$this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
		$this->db->where('status_bayar=1'); //pelanggan yang sudah membayar
		return $this->db->get()->result();
	}

	public function lap_tahunan($tahun)
	{
		$this->db->select('*');
		$this->db->from('tbl_transaksi');
		$this->db->where('YEAR(tbl_transaksi.tgl_order)', $tahun);
		$this->db->where('status_bayar=1'); //pelanggan yang sudah membayar
		return $this->db->get()->result();
	}
}