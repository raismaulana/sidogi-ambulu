<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deka_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($u, $p)
	{
		$this->db->select('username, password, hak_akses'); //memilih kolom di tabel
		$this->db->from('user'); //nama tabel
		$this->db->where('username', $u); //dimana username = $username
		$this->db->where('password', $p); //dimana password= $password
		$this->db->limit(1); //jumlah data baris yg di ambil

		$query = $this->db->get();//mengambil proses di atas

		if($query->num_rows()==1){ //cek data ada atau tidak
			return $query->result();
		}else{
			return false;
		}
	}

	

}

/* End of file Deka_model.php */
/* Location: ./application/models/Deka_model.php */