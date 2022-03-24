<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{
	public function cek_bobot($keterangan)
	{
		$this->db->select('bobot')
				->from('nilai_bobot')
				->where('keterangan',$keterangan);
		$query=$this->db->get();
		return $query->result();
	}
	public function tampil(){
		return $this->db->get('kriteria')->result();
	}

	public function produk_by_jk($id_JK){
		$this->db->select('produk.id_produk, jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, produk.harga, produk.rekomendasi')
			->from('jenis_skincare')
			->join('produk','jenis_skincare.id_js = produk.jenis_skincare')
			->join('jenis_kulit','produk.id_JK = jenis_kulit.id_JK')
			->where('produk.id_JK',$id_JK);
		$this->db->order_by('produk.rekomendasi', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	public function produk_by_jk_and_filter($id_JK, $id_filter = []) {
		$this->db->select('produk.id_produk, jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, produk.harga, produk.rekomendasi')
			->from('jenis_skincare')
			->join('produk','jenis_skincare.id_js = produk.jenis_skincare')
			->join('jenis_kulit','produk.id_JK = jenis_kulit.id_JK')
			->where('produk.id_JK',$id_JK);

		if($id_filter != -1) {
			foreach ($id_filter as $key => $id) {
				if($key == 0) {
					$this->db->where('produk.jenis_skincare', $id);
				} else {
					$this->db->or_where('produk.jenis_skincare', $id);
				}
			}
		}

		$this->db->order_by('produk.rekomendasi', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

	public function all_produk(){
		$this->db->select('produk.id_produk, jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, produk.harga, produk.rekomendasi')
			->from('jenis_skincare')
			->join('produk','jenis_skincare.id_js = produk.jenis_skincare')
			->join('jenis_kulit','produk.id_JK = jenis_kulit.id_JK');
		$this->db->order_by('produk.rekomendasi', 'DESC');

		$query = $this->db->get();
		return $query->result();
	}

}