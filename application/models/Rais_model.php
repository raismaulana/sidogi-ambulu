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

	public function input_data_obat($data)
	{
		return $this->db->insert('obat', $data);
	}

	public function ambil_data_obat()
	{
		$this->datatables->select('id_obat,nama_obat,harga_obat,stok_obat');
		$this->datatables->from('obat');
		$this->datatables->add_column('action', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-xs" data-id="$1" data-nama="$2" data-harga="$3" data-stok="$4">Edit</a> <a href="javascript:void(0);" class="hapus_record bt btn-danger btn-sm" data-id="$1">Hapus</a>', 'id_obat,nama_obat,harga_obat,stok_obat');
		
		return $this->datatables->generate();
	}

	public function update_obat($data)
	{
		$this->db->set($data);
		$this->db->where('id_obat', $data['id_obat']);
		return $this->db->update('obat');
	}

	public function delete_obat($id)
	{
		$this->db->where('id_obat', $id);
		$this->db->delete('obat');
	}

	public function input_data_tindakan($data)
	{
		return $this->db->insert('tindakan', $data);
	}

	public function get_pasien_by_id($id)
	{
		$this->db->where('id_pasien', $id);
		return $this->db->get('pasien')->row();
	}

	public function input_data_keluhan($keluhan, $iduser, $idpasien)
	{
		$sql = "INSERT INTO `rekam_medis`(`keluhan_periksa`, `tanggal_periksa`, `user_id_user`, `pasien_id_pasien`) VALUES ('$keluhan', NOW() ,'$iduser', '$idpasien')";
		return $this->db->query($sql);
	}

}