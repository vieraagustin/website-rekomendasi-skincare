<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_skincare extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin/JS_model','JS_model');
	}

	public function index()
	{
		$data = array(
			'List_JS'=> $this->JS_model->tampildata()
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/jenis_skincare/index_JS',$data);
		$this->load->view('admin/admin_footer');
	}
	public function tambah_dataJS()
	{
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/jenis_skincare/tambah_dataJS');
		$this->load->view('admin/admin_footer');
	}
	public function proses_tambah_data()
	{
		$jenis_skincare=$this->input->post('jenis_skincare');

		$data = array(
			'jenis_skincare' => $jenis_skincare
		);

		$input = $this->JS_model->tambah_dataJS($data);
		redirect('admin/Jenis_skincare');
	}
	public function hapusdata()
	{
		$id_js=$this->uri->segment(4);
		$hapus=$this->JS_model->hapusdata($id_js);
		redirect('admin/Jenis_skincare');
	}
	public function editdata()
	{
		$id_js=$this->uri->segment(4);
		$data= array('data_jenis_skincare'=>$this->JS_model->get_by_id($id_js));
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/jenis_skincare/editJS',$data);
		$this->load->view('admin/admin_footer');
	}
	public function proses_edit_data()
	{
		$id_js=$this->uri->segment(4);
		$jenis_skincare=$this->input->post('jenis_skincare');
		$data=array(
			'jenis_skincare'=>$jenis_skincare,
		);
		$this->JS_model->editdata($id_js,$data);
		redirect('admin/jenis_skincare');
	}
}