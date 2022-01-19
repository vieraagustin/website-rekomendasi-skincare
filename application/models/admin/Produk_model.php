<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
	public function tampildata()
	{
		$this->db->select('jenis_skincare.jenis_skincare as jenis_skincare, produk.merek_produk as merek_produk, produk.nama_produk as nama_produk, jenis_kulit.nama_Jk as nama_Jk, produk.id_produk as id_produk ,gambar,harga')
			->from('produk')
			->join('jenis_kulit', 'produk.id_JK = jenis_kulit.id_Jk')
			->join('jenis_skincare', 'produk.jenis_skincare = jenis_skincare.id_js');
		$query = $this->db->get();
		return $query->result();
	}
	public function tambah_data($data)
	{
		return $this->db->insert('produk', $data);
	}
	public function hapusdata($id_produk)
	{
		return $this->db->delete('produk', array('id_produk' => $id_produk));
	}
	public function get_by_id($id_produk)
	{
		return $this->db->get_where('produk', array('id_produk' => $id_produk))->result();
	}
	public function editdata($id_produk, $data)
	{
		return $this->db->set($data)
			->where('id_produk', $id_produk)
			->update('produk');
	}

	public function upload()
	{
		$directoryName = './assets/image/produk';
		if (!is_dir($directoryName)) {
			mkdir($directoryName, 0755, true);
		}

		$config['upload_path']          =  $directoryName;
		$config['allowed_types']        = 'png|gif|jpg|jpeg';
		$config['file_name']            =  uniqid();
		$config['overwrite']			= true;
		$config['max_size']             = 2048;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image')) {
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function get($id = null)
	{
		if ($id != null) {
			$a = $this->db->get_where('produk', array('id_produk' => $id));
		} else {
			$a = $this->db->get('produk');
		}
		return $a;
	}
}
