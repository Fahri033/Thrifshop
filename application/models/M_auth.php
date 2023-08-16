<!-- MODEL LOGIN USER -->
<!-- Model digunakan untuk mengambil data dan informasi yang ada di database -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	// User
	public function login_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}
    
    // Pelanggan
	public function login_pelanggan($email, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where(array(
			'email' => $email,
			'password' => $password
		));
		return $this->db->get()->row();
	}
}