<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['nama'])) {
			redirect('login');
		}
	}
	public function index()
	{
		$data = [
			'hal' => 'home'
		];
		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
