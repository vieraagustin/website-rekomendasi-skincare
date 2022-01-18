<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin/Kriteria_model','Kriteria_model');
	}

	public function index()
	{
		$data = array(
			'List_Kriteria'=> $this->Kriteria_model->tampildata()
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/Kriteria/index_Kriteria',$data);
		$this->load->view('admin/admin_footer');
	}
	public function tambah_data()
	{
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/Kriteria/tambah_data');
		$this->load->view('admin/admin_footer');
	}
	public function proses_tambah_data()
	{
		$kriteria= $this->input->post('kriteria');

		$data = array(
			'kriteria' => $kriteria,
		);
		$input = $this->Kriteria_model->tambah_data($data);
		redirect('admin/Kriteria');
	}
	public function hapusdata()
	{
		$id_kriteria=$this->uri->segment(4);
		$hapus=$this->Kriteria_model->hapusdata($id_kriteria);
		redirect('admin/Kriteria');
	}
	public function editdata()
	{
		$id_kriteria=$this->uri->segment(4);
		$data= array('data_kriteria'=>$this->Kriteria_model->get_by_id($id_kriteria));
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/Kriteria/editkriteria',$data);
		$this->load->view('admin/admin_footer');
	}
	public function proses_edit_data()
	{
		$id_kriteria=$this->uri->segment(4);
		$kriteria=$this->input->post('kriteria');
		$data=array(
			'kriteria'=>$kriteria,
			
		);
		$this->Kriteria_model->editdata($id_kriteria,$data);
		redirect('admin/Kriteria');
	}

}