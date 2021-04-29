<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Form_model extends CI_Model
{

    public function insert_row($data)
    {
    $this->load->database();
    return $this->db->insert('users',$data);
    }

    public function log_get($user)
    {
    $this->load->database();
    $query = $this->db->get_where('users',array('user'=> $user));
    return $query->row_array();
    }

    public function table_row(){
        $this->load->database();
        $query = $this->db->query('SELECT id,user_name,user,pass FROM users');
        $res = $query->result('array');
        return $res;
    }

}