<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Produk');
	}

	public function index()
	{
		$data = [
			'hal' => 'Produk'
		];

		$this->load->view('header', $data);
		$this->load->view('produk');
		$this->load->view('footer');
	}

	
}
