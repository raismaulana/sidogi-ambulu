<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Ci_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Rais_model');
		$this->load->model('Deka_model');
	}

	public function index(){
		$x['data'] = $this->Deka_model->antrian();
		$x['pasien'] = $this->Rais_model->ambil_data_pasien()->result();
		// print_r($x['pasien']);
		$this->load->view('templates/header');
		$this->load->view('pages/v_antrian', $x);
	}

	public function getPasienById()
	{
		$id = $this->input->post('id');
		$data = $this->Rais_model->get_pasien_by_id($id);

		$json = json_encode($data);
		header('Content-Type: application/json');
		print_r($json);
	}
	
	public function inputAntriPeriksa()
	{

		// $data = array(
		// 	'keluhan_periksa' => $this->input->post('keluhan'),
		// 	'user_id_user' => "1",
		// 	'pasien_id_pasien' => $this->input->post('id')
		//  );
		// print_r($data);
		$response = $this->Rais_model->input_data_keluhan($this->input->post('keluhan'),"1",$this->input->post('id'));
		
		$data = array(
			'response' => $response 
		);
		$json = json_encode($data);
		header('Content-Type: application/json');
		print_r($json);

	}

}