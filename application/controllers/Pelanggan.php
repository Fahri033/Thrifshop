<!-- BAGIAN CONTROLL REGISTER & LOGIN PELANGGAN - 
	v_nav_frontend, 
	v_register(Daftar Pelanggan), 
	v_login_pelanggan(Login), 
	v_akun_saya(Akun Saya), 
	m_pelanggan, 
	m_auth -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pelanggan');
		$this->load->model('m_auth');
	}

	// v_register - DAFTAR PELANGGAN
	public function register()
	{
		$this->form_validation->set_rules('nama_pelanggan','nama_pelanggan','required', array('required' => '%s Harus Diisi !!!')
		);

		$this->form_validation->set_rules('email','E-mail','required', array('required|is_unique[tbl_pelanggan.email]' => '%s Harus Diisi !!', 'is_unique' => '%s Email Ini Sudah Terdaftar !!')
		);

		$this->form_validation->set_rules('password','password','required', array('required' => '%s Harus Diisi !!')
		);

		$this->form_validation->set_rules('ulangi_password','Ulangi Password','required|matches[password]', array('required' => '%s Harus Diisi !!', 
			'matches' => '%s Password Tidak Sama !!')
		);

		if ($this->form_validation->run() == FALSE) {
			$data = array(
			'title' => 'Daftar Pelanggan',
			'isi' => 'v_register',
		);	
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);

		} else{
			$data = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$this->m_pelanggan->register($data);
			$this->session->set_flashdata('pesan', 'Akun Berhasil Dibuat !');
			redirect('pelanggan/register');
		}
	}

	// v_login_pelanggan - LOGIN
	public function login()
	{
		$this->form_validation->set_rules('email', 'E-mail', 'required', array('required' => '%s Harus Diisi !!!'));

		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi !!!'));

		if ($this->form_validation->run() == TRUE) 
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->pelanggan_login->login($email, $password);
		} 
		$data = array(
			'title' => 'Login',
			'isi' => 'v_login_pelanggan',
		);	
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}

	// v_nav_frontend - Logout
    public function logout()
	{
		$this->pelanggan_login->logout();
	}

	// v_akun_saya
	public function akun()
	{
		//proteksi halaman
		$this->pelanggan_login->proteksi_halaman();

		$data = array(
			'title' => 'Akun Saya',
			'akun' => $this->m_pelanggan->akun(),
			'isi' => 'v_akun_saya',
		);	
		$this->load->view('layout/v_wrapper_frontend', $data, FALSE);
	}
}