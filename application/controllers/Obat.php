<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url', 'form');
		$this->load->model('Rais_model');
	}
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('pages/v_obat');
		$this->load->view('templates/footer');
	}

	public function daftarObat()
	{
		// $data = array(
		// 	'nama_obat' => $this->input->post('nama'),
		// 	'harga_obat' => $this->input->post('harga'),
		// 	'stok_obat' => $this->input->post('stok')
		// 	);
		// print_r($data);
		// $this->Rais_model->input_data_pasien($data);
		// redirect('PendaftaranPasien','refresh');
	}

	

}