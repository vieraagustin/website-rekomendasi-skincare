<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('User/Awal_Model','Awal_Model');

	}
		public function index()
		{
			//$this->load->view('user/sidebar_user');
			$this->load->view('user/halamanawal');
		}
}