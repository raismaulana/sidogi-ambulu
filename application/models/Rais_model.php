<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rais_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function input_data_pasien($data)
	{
		return $this->db->insert('pasien', $data);
	}

	public function ambil_data_pasien()
	{
		return $this->db->get('pasien');
	}

}