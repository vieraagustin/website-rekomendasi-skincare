<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
	public function tampildata()
	{
		return $this->db->get('kriteria')->result();
	}
	public function tambah_data($data)
	{
		return $this->db->insert('kriteria',$data);
	}
	public function hapusdata($id_kriteria)
	{
		return $this->db->delete('kriteria', array('id_kriteria'=>$id_kriteria));
	}
	public function get_by_id($id_kriteria)
	{
		return $this->db->get_where('kriteria', array('id_kriteria'=>$id_kriteria))->result();
	}
	public function editdata($id_kriteria,$data)
	{
		return $this->db->set($data)
					->where('id_kriteria',$id_kriteria)
					->update('kriteria');
	}
}