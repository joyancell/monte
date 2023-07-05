<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permintaan extends CI_Model {

	public function get_data($tahun, $golongan)
	{
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		return $this->db->get('permintaan')->result();
	}

	public function cek_data($tahun, $golongan)
	{
		$this->db->where('tahun', $tahun);
		$this->db->where('golongan', $golongan);
		return $this->db->get('permintaan')->num_rows();
	}

	public function get_total($tahun, $golongan)
	{
		$sql = " SELECT SUM(frekuensi) AS total FROM permintaan WHERE tahun = '$tahun' AND golongan = '$golongan' ";
		return $this->db->query($sql)->row()->total;
	}

}
