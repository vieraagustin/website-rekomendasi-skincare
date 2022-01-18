<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login_m extends CI_Model
{

    function auth($post)
    {
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        $query = $this->db->get();
        return $query;
    }
}