<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('User/Rekomendasi_model','Rekomendasi_model');
		}
	
		public function index()
		{
			$this->load->view('user/sidebar_user');
			$this->load->view('user/rekomendasi');
		}
		public function load_produk(){
			$jenis_kulit = $_GET['jenis_kulit'];
			if($jenis_kulit == 'semua'){
				$data = $this->Rekomendasi_model->tampil_produk();
			}else{
				$data = $this->Rekomendasi_model->tampil_produk_byJK($jenis_kulit);
			}
			
			var_dump($data); die;
		}
	}