<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPasien extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('datatables');
		$this->load->helper('url', 'form');
		$this->load->model('Rais_model');
	}
	public function index(){
		$x['data'] = $this->Rais_model->ambil_data_pasien();
		$this->load->view('templates/header');
		$this->load->view('pages/v_dataPasien', $x);
	}

}