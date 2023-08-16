<!-- BAGIAN CONTROLL - 
	v_login_user(Login User), 
	v_nav_backend - LOGIN USER Atau ADMIN -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	// v_login_user
	public function login_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Harus Diisi !!!'));

		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi !!!'));

		if ($this->form_validation->run() == TRUE) 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->user_login->login($username, $password);
		} 
		$data = array(
			'title' => 'Login User',
		);
		$this->load->view('v_login_user', $data , FALSE);
    }
    
    // v_nav_backend - LogOut
    public function logout_user()
	{
		$this->user_login->logout();
	}
}