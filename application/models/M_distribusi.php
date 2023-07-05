<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_distribusi extends CI_Model {

	public function get_data($tahun, $golongan)
	{
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		return $this->db->get('distribusi')->result();
	}

	public function cek_data($tahun, $golongan)
	{
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		return $this->db->get('distribusi')->num_rows();
	}

	public function get_total($tahun, $golongan)
	{
		$sql = " SELECT SUM(frekuensi) AS total FROM distribusi WHERE tahun = '$tahun' AND golongan = '$golongan' ";
		return $this->db->query($sql)->row()->total;
	}

}
