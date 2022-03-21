<?php

class SUSModel extends CI_Model {
	public function getSkor() {
		$query = "SELECT feedback_id, SUM(jawaban) as total FROM sus_feedback GROUP BY feedback_id";

		$feedbacks = $this->db->query($query)->result_array();

		$totalSkor = 0;

		foreach($feedbacks as $feedback) {
			$totalSkor += (int) $feedback['total'] * 2;
		}

		return (float) $totalSkor / count($feedbacks);
	}

	public function getSoalJawaban() {
		$query = "SELECT sus_feedback.id, sus_feedback.feedback_id, sus_pertanyaan.soal, sus_feedback.jawaban FROM sus_feedback JOIN sus_pertanyaan ON sus_feedback.id_soal = sus_pertanyaan.id";

		return $this->db->query($query)->result_array();
	}

}