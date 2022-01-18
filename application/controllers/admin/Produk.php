<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin/Produk_model','Produk_model');
		$this->load->model('admin/JS_model','JS_model');
		$this->load->model('admin/JK_model','JK_model');
	}

	public function index()
	{
		$data = array(
			'List_Produk'=> $this->Produk_model->tampildata()
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/produk/index', $data);
		$this->load->view('admin/admin_footer');
	}
	public function tambah_data()
	{
		$data = array(
			'List_JK'=> $this->JK_model->tampildata(),
			'List_JS'=> $this->JS_model->tampildata()
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/produk/tambah_dataproduk',$data);
		$this->load->view('admin/admin_footer');
	}
	public function proses_tambah_data()
	{
		$jenis_skincare=$this->input->post('jenis_skincare');
		$merek_produk=$this->input->post('merek_produk');
		$nama_produk=$this->input->post('nama_produk');
		$nama_Jk=$this->input->post('nama_Jk');

		$data= array(
			'jenis_skincare'=>$jenis_skincare,
			'merek_produk'=>$merek_produk,
			'id_Jk'=>$nama_Jk,
			'nama_produk'=>$nama_produk
		);

		$this->Produk_model->tambah_data($data);
		redirect('admin/Produk');
	}
	public function hapusdata()
	{
		$id_produk=$this->uri->segment(4);
		$hapus=$this->Produk_model->hapusdata($id_produk);
		redirect('admin/Produk');
	}
	public function editdata(){
		$id_produk = $this->uri->segment(4);
		$data = array(
			'List_JK'=> $this->JK_model->group_JK(),
			'List_JS'=> $this->JS_model->tampildata(),
			'data_produk' => $this->Produk_model->get_by_id($id_produk)
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/produk/editproduk',$data);
		$this->load->view('admin/admin_footer');
	}
	public function proses_editdata()
	{
		$id_produk=$this->uri->segment(4);
		$jenis_skincare=$this->input->post('jenis_skincare');
		$merek_produk=$this->input->post('merek_produk');
		$nama_produk=$this->input->post('nama_produk');
		$nama_Jk=$this->input->post('nama_Jk');
		$data=array(
			'jenis_skincare'=>$jenis_skincare,
			'merek_produk'=>$merek_produk,
			'id_JK'=>$nama_Jk,
			'nama_produk'=>$nama_produk
		);
		$this->Produk_model->editdata($id_produk,$data);
		redirect('admin/Produk');
	}
}