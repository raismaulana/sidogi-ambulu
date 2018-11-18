<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Deka_model');
	}


	public function index()
	{
		$this->load->view('pages/v_login');
	}

	public function proses()
	{
		$u=$this->input->post('username');
		$p=$this->input->post('password');

		$ceklogin = $this->Deka_model->login($u,$p);
		
		if($ceklogin){
			foreach ($ceklogin as $row);
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('hak_akses', $row->hak_akses);
				$this->session->set_userdata('status', "login");
				$data_session = array ('nama' => $username); //inisilisasi data nama_user

				if($this->session->userdata('hak_akses')=="2"){
					$this->session->set_userdata($data_session); //kirim nama admin
					
					redirect(base_url("dashboard"));
					
				}else{
					$this->session->set_flashdata('psn','anda bukan admin');
			        redirect(base_url("login"));
				}
		}else{
			$this->session->set_flashdata('pesan','username dan password salah');
			redirect(base_url("login"));
		}
                    
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */