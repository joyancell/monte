<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (isset($_SESSION['nama'])) {
			redirect('./');
		}
		$this->load->model('M_login');
	}
	public function index()
	{
		$data = [
			'hal' => 'login'
		];
		$this->load->view('login');
		
	}

	public function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cekuser = $this->M_login->cekusername($username);
		if ($cekuser > 0) {
			$cekpass = $this->M_login->cekpass($username, $password);
			if ($cekpass == 1) {
				$getuser = $this->M_login->get_data($username, $password);
				$newdata = [
					'id'        => $getuser->id_admin,
					'nama'      => $getuser->nama,
					'username'  => $getuser->username,
					
					'logged_in' => TRUE
				];
				$this->session->set_userdata($newdata);
				echo "ok";
			} else {
				echo 'pass';
			}
			
		} else {
			echo 'user';
		}
		
	}
}
