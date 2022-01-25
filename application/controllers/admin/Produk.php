<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Produk_model', 'Produk_model');
		$this->load->model('admin/JS_model', 'JS_model');
		$this->load->model('admin/JK_model', 'JK_model');
	}

	public function index()
	{
		$data = array(
			'List_Produk' => $this->Produk_model->tampildata()
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/produk/index', $data);
		$this->load->view('admin/admin_footer');
	}
	public function tambah_data()
	{
		$data = array(
			'List_JK' => $this->JK_model->tampildata(),
			'List_JS' => $this->JS_model->tampildata()
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/produk/tambah_dataproduk', $data);
		$this->load->view('admin/admin_footer');
	}
	public function proses_tambah_data()
	{
		$jenis_skincare = $this->input->post('jenis_skincare');
		$merek_produk = $this->input->post('merek_produk');
		$nama_produk = $this->input->post('nama_produk');
		$nama_Jk = $this->input->post('nama_Jk');

		$data = array(
			'jenis_skincare' => $jenis_skincare,
			'merek_produk' => $merek_produk,
			'id_Jk' => $nama_Jk,
			'nama_produk' => $nama_produk
		);

		$this->Produk_model->tambah_data($data);
		redirect('admin/Produk');
	}


	public function hapusdata()
	{
		$id_produk = $this->uri->segment(4);
		$hapus = $this->Produk_model->hapusdata($id_produk);
		redirect('admin/Produk');
	}
	public function editdata($id = null)
	{
		if ($id != null) {
			$prodak_select = $this->Produk_model->get($id);
			if ($prodak_select->num_rows() > 0) {
				$data = array(
					'List_JK' => $this->JK_model->tampildata(),
					'List_JS' => $this->JS_model->tampildata(),
					'data_produk' => $this->Produk_model->get_by_id($id)
				);
				$this->load->view('admin/admin_sidebar');
				$this->load->view('admin/produk/editproduk', $data);
				$this->load->view('admin/admin_footer');
			} else {
				redirect('404_override');
			}
		} else {
			redirect('404_override');
		}
	}
	public function proses_editdata()
	{
		$data = array();
		$id_produk = $this->uri->segment(4);
		$jenis_skincare = $this->input->post('jenis_skincare');
		$merek_produk = $this->input->post('merek_produk');
		$nama_produk = $this->input->post('nama_produk');
		$nama_Jk = $this->input->post('nama_Jk');
		$gbr = $this->input->post('image');

			$upload = $this->Produk_model->upload();
			if ($upload['result'] == "success") {
				$data = array(
					'jenis_skincare' => $this->input->post('jenis_skincare'),
					'merek_produk' => $this->input->post('merek_produk'),
					'id_JK' => $this->input->post('nama_Jk'),
					'nama_produk' =>  $this->input->post('nama_produk'),
					'harga' => $this->input->post('harga_produk'),
					'gambar' => $upload['file']['file_name'],
				);
			} else {

			$data = array(
				'jenis_skincare' => $jenis_skincare,
				'merek_produk' => $merek_produk,
				'id_JK' => $nama_Jk,
				'nama_produk' => $nama_produk,
				'harga' =>  $this->input->post('harga_produk'),
			);
		}
		$this->Produk_model->editdata($id_produk, $data);
		redirect('admin/Produk');
	}
	public function proses_tambah_data_v1()
	{
		$data = array();
		//if ($this->input->post('submit')) {
		$upload = $this->Produk_model->upload();
		if ($upload['result'] == "success") {
			$data = array(
				'jenis_skincare' => $this->input->post('jenis_skincare'),
				'merek_produk' => $this->input->post('merek_produk'),
				'id_JK' => $this->input->post('nama_Jk'),
				'nama_produk' =>  $this->input->post('nama_produk'),
				'harga' => $this->input->post('harga_produk'),
				'gambar' => $upload['file']['file_name'],
			);
			$this->Produk_model->tambah_data($data);
			redirect('admin/Produk');
		} else {
			$message = $upload['error'];
			$this->session->set_flashdata('message', $message);
		}

		redirect('admin/Produk/tambah_data');
	}
}
