<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
	public function tampildata()
	{
		$this->db->select('jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, jenis_kulit.nama_Jk as nama_Jk, produk.id_produk as id_produk')
			->from('produk')
			->join('jenis_kulit','produk.id_JK = jenis_kulit.id_Jk')
			->join('jenis_skincare', 'produk.jenis_skincare = jenis_skincare.id_js');
		$query = $this->db->get();
		return $query->result();
	}
	public function tambah_data($data)
	{
		return $this->db->insert('produk',$data);
	}
	public function hapusdata($id_produk)
	{
		return $this->db->delete('produk', array('id_produk'=>$id_produk));
	}
	public function get_by_id($id_produk){
		return $this->db->get_where('produk', array('id_produk' => $id_produk))->result();
	}
	public function editdata($id_produk,$data)
	{
		return $this->db->set($data)
					->where('id_produk',$id_produk)
					->update('produk');
	}
}