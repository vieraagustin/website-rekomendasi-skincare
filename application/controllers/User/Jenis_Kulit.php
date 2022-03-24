<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Kulit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/Kriteria_model','Kriteria_model');
		$this->load->model('admin/JS_model','JS_model');
		$this->load->model('KBSModel', 'kbs_m');
	}

		public function index()
		{
			$data=array(
					"List_Kriteria"=>$this->Kriteria_model->tampil()
			);
		//	$this->load->view('user/sidebar_user');
			$this->load->view('user/jeniskulit',$data);
		}

		public function proses_perhitungan()
		{
			$ket_bobot1 = $this->input->post('nilai_bobot1');
			$ket_bobot2 =$this->input->post('nilai_bobot2');
			$ket_bobot3 =$this->input->post('nilai_bobot3');
			$ket_bobot4 =$this->input->post('nilai_bobot4');
			$ket_bobot5 =$this->input->post('nilai_bobot5');
			$ket_bobot6 =$this->input->post('nilai_bobot6');
			$ket_bobot7 =$this->input->post('nilai_bobot7');
			$ket_bobot8 =$this->input->post('nilai_bobot8');
			$ket_bobot9 =$this->input->post('nilai_bobot9');
			$ket_bobot10 =$this->input->post('nilai_bobot10');
			$ket_bobot11 =$this->input->post('nilai_bobot11');
			$ket_bobot12 =$this->input->post('nilai_bobot12');
			$ket_bobot13 =$this->input->post('nilai_bobot13');
			$ket_bobot14 =$this->input->post('nilai_bobot14');

	//cek bobot masing-masing kriteria
			//kulit normal
			$bobot1 = $this->Kriteria_model->cek_bobot($ket_bobot1);
			$bobot2 = $this->Kriteria_model->cek_bobot($ket_bobot2);
			$bobot3 = $this->Kriteria_model->cek_bobot($ket_bobot3);
			$bobot4 = $this->Kriteria_model->cek_bobot($ket_bobot4);
			$bobot9 = $this->Kriteria_model->cek_bobot($ket_bobot9);

			//kulit berminyak
			$bobot5 = $this->Kriteria_model->cek_bobot($ket_bobot5);
			$bobot6 = $this->Kriteria_model->cek_bobot($ket_bobot6);
			$bobot7 = $this->Kriteria_model->cek_bobot($ket_bobot7);
			$bobot14 = $this->Kriteria_model->cek_bobot($ket_bobot14);
			//kulit Kering
			$bobot8 = $this->Kriteria_model->cek_bobot($ket_bobot8);
			$bobot9 = $this->Kriteria_model->cek_bobot($ket_bobot9);
			$bobot10 = $this->Kriteria_model->cek_bobot($ket_bobot10);
			$bobot11 = $this->Kriteria_model->cek_bobot($ket_bobot11);
			//kulit Kombinasi
			$bobot12 = $this->Kriteria_model->cek_bobot($ket_bobot12);
			$bobot13 = $this->Kriteria_model->cek_bobot($ket_bobot13);
			$bobot14 = $this->Kriteria_model->cek_bobot($ket_bobot14);
			$bobot5 = $this->Kriteria_model->cek_bobot($ket_bobot5);

	//bobot total
			//kulit normal
			$BT_normal = $bobot1[0]->bobot + $bobot2[0]->bobot + $bobot3[0]->bobot + $bobot4[0]->bobot + $bobot9[0]->bobot ;
			//kulit berminyak
			$BT_berminyak = $bobot5[0]->bobot + $bobot6[0]->bobot + $bobot7[0]->bobot + $bobot14[0]->bobot ;
			//kulit kering
			$BT_kering = $bobot8[0]->bobot + $bobot9[0]->bobot + $bobot10[0]->bobot + $bobot11[0]->bobot ;
			//kulit kombinasi
			$BT_kombinasi = $bobot12[0]->bobot + $bobot13[0]->bobot + $bobot14[0]->bobot + $bobot5[0]->bobot ;

	//probabilitas
			//kulit normal
			if ($bobot1[0]->bobot == 0){
				$probabilitas_bobot1 = 0;
			}else{
				$probabilitas_bobot1 = $bobot1[0]->bobot/$BT_normal;
			}

			if ($bobot2[0]->bobot == 0){
				$probabilitas_bobot2 = 0;
			}else{
				$probabilitas_bobot2 = $bobot1[0]->bobot/$BT_normal;
			}

			if ($bobot3[0]->bobot == 0){
				$probabilitas_bobot3 = 0;
			}else{
				$probabilitas_bobot3 = $bobot3[0]->bobot/$BT_normal;
			}

			if ($bobot4[0]->bobot == 0){
				$probabilitas_bobot4 = 0;
			}else{
				$probabilitas_bobot4 = $bobot4[0]->bobot/$BT_normal;
			}

			if ($bobot9[0]->bobot == 0){
				$probabilitas_bobot9 = 0;
			}else{
				$probabilitas_bobot9 = $bobot9[0]->bobot/$BT_normal;
			}

			//kulit berminyak
			if($bobot5[0]->bobot == 0){
				$probabilitas_bobot5 = 0;
			}else{
				$probabilitas_bobot5 = $bobot5[0]->bobot/$BT_berminyak;
			}

			if($bobot6[0]->bobot == 0){
				$probabilitas_bobot6 = 0;
			}else{
				$probabilitas_bobot6 = $bobot6[0]->bobot/$BT_berminyak;
			}

			if($bobot7[0]->bobot == 0){
				$probabilitas_bobot7 = 0;
			}else{
				$probabilitas_bobot7 = $bobot7[0]->bobot/$BT_berminyak;
			}

			if($bobot14[0]->bobot == 0){
				$probabilitas_bobot14 = 0;
			}else{
				$probabilitas_bobot14 = $bobot14[0]->bobot/$BT_berminyak;
			}

			//kulit Kering
			if($bobot8[0]->bobot == 0){
				$probabilitas_bobot8 = 0;
			}else{
				$probabilitas_bobot8 = $bobot8[0]->bobot/$BT_kering;
			}

			if($bobot9[0]->bobot == 0){
				$probabilitas_bobot15 = 0;
			}else{
				$probabilitas_bobot15 = $bobot9[0]->bobot/$BT_kering;
			}

			if($bobot10[0]->bobot == 0){
				$probabilitas_bobot10 = 0;
			}else{
				$probabilitas_bobot10 = $bobot10[0]->bobot/$BT_kering;
			}

			if($bobot11[0]->bobot == 0){
				$probabilitas_bobot11 = 0;
			}else{
				$probabilitas_bobot11 = $bobot11[0]->bobot/$BT_kering;
			}

			//kulit kombinasi
			if($bobot12[0]->bobot == 0){
				$probabilitas_bobot12 = 0;
			}else{
				$probabilitas_bobot12 = $bobot12[0]->bobot/$BT_kombinasi;
			}

			if($bobot13[0]->bobot == 0){
				$probabilitas_bobot13 = 0;
			}else{
				$probabilitas_bobot13 = $bobot13[0]->bobot/$BT_kombinasi;
			}

			if($bobot14[0]->bobot == 0){
				$probabilitas_bobot16 = 0;
			}else{
				$probabilitas_bobot16 = $bobot14[0]->bobot/$BT_kering;
			}

			if($bobot5[0]->bobot == 0){
				$probabilitas_bobot17 = 0;
			}else{
				$probabilitas_bobot17 = $bobot5[0]->bobot/$BT_kombinasi;
			}
	//nilai ambang kriteria
			//kulit normal
			$NA_bobot1 = ($bobot1[0]->bobot/2) * $probabilitas_bobot1;
			$NA_bobot2 = ($bobot2[0]->bobot/2) * $probabilitas_bobot2;
			$NA_bobot3 = ($bobot3[0]->bobot/2) * $probabilitas_bobot3;
			$NA_bobot4 = ($bobot4[0]->bobot/2) * $probabilitas_bobot4;
			$NA_bobot9 = ($bobot9[0]->bobot/2) * $probabilitas_bobot9;
			//kulit berminyak
			$NA_bobot5 = ($bobot5[0]->bobot/2) * $probabilitas_bobot5;
			$NA_bobot6 = ($bobot6[0]->bobot/2) * $probabilitas_bobot6;
			$NA_bobot7 = ($bobot7[0]->bobot/2) * $probabilitas_bobot7;
			$NA_bobot14 = ($bobot14[0]->bobot/2) * $probabilitas_bobot14;
			//kulit kering
			$NA_bobot8 = ($bobot8[0]->bobot/2) * $probabilitas_bobot8;
			$NA_bobot15 = ($bobot9[0]->bobot/2) * $probabilitas_bobot15;
			$NA_bobot10 = ($bobot10[0]->bobot/2) * $probabilitas_bobot10;
			$NA_bobot11 = ($bobot11[0]->bobot/2) * $probabilitas_bobot11;
			//kulit kombinasi
			$NA_bobot12 = ($bobot12[0]->bobot/2) * $probabilitas_bobot12;
			$NA_bobot13 = ($bobot13[0]->bobot/2) * $probabilitas_bobot13;
			$NA_bobot16 = ($bobot14[0]->bobot/2) * $probabilitas_bobot16;
			$NA_bobot17 = ($bobot5[0]->bobot/2) * $probabilitas_bobot17;

	//nilai ambang total
			$AT_normal = $NA_bobot1 + $NA_bobot2 + $NA_bobot3 + $NA_bobot4 + $NA_bobot9 ;
			$AT_berminyak = $NA_bobot5 + $NA_bobot6 + $NA_bobot7 + $NA_bobot14;
			$AT_kering = $NA_bobot8 + $NA_bobot15 + $NA_bobot10 + $NA_bobot11;
			$AT_kombinasi = $NA_bobot12 + $NA_bobot13 + $NA_bobot16 + $NA_bobot17;


			$p_normal = $AT_normal * 100;
			$p_berminyak = $AT_berminyak * 100;
			$p_kering = $AT_kering * 100;
			$p_kombinasi = $AT_kombinasi * 100;

			$nilai_max = max($p_normal,$p_berminyak,$p_kering,$p_kombinasi);

			if($nilai_max == $p_normal){
				$id_JK=1;
			}else if($nilai_max == $p_berminyak){
				$id_JK=9;
			}else if($nilai_max == $p_kering){
				$id_JK=13;
			}else{
				$id_JK=19;
			}

				$nilai=[$p_normal,$p_berminyak,$p_kering,$p_kombinasi];
				if(count(array_unique($nilai))==1){
					$list_produk=$this->Kriteria_model->all_produk();
				}else{
					$list_produk=$this->Kriteria_model->produk_by_jk($id_JK);
				}

				$kategori_finansial = $this->session->userdata('sess_skincare_uang');

				$this->session->set_userdata('SESS_KBS_SKINCARE_CERTAINTY', max($nilai));
				$this->session->set_userdata('SESS_KBS_SKINCARE_JENIS_KULIT', $id_JK);
				$this->session->set_userdata('SESS_KBS_SKINCARE_KATEGORI_FINANSIAL', $kategori_finansial);

				$data = array(
					'p_normal'=>$p_normal,
					'p_berminyak'=>$p_berminyak,
					'p_kering'=>$p_kering,
					'p_kombinasi'=>$p_kombinasi,
					//'list_produk'=>$list_produk,
					'list_js' => $this->JS_model->tampildata()
				);

				$this->session->set_userdata('SESS_KBS_SKINCARE_RESULT', $data);

				$data['list_produk'] = $list_produk;

				$data['filters'] = $this->kbs_m->get_all_filter();

				$data['question'] = $this->kbs_m->get_sus_question();

				$data['has_submit'] = false;

				$this->load->view('user/sidebar_user');
				$this->load->view('user/hasil',$data);
		}

		public function rekomendasi($has_submit = false) {
			$filter_id = -1;

			if($this->input->post('filter_produk')) {
				$filter_produk = $this->input->post('filter_produk');

				if(!array_key_exists('filter_semua', $filter_produk)) {
					$filter_id = $filter_produk;
				}
			}

			$data = $this->session->userdata('SESS_KBS_SKINCARE_RESULT');
			$id_JK = $this->session->userdata('SESS_KBS_SKINCARE_JENIS_KULIT');

			$list_produk = $this->Kriteria_model->produk_by_jk_and_filter($id_JK, $filter_id);

			$data['list_produk'] = $list_produk;

			$data['filters'] = $this->kbs_m->get_all_filter();

			$data['question'] = $this->kbs_m->get_sus_question();

			$data['has_submit'] = $has_submit || false;

			$this->load->view('user/sidebar_user');
			$this->load->view('user/hasil', $data);
		}
	}
