<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_angka_random extends CI_Model {

	public function get_data()
	{
		return $this->db->get('bilangan_acak')->result();
	}

	public function hasil($tahun, $golongan)
	{
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		return $this->db->get('hasil')->result();
	}

	public function hasil_satu($bulan, $tahun, $golongan)
	{
		$this->db->where('bulan', $bulan);
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		return $this->db->get('hasil')->row();
	}

	public function cek_hasil($tahun, $golongan, $distribusi)
	{
		$this->db->where('distribusi', $distribusi);
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		return $this->db->get('hasil')->num_rows();
	}

	

}
