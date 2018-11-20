<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Ci_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Rais_model');
		$this->load->model('Deka_model');
	}
	public function index(){
		$x['data'] = $this->Deka_model->antrian();
		$this->load->view('templates/header');
		$this->load->view('pages/v_antrian', $x);
		$this->load->view('templates/footer');
	}
	public function pendaftaranPasien(){
		$this->load->view('templates/header');
		$this->load->view('pages/v_pendaftaranPasien');
		$this->load->view('templates/footer');
	}

}