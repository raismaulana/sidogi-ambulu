<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {

	public function hapus($id)
	{	
		$this->db->delete('rekam_medis', array('id_rekam_medis'=>$id));
		if ($this->db->affected_rows()) 
		{
			$this->session->set_flashdata('info', '<div class="alert alert-success text-center"><b>Antrian Berhasil  dihapus!</b></div>');
			redirect('Dashboard');	
		}
		else
		{
			$this->session->set_flashdata('info', '<div class="alert alert-success"><h3>Antrian Gagal  dihapus!</h3></div>');
			redirect('Dashboard');
		}
	}

}

/* End of file Antrian.php */
/* Location: ./application/controllers/Antrian.php */
