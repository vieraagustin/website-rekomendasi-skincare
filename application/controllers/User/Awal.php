<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
			$nama = $this->input->post('nama');
			$umur = $this->input->post('umur');
			$kategori_uang = $this->input->post('kategori_uang');
			// $this->Awal_Model->simpan_nama
			$this->session->set_userdata('sess_skincare_nama',$nama);
			$this->session->set_userdata('sess_skincare_umur',$umur);
			$this->session->set_userdata('sess_skincare_uang',$kategori_uang);
			$this->session->set_userdata('SESS_KBS_SKINCARE_KATEGORI_FINANSIAL',$kategori_uang);
		//	var_dump($this->session->userdata('nama'));
			redirect('User/Jenis_Kulit');
		}
}
