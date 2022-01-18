<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Kulit extends CI_Controller {
	public function __construct()
	{
		parent ::__construct();
		$this->load->model('admin/JK_model','JK_model');
	}
	public function index()
	{
		$data = array(
			'List_JK'=> $this->JK_model->tampildata(),
		);
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/jenis_kulit/index_JK',$data);
		$this->load->view('admin/admin_footer');
	}
	public function tambah_data()
	{
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/jenis_kulit/tambah_dataJK');
		$this->load->view('admin/admin_footer');
	}
	public function proses_tambah_data()
	{
		$jenis_kulit= $this->input->post('jenis_kulit');

		$data = array(
			'nama_Jk' => $jenis_kulit
		);

		$input = $this->JK_model->tambah_data($data);
		redirect('admin/Jenis_Kulit');
		// $jumlah_kriteria = count($kriteria);

		// foreach ($kriteria as $kriteria) {
		// 	$data = array(
		// 		'nama_Jk' => $jenis_kulit,
		// 		'id_kriteria' => $kriteria
		// 	);
		// 	$this->JK_model->tambah_data($data);
		// }
		// redirect('admin/Jenis_Kulit');
	}
	public function hapusdata()
	{
		$id_JK=$this->uri->segment(4);
		$hapus=$this->JK_model->hapusdata($id_JK);
		redirect('admin/Jenis_Kulit');
	}

	public function editdata(){
		// var_dump('Testing');
		$id_JK=$this->uri->segment(4);
		$data= array('data_jenis_kulit'=>$this->JK_model->get_by_id($id_JK));
		// $data= array(
		// 	'dataJK'=>$this->JK_model->get_by_id($id_JK),
		// 	'List_Kriteria' => $this->Kriteria_model->tampildata()
		// );
		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/jenis_kulit/editJK',$data);
		$this->load->view('admin/admin_footer');
	}
	public function proses_edit_data()
	{
		$id_JK=$this->uri->segment(4);
		$jenis_kulit=$this->input->post('jenis_kulit');
		$data=array(
			'jenis_kulit'=>$jenis_kulit,
		);
		$this->JK_model->editdata($id_JK,$data);
		redirect('admin/jenis_kulit');
	}
}