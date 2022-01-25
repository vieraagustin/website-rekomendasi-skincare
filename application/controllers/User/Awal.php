<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/Awal_Model','Awal_Model');

	}
		public function index()
		{
			//$this->load->view('user/sidebar_user');
			$this->load->view('user/halamanawal');
		}
		public function simpan_nama(){
			$nama=$this->input->post('nama');
			// $this->Awal_Model->simpan_nama
			$this->session->set_userdata('nama',$nama);
		//	var_dump($this->session->userdata('nama'));
			redirect('user/Jenis_Kulit');
		}
}
