<?php

class KBSController extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('KBSModel', 'kbs_m');
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

    // get all alternative
    $alternative = $this->kbs_m->get_all_alternative();

    if(count($alternative) < 5) {
    	return $result;
    }

    foreach($alternative as $al) {
    	var_dump($al);
    	echo "<br><br>";
    }

    die;


    // value * (maksimum - minimum) + minimum
    $new_value = (int) ($value * (4 + 4) - 4);

    die;

    $alternatif = $this->m_kbs->get_all_alternatif();

    $GAP = [];

    foreach($alternatif as $alternatif) {
        $temp_poin = [];
        foreach($alternatif['poin'] as $id => $poin) {
          # nilai masukan - nilai ketetapan awal
          $temp_poin[$id] = (int)$poin - (int)$target[$id]['poin'];
        }

        $temp_GAP = [
          'kbs_id' => $alternatif['kbs_id'],
          'user_id' => $alternatif['user_id'],
          'poin' => $temp_poin
        ];

        array_push($GAP, $temp_GAP);
    }
    
    # konversi nilai GAP
    $konversi = [];
    foreach($GAP as $gap) {
      $temp_poin = [];
      foreach($gap['poin'] as $id => $poin) {
        $temp_poin[$id] = $GAP_mapping[$poin];
      }

      $temp = [
        'kbs_id' => $gap['kbs_id'],
        'user_id' => $gap['user_id'],
        'poin' => $temp_poin
      ];

      array_push($konversi, $temp);
    }

    # faktor NCF dan NSF
    $faktor_score = [];
    $persen_faktor = []; # untuk menghitung NT

    foreach($konversi as $konv) {

      $faktor = [];
      $n_faktor = [];
      foreach($konv['poin'] as $id => $poin) {
        $faktor_id = (int) $target[$id]['faktor'];

        if(!array_key_exists($faktor_id, $faktor)) {
          $faktor[$faktor_id] = $poin;
          $n_faktor[$faktor_id] = 1;
        } else {
          $faktor[$faktor_id] += $poin;
          $n_faktor[$faktor_id] += 1;
        }
      }

      $t_faktor = [];
      foreach($faktor as $k => $v) {
        $t_faktor[$k] = $v / $n_faktor[$k];
      }

      $final_faktor = [];

      foreach($t_faktor as $k => $v) {
        $nama_faktor = $this->m_bencana->get_faktor_name($k);

        $final_faktor[$nama_faktor['nama']] = $v;
        $persen_faktor[$nama_faktor['nama']] = (float) ((float) $n_faktor[$k] / array_sum($n_faktor));
      }

      $temp = [
        'kbs_id' => $konv['kbs_id'],
        'user_id' => $konv['user_id'],
        'faktor' => $final_faktor
      ];

      array_push($faktor_score, $temp);
    }

    $nilai_total = [];
    foreach($faktor_score as $fs) {
      $total = 0.0;
      foreach($fs['faktor'] as $k => $v) {
        $total += $persen_faktor[$k] * $v;
      }

      $temp = [
        'kbs_id' => $fs['kbs_id'],
        'user_id' => $fs['user_id'],
        'nama_kbs' => $this->m_kbs->get_name($fs['kbs_id']),
        'skor' => $total
      ];

      array_push($nilai_total, $temp);
    }

    $sort_data = $this->sort_data($nilai_total);

    return $result;
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

}