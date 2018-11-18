<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('datatables');
		$this->load->helper('url', 'form');
		$this->load->model('Rais_model');
	}

	public function index(){
		
		$this->load->view('templates/header');
		$this->load->view('pages/v_obat');
	}

	public function daftarObat()
	{
		$data = array(
			'nama_obat' => $this->input->post('nama'),
			'harga_obat' => $this->input->post('harga'),
			'stok_obat' => $this->input->post('stok')
			);
		print_r($data);
		$this->Rais_model->input_data_obat($data);
		redirect('Obat','refresh');
	}

	public function get_json()
	{
		header('Content-Type: application/json');
		print_r($this->Rais_model->ambil_data_obat());
	}

	public function update_obat()
	{
		
		$data = array(
			'id_obat' => $this->input->post('id'),
			'nama_obat' => $this->input->post('nama'),
			'harga_obat' => $this->input->post('harga'),
			'stok_obat' => $this->input->post('stok')
		);
		// print_r($data);		
		$this->Rais_model->update_obat($data);
		redirect('Obat','refresh');
	}

	public function delete_obat()
	{
		$id = $this->input->post('id');
		$this->Rais_model->delete_obat($id);
		redirect('Obat','refresh');
	}


	public function daftarTindakan()
	{
		$data = array(
			'nama_tindakan' => $this->input->post('nama'),
			'harga_tindakan' => $this->input->post('harga')
			);
		$this->Rais_model->input_data_tindakan($data);
		redirect('Obat','refresh');
	}

	// function insert_dumy(){
 //        // jumlah data yang akan di insert
 //        $jumlah_data = 100;
 //        for ($i=1;$i<$jumlah_data;$i++){
 //            $data   =   array(
 //                "nama_obat"  =>  "obat Ke-".$i,
 //                "harga_obat"         =>  $i,
 //                "stok_obat"          =>  $i
 //            );
 //            $this->db->insert('obat',$data); 
 //        }
 //        echo $i.' Data Berhasil Di Insert';
 //    }
}