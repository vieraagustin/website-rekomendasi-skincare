<?php

class KBSController extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('KBSModel', 'kbs_m');
	}

	private function sort_data($data) {

    $skor = array();
    foreach ($data as $dt)
    {
        $skor[$dt['id']] = $dt['NT'];
    }

    array_multisort($skor, SORT_DESC, $data);

    return $data;
  }

	public function profile_matching() {
		$result = [];

		// algoritma profile matching di sini
		$GAP_mapping = [
      0 => (float) 5,
      1 => (float) 4.5,
      -1 => (float) 4,
      2 => (float) 3.5,
      -2 => (float) 3,
      3 => (float) 2.5,
      -3 => (float) 2,
      4 => (float) 1.5,
      -4 => (float) 1
    ];

    $normalize_jenis_kulit = [
    	1 => 1,
    	9 => 2,
    	13 => 3,
    	19 => 4
    ];

    $kategori_finansial = $this->session->userdata('SESS_KBS_SKINCARE_KATEGORI_FINANSIAL');
		$jenis_kulit = $this->session->userdata('SESS_KBS_SKINCARE_JENIS_KULIT');
		$certainty_jenis_kulit = $this->session->userdata('SESS_KBS_SKINCARE_CERTAINTY');

    $target = [
    	'kategori_finansial' => ((int) $kategori_finansial) - 1,
    	'jenis_kulit' => $normalize_jenis_kulit[$jenis_kulit],
    	'certainty' => (int) (((float) $certainty_jenis_kulit / 100) * (4 + 0) - 0)
    ];

    // get all alternative
    $alternative = $this->kbs_m->get_all_alternative($jenis_kulit);
    // $alternative = $this->kbs_m->get_all_alternative();

    if(count($alternative) < 5) {
    	$result['profile_matching'] = NULL;
    	$result['products'] = $this->kbs_m->get_products_by_skin($jenis_kulit, 'ASC');
    	
    	echo json_encode($result, JSON_PRETTY_PRINT);
    	return;
    }

    $normalize_alternative = [];

    foreach($alternative as $al) {
    	$temp = [
    		'id' => $al['id'],
    		'kategori_finansial' => ((int) $al['kategori_finansial']) - 1,
    		'jenis_kulit' => $normalize_jenis_kulit[$al['jenis_kulit']],
    		'certainty' => (int) (((float)$al['certainty'] / 100) * (4 + 0) - 0)
    	];

    	// $normalize_alternative[$al['id']] = $temp;
    	array_push($normalize_alternative, $temp);
    }

    $GAP = [];
    foreach($normalize_alternative as $na) {
    	$temp = [
    		'id' => $na['id'],
    		'kategori_finansial' => $na['kategori_finansial'] - $target['kategori_finansial'],
    		'jenis_kulit' => $na['jenis_kulit'] - $target['jenis_kulit'],
    		'certainty' => $na['jenis_kulit'] - $target['certainty']
    	];

    	array_push($GAP, $temp);
    }

    $konversi = [];

    foreach($GAP as $gap) {
    	$temp = [
    		'id' => $gap['id'],
    		'kategori_finansial' => $GAP_mapping[$gap['kategori_finansial']],
    		'jenis_kulit' => $GAP_mapping[$gap['jenis_kulit']],
    		'certainty' => $GAP_mapping[$gap['certainty']]
    	];

    	array_push($konversi, $temp);
    }

    // static factor
    // core : kategori finansial, jenis kulit
    // secondary : certainty

    $faktor = [];

    foreach($konversi as $konv) {
    	$core_faktor = (float) ($konv['kategori_finansial'] + $konv['certainty']) / 2.0;
    	$secondary_faktor = $konv['jenis_kulit'];

    	$temp = [
    		'id' => $konv['id'],
    		'NCF' => $core_faktor,
    		'NSF' => $secondary_faktor
    	];

    	array_push($faktor, $temp);
    }

    // result masuk sini
    $final_NT = [];
    foreach($faktor as $f) {
    	$temp = [
   			'id' => (int) $f['id'],
   			'NT' =>(float)( 0.66 * $f['NCF']) + ((0.34) * $f['NSF'])
   		];

   		array_push($final_NT, $temp);
    }

    $final_data = $this->sort_data($final_NT);

    $result['profile_matching'] = $final_data;

    $products = $this->kbs_m->get_recommendation_product($final_data[0]['id']);

    $result['products'] = $products;
   
    // value * (maksimum - minimum) + minimum
    // $new_value = (int) ($value * (4 + 0) - 0);

    echo json_encode($result, JSON_PRETTY_PRINT);
	}

	public function KBSAlgorithm() {
		// 1 : 1 - 50.000
    // 2 : 51.000 - 100.000
    // 3 : 100.000 - 200.000
    // 4 : 200.001 - 500.000
    // 5 : > 500.000

		$kategori_finansial = $this->session->userdata('SESS_KBS_SKINCARE_KATEGORI_FINANSIAL');
		$jenis_kulit = $this->session->userdata('SESS_KBS_SKINCARE_JENIS_KULIT');
		$certainty_jenis_kulit = $this->session->userdata('SESS_KBS_SKINCARE_CERTAINTY');

		$result_products = [];
		$temp_last_product = [];
		
		if($kategori_finansial == 5) {
			$result_products = $this->kbs_m->get_products_by_skin($jenis_kulit, 'DESC');

		} else if($kategori_finansial == 1) {
			$result_products = $this->kbs_m->get_products_by_skin($jenis_kulit, 'ASC');

		} else {
			$temp_products = $this->kbs_m->get_products_by_skin($jenis_kulit);
			$top_products = [];

			$high_value = 0;
			$low_value = 0;

			switch($kategori_finansial) {
				case 4:
					$high_value = 500000;
					$low_value = 200001;
				break;
				case 3:
					$low_value = 100000;
					$high_value = 200000;
				break;
				case 2:
					$low_value = 50000;
					$high_value = 100000;
				break;
			}

			$ordinary_products = [];
			foreach($temp_products as $tp) {
				if($tp['harga'] >= $low_value and $tp['harga'] < $high_value) {
					array_push($top_products, $tp);
				} else {
					array_push($ordinary_products, $tp);
				}
			}

			$result_products = array_merge($top_products, $ordinary_products);
		}

		$result = $result_products;

		echo json_encode($result, JSON_PRETTY_PRINT);
	}

	public function product_button($action, $id) {
		if($action == "add") {
			if($this->kbs_m->add_single_product_score($id)) {
				echo json_encode(['status' => 'berhasil'], JSON_PRETTY_PRINT);
			} else {
				echo json_encode(['status' => 'gagal'], JSON_PRETTY_PRINT);
			}
		} else if($action == "remove") {
			if($this->kbs_m->remove_single_product_score($id)) {
				echo json_encode(['status' => 'berhasil'], JSON_PRETTY_PRINT);
			} else {
				echo json_encode(['status' => 'gagal'], JSON_PRETTY_PRINT);
			}
		} else {
			echo json_encode(['status' => 'invalid'], JSON_PRETTY_PRINT);
		}
	}

	public function save_my_recommendation($str_id) {
		$products = [];
		$temp_products = explode("_", $str_id);
		foreach($temp_products as $temp) {
			if($temp != "") {
				array_push($products, $temp);
			}
		}

		$kategori_finansial = $this->session->userdata('SESS_KBS_SKINCARE_KATEGORI_FINANSIAL');
		$certainty = $this->session->userdata('SESS_KBS_SKINCARE_CERTAINTY');
		$jenis_kulit = $this->session->userdata('SESS_KBS_SKINCARE_JENIS_KULIT');

		$rekomendasi_data = [
			'id' => NULL,
			'kategori_finansial' => $kategori_finansial,
			'jenis_kulit' => $jenis_kulit,
			'certainty' => $certainty
		];

		$rekomendasi_id = $this->kbs_m->save_recommendation($rekomendasi_data);

		foreach($products as $product) {
			$product_data = [
				'id' => NULL,
				'id_produk' => $product,
				'id_rekomendasi' => $rekomendasi_id
			];

			if(!$this->kbs_m->save_product_recommmendation($product_data)) {
				echo json_encode(['status' => "gagal"], JSON_PRETTY_PRINT);
				return;
			}
		}

		echo json_encode(['status' => 'berhasil'], JSON_PRETTY_PRINT);
	}

	public function submit_feedback() {
		$this->load->helper('string');

		$data = $this->input->post();

		$feedback_id = random_string('alnum', 15);

		foreach($data as $k => $v) {
			$kunci = explode('_', $k);
			$temp = [
				'id' => NULL,
				'feedback_id' => $feedback_id,
				'id_soal' => $kunci[1],
				'jawaban' => $v
			];

			if(!$this->kbs_m->submit_sus_answer($temp)) {
				var_dump("ada kesalahan!"); die;
			}
		}

		redirect('User/Jenis_Kulit/rekomendasi/true');
	}

}