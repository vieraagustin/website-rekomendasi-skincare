<?php

class SUS extends CI_Controller {
	public function __construct() {
		parent::__construct();
	
		$this->load->model('SUSModel', 'm_sus');
	}

	public function index() {
		$skor = $this->m_sus->getSkor();
		$soal_jawaban = $this->m_sus->getSoalJawaban();

		$data['skor_SUS'] = $skor;
		$data['soal_jawaban'] = $soal_jawaban;

		$this->load->view('admin/admin_sidebar');
		$this->load->view('admin/sus/index', $data);
		$this->load->view('admin/admin_footer');
	}
}