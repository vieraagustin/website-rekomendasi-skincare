<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function index()
	{
		$this->load->view('admin/admin_header');
		$this->load->view('admin/login');
		$this->load->view('admin/admin_footer');
	}

	function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('login_m');
			$temp = $this->login_m->auth($post);
			if ($temp->num_rows() > 0) {
				redirect('admin/Produk');
			} else {
				redirect('login');
			}
		} else {
			redirect('login');
		}
	}

	function home()
	{
		redirect('User/Awal');
	}
}
