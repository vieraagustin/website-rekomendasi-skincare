<?php defined('BASEPATH') or exit('No direct script access allowed');

class JS_model extends CI_Model
{
	public function tampildata()
	{
		return $this->db->get('jenis_skincare')->result();
	}
	public function tambah_dataJS($data)
	{
		return $this->db->insert('jenis_skincare',$data);
	}
	public function hapusdata($id_js)
	{
		return $this->db->delete('jenis_skincare', array('id_js'=>$id_js));
	}
	public function get_by_id($id_js)
	{
		return $this->db->get_where('jenis_skincare', array('id_js'=>$id_js))->result();
	}
	public function editdata($id_js,$data)
	{
		return $this->db->set($data)
					->where('id_js',$id_js)
					->update('jenis_skincare');
	}
}