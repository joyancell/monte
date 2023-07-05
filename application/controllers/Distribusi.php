<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['nama'])) {
			redirect('login');
		}
		$this->load->model('M_distribusi');
	}

	public function index()
	{
		// $this->db->query(" TRUNCATE distribusi ");
		$data = [
			'hal' => 'Persediaan',
			
		];

		$this->load->view('header', $data);
		$this->load->view('distribusi');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$data = [
			'hal' => 'Persediaan'
		];

		// $this->db->query(" TRUNCATE distribusi ");
		$this->load->view('header', $data);
		$this->load->view('tambah_distribusi');
		$this->load->view('footer');
	}

	public function simpan()
	{
		$frekuensi = $this->input->post('frekuensi');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$golongan = $this->input->post('golongan');
		$cek = $this->M_distribusi->cek_data($tahun, $golongan);
		if ($cek > 0) {
			$where = [
				'tahun' => $tahun,
				'golongan' => $golongan,
			];
			$this->db->delete('distribusi', $where);
		}
		$jumlah = count($frekuensi);
		$kumu = 0;
		for ($i=0; $i < $jumlah ; $i++) { 
			
			$data = [
				'bulan' => $bulan[$i],
				'tahun' => $tahun,
				'golongan' => $golongan,
				'frekuensi' => $frekuensi[$i],
				'dis_probabilitas' => 0,
				'dis_kumulatif' => 0,
				'interval_awal' => 0,
				'interval_akhir' => 0
			];
			$this->db->insert('distribusi', $data);
		}
		$total = $this->M_distribusi->get_total($tahun, $golongan);
		for ($j=0; $j < $jumlah ; $j++) {
			$proba = $frekuensi[$j]/$total;
            $kumu += $proba; 
            $awal = $kumu == $proba ? 0 : floor(($kumu - $proba + 0.01) * 100);
            $akhir = floor($kumu * 100);
            $akh = $akhir == 99 ? 100 : $akhir;
			$data = [
				'dis_probabilitas' => $proba,
				'dis_kumulatif' => $kumu,
				'interval_awal' => $awal,
				'interval_akhir' => $akh
			];
			$this->db->where('bulan', $bulan[$j]);
			$this->db->where('tahun', $tahun);
			$this->db->where('golongan', $golongan);
			$this->db->update('distribusi', $data);
		}
		redirect('distribusi');
	}

	public function hasil_distribusi()
	{
		$data = [
			'hal' => 'Persediaan',
			'distribusi' => $this->M_distribusi->get_data(),
			'total' => $this->M_distribusi->get_total()
		];

		$this->load->view('header', $data);
		$this->load->view('hasil_distribusi');
		$this->load->view('footer');
	}

	public function filter()
	{
		$tahun = $this->input->post('tahun');
		$golongan = $this->input->post('golongan');
		$data = [
			'distribusi' => $this->M_distribusi->get_data($tahun, $golongan),
			'total' => $this->M_distribusi->cek_data($tahun, $golongan),
			'tahun' => $tahun,
			'golongan' => $golongan,
		];
		$this->load->view('hasil_distribusi', $data);
		
	}

	public function edit($golongan, $tahun)
	{
		$data = [
			'hal' => 'Persediaan',
			'distribusi' => $this->M_distribusi->get_data($tahun, $golongan),
		];

		$this->load->view('header', $data);
		$this->load->view('edit_distribusi', $data);
		$this->load->view('footer');
	}

	public function update()
	{
		$frekuensi = $this->input->post('frekuensi');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$golongan = $this->input->post('golongan');
		$tahun_lama = $this->input->post('tahun_lama');
		$golongan_lama = $this->input->post('golongan_lama');
		
			$where = [
				'tahun' => $tahun_lama,
				'golongan' => $golongan_lama,
			];
			$this->db->delete('distribusi', $where);
		
		$jumlah = count($frekuensi);
		$kumu = 0;
		for ($i=0; $i < $jumlah ; $i++) { 
			
			$data = [
				'bulan' => $bulan[$i],
				'tahun' => $tahun,
				'golongan' => $golongan,
				'frekuensi' => $frekuensi[$i],
				'dis_probabilitas' => 0,
				'dis_kumulatif' => 0,
				'interval_awal' => 0,
				'interval_akhir' => 0
			];
			$this->db->insert('distribusi', $data);
		}
		$total = $this->M_distribusi->get_total($tahun, $golongan);
		for ($j=0; $j < $jumlah ; $j++) {
			$proba = $frekuensi[$j]/$total;
            $kumu += $proba; 
            $awal = $kumu == $proba ? 0 : ($kumu - $proba + 0.01) * 100;
            $akhir = $kumu * 100;
			$data = [
				'dis_probabilitas' => $proba,
				'dis_kumulatif' => $kumu,
				'interval_awal' => $awal,
				'interval_akhir' => $akhir
			];
			$this->db->where('bulan', $bulan[$j]);
			$this->db->where('tahun', $tahun);
			$this->db->update('distribusi', $data);
		}
		redirect('distribusi');
	}
}
