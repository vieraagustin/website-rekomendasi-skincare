<?php

class KBSModel extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function get_products_by_skin($skin_id, $sort = NULL) {
		
		$this->db->select('produk.id_produk, jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, produk.harga')
			->from('jenis_skincare')
			->join('produk','jenis_skincare.id_js = produk.jenis_skincare')
			->join('jenis_kulit','produk.id_JK = jenis_kulit.id_JK')
			->where('produk.id_JK',$skin_id);

		if($sort) {
			$this->db->order_by('produk.rekomendasi','DESC');
			$this->db->order_by('produk.harga', $sort);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_all_alternative() {
		$query = "SELECT rekomendasi.id, rekomendasi.kategori_finansial, rekomendasi.jenis_kulit, rekomendasi.certainty FROM rekomendasi";

		return $this->db->query($query)->result_array();
	}

	public function save_recommendation($data) {
		$data['created_at'] = date('Y-m-d H:i:s', time());
		$data['updated_at'] = date('Y-m-d H:i:s', time());

		$this->db->insert('rekomendasi', $data);

		return $this->db->insert_id();
	}

	public function save_product_recommmendation($data) {
		$data['created_at'] = date('Y-m-d H:i:s', time());
		$data['updated_at'] = date('Y-m-d H:i:s', time());

		return $this->db->insert('rekomendasi_produk', $data);
	}

	public function add_single_product_score($id_produk) {
		$current_product = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
		$score = $current_product['rekomendasi'] + 1;

		$this->db->set('rekomendasi', $score);
		$this->db->where('id_produk', $current_product['id_produk']);
		$this->db->update('produk');

		return $this->db->affected_rows();
	}

	public function remove_single_product_score($id_produk) {
		$current_product = $this->db->get_where('produk', ['id_produk' => $id_produk])->row_array();
		$score = $current_product['rekomendasi'] - 1;

		if($score < 0) $score = 0;

		$this->db->set('rekomendasi', $score);
		$this->db->where('id_produk', $current_product->id_produk);
		$this->db->update('produk');

		return $this->db->affected_rows();
	}

	public function add_product_score($products) {
		foreach($products as $product) {
			$current_product = $this->db->get_where('produk', ['id_produk' => $product->id_produk])->row_array();
			$score = $current_product['rekomendasi'] + 1;

			$this->db->set('rekomendasi', $score);
			$this->db->where('id_produk', $current_product['id_produk']);
			$this->db->update('produk');
		}
	}

	public function get_all_filter() {
		return $this->db->get('jenis_skincare')->result_array();
	}
}