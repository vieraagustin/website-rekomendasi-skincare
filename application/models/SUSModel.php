<?php

class SUSModel extends CI_Model {
	public function getSkor() {
		$query = "SELECT feedback_id FROM sus_feedback GROUP BY feedback_id";

		$feedbacks = $this->db->query($query)->result_array();

		$totalSkor = 0;

		foreach($feedbacks as $feedback) {
			$skors = $this->db->get_where('sus_feedback', ['feedback_id' => $feedback['feedback_id']])->result_array();

			foreach ($skors as $skor) {
				if($skor['id_soal'] % 2 == 0) {
					$totalSkor += (int) $skor['jawaban'] - 5;
				} else {
					$totalSkor += (int) $skor['jawaban'] - 1;
				}
			}
		}

		return (float) $totalSkor / count($feedbacks);
	}

	public function getSoalJawaban() {
		$query = "SELECT sus_feedback.id, sus_feedback.feedback_id, sus_pertanyaan.soal, sus_feedback.jawaban FROM sus_feedback JOIN sus_pertanyaan ON sus_feedback.id_soal = sus_pertanyaan.id";

		return $this->db->query($query)->result_array();
	}

}