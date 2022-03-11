<?php defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi_model extends CI_Model
{
	public function tampil_produk(){
		$this->db->select('jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, produk.rekomendasi')
			->from('jenis_skincare')
			->join('produk','jenis_skincare.id_js = produk.jenis_skincare');
		$query = $this->db->get();
		return $query->result();
	}
	public function tampil_produk_byJK($JK){
		$this->db->select('jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, produk.rekomendasi')
			->from('jenis_skincare')
			->join('produk','jenis_skincare.id_js = produk.jenis_skincare')
			->join('jenis_kulit','produk.id_JK = jenis_kulit.id_JK')
			->where('jenis_kulit.nama_Jk',$JK);
		$query = $this->db->get();
		return $query->result();
	}

}