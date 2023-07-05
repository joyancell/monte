<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	
	public function get_data($username, $pass)
	{
		$password = md5($pass);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('admin')->row();
	}

	public function cekusername($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('admin')->num_rows();
	}

	public function cekpass($username, $pass)
	{
		$password = md5($pass);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('admin')->num_rows();
	}
}
