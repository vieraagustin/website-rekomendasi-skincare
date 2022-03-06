<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Algoritma extends CI_Controller {
  public function __construct() {
    parent::__construct();

    $this->load->model('BencanaModel', 'm_bencana');
    $this->load->model('RelawanModel', 'm_relawan');
  }

  private function sort_data($data) {

    $skor = array();
    foreach ($data as $key => $row)
    {
        $skor[$key] = $row['skor'];
    }

    array_multisort($skor, SORT_DESC, $data);

    return $data;
  }

  public function profile_matching($bencana_id) {
    $temp_target = $this->m_bencana->get_kriteria($bencana_id);
    $target = [];

    foreach($temp_target as $temp) {
      $target[$temp['id_keahlian']] = [
        'poin' => $temp['poin'],
        'faktor' => $temp['faktor']
      ];
    }

    $alternatif = $this->m_relawan->get_all_alternatif();

    $GAP = [];

    foreach($alternatif as $alternatif) {
        $temp_poin = [];
        foreach($alternatif['poin'] as $id => $poin) {
          # nilai masukan - nilai ketetapan awal
          $temp_poin[$id] = (int)$poin - (int)$target[$id]['poin'];
        }

        $temp_GAP = [
          'relawan_id' => $alternatif['relawan_id'],
          'user_id' => $alternatif['user_id'],
          'poin' => $temp_poin
        ];

        array_push($GAP, $temp_GAP);
    }

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

    # konversi nilai GAP
    $konversi = [];
    foreach($GAP as $gap) {
      $temp_poin = [];
      foreach($gap['poin'] as $id => $poin) {
        $temp_poin[$id] = $GAP_mapping[$poin];
      }

      $temp = [
        'relawan_id' => $gap['relawan_id'],
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
        'relawan_id' => $konv['relawan_id'],
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
        'relawan_id' => $fs['relawan_id'],
        'user_id' => $fs['user_id'],
        'nama_relawan' => $this->m_relawan->get_name($fs['relawan_id']),
        'skor' => $total
      ];

      array_push($nilai_total, $temp);
    }

    $sort_data = $this->sort_data($nilai_total);

    echo json_encode($sort_data, JSON_PRETTY_PRINT);
  }
}
