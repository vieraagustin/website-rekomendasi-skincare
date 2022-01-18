<?php defined('BASEPATH') or exit('No direct script access allowed');

class JK_model extends CI_Model
{
	public function tampildata()
	{
		return $this->db->get('jenis_kulit')->result();
		
	}
	public function tambah_data($data)
	{
		return $this->db->insert('jenis_kulit',$data);
	}
	
	public function hapusdata($id_JK)
	{
		return $this->db->delete('jenis_kulit', array('id_Jk'=>$id_JK));
	}
	public function get_by_id($id_JK){
		return $this->db->get_where('jenis_kulit', array('id_Jk'=>$id_JK))->result();
	}
	public function editdata($id_JK,$data)
	{
		return $this->db->set($data)
					->where('id_JK',$id_JK)
					->update('nama_JK');
	}
}