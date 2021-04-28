<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Form_model extends CI_Model
{

    public function insert_row($data)
    {
    $this->load->database();
    return $this->db->insert('users',$data);
    }

}