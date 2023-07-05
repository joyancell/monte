<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angka_random extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['nama'])) {
			redirect('login');
		}
		$this->load->model('M_angka_random');
	}

	public function index()
	{
		$data = [
			'hal' => 'Angka Random',
			'angka' => $this->M_angka_random->get_data()
		];

		$this->load->view('header', $data);
		$this->load->view('angka_random');
		$this->load->view('footer');
	}

	public function cek_nilai()
	{
		$this->db->query(" TRUNCATE bilangan_acak ");
		$a = $this->input->post('a');
		$c = $this->input->post('c');
		$m = $this->input->post('m');
		$z = $this->input->post('z');
		$zz = [$z];
		$zbaru = $z;
		for ($i=0; $i < 12; $i++) { 
			$bangkit = $a * $zbaru + $c;
			$zbaru = $bangkit % $m;	
			array_push($zz, $zbaru);
		}
		unset($zz[0]);

		foreach ($zz as $key => $value) {
			$data = [
				'nilai' => $value,
				'tahun' => '2022',
			];
			$this->db->insert('bilangan_acak', $data);
			$this->db->query(" TRUNCATE hasil ");
		}

		if ($c < $m){
			$terkecil = $c;
		}else{
			$terkecil = $m;
		}
		$i = $terkecil;
		while($c%$i != 0 || $m%$i != 0){
			$i--;
		}

		if ($i == 1) {
			$datax = [
				'angka' => $this->M_angka_random->get_data()
			];
		  	$this->load->view('hasil_perhitungan', $datax);
		} else {
		  	echo "1";
		}
		  
		// echo "FPB dari $c dan $m adalah $i";
	}

	
}
