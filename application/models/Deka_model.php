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

	public function antrian(){
		$sql = "SELECT rekam_medis.id_rekam_medis, pasien.nama_pasien, pasien.gender_pasien FROM pasien JOIN rekam_medis on rekam_medis.pasien_id_pasien = pasien.id_pasien WHERE rekam_medis.status = '0' AND rekam_medis.tanggal_periksa IN
			(
				SELECT MAX(rekam_medis.tanggal_periksa)
			)";
		return $this->db->query($sql);
	}

}

/* End of file Deka_model.php */
/* Location: ./application/models/Deka_model.php */