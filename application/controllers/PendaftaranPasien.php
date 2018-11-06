<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendaftaranPasien extends Ci_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}
	public function index(){
		$this->load->view('templates/header');
		$this->load->view('pages/v_pendaftaranPasien');
		$this->load->view('templates/footer');
	}

}