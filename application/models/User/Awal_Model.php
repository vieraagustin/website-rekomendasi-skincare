<?php defined('BASEPATH') or exit('No direct script access allowed');

class Awal_Model extends CI_Model
{
	public function simpan_nama($data){
		return $this->db->insert('data_pengguna',$data);

	} 
}
