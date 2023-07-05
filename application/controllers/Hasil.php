<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['nama'])) {
			redirect('login');
		}
		$this->load->model('M_angka_random');
		$this->load->model('M_distribusi');
		$this->load->model('M_permintaan');
	}

	public function index()
	{
		// $this->db->query(" TRUNCATE distribusi ");
		$data = [
			'hal' => 'Hasil Perhitungan',
			'angka' => $this->M_angka_random->get_data()
		];

		$this->load->view('header', $data);
		$this->load->view('hasil');
		$this->load->view('footer');
	}

	public function hitung()
	{
		$distribusi = $this->input->post('distribusi');
		$golongan = $this->input->post('golongan');
		$tahun = $this->input->post('tahun');
		$tahun2 = $tahun - 1;
		if ($distribusi == 'Persediaan') {
			$cek = $this->M_distribusi->cek_data($tahun2, $golongan);
		} else {
			$cek = $this->M_permintaan->cek_data($tahun2, $golongan);
		}
		
		
		if ($cek == 0) {
			$isi = [
				'golongan' => $golongan,
				'tahun' => $tahun,
				'distribusi' => $distribusi,
			];
			$this->load->view('kosong', $isi);
		}else{
			$dist =  $distribusi == 'Persediaan' ? $this->M_distribusi->get_data($tahun2, $golongan) : $this->M_permintaan->get_data($tahun2, $golongan);
		
			$angka = $this->M_angka_random->get_data();
			$cek_hasil = $this->M_angka_random->cek_hasil($tahun, $golongan, $distribusi);
			if ($cek_hasil == 0) {
				$no = 0;
				foreach ($angka as $data) {
					$nilai = $data->nilai;
					foreach ($dist as $datax) {
						if ($nilai <= $datax->interval_akhir && $nilai >= $datax->interval_awal) {
							// echo $datax->frekuensi. ' ';
							
							$dataxx = [
								'distribusi' => $distribusi,
								'bulan' => list_bulan()[$no],
								'tahun' => $tahun,
								'golongan' => $golongan,
								'hasil' => $datax->frekuensi,
							];
							$this->db->insert('hasil', $dataxx);
						}
					}
					// echo $data->nilai.' ';	
					$no++;
				}
			}
			
			$isi = [
				'angka' => $this->M_angka_random->get_data(),
				'hasil' => $this->M_angka_random->hasil($tahun, $golongan),
				'golongan' => $golongan,
				'tahun' => $tahun,
				'distribusi' => $distribusi,
			];
			$this->load->view('hasil_akhir', $isi);	
		}
		
		
	}

	
	public function update()
	{
		$nilai = $this->input->post('nilai');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$golongan = $this->input->post('golongan');
		$data = [
			'data_real' => $nilai
		];
		$this->db->where('bulan', $bulan);
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		$this->db->update('hasil', $data);
		$cek = $this->M_angka_random->hasil_satu($bulan, $tahun, $golongan);
		$data_real = $cek->data_real;
		if ($nilai == '') {
			$dr = 0;
			$hasil = $cek->hasil;
			$ha = 0;
		} else {
			$dr = $data_real;
			$hasil = $cek->hasil;
			if ($hasil < $dr) {
				$ha = $hasil / $dr * 100;
			} else {
				$ha = $dr / $hasil  * 100;
			}
			
			
		}
		$datax = [
			'persentase' => $ha
		];
		$this->db->where('bulan', $bulan);
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		$this->db->update('hasil', $datax);
		
		echo round($ha);
	}

	public function reset()
	{
		$this->db->query(" TRUNCATE hasil ");
		echo "Data perhitungan berhsil direset";
	}
}
