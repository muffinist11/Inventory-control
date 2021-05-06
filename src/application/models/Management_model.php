<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_model extends CI_Moel
{
    public function management_row($data)
    {
    $this->load->database();
    return $this->db->insert('stocks',$data);
    }
    public function table_row(){
        $this->load->database();
        $query = $this->db->query('SELECT id,title,num,place,pc,etc FROM stocks');
        $query = $this->db->where('delete_flag',0);
        /*$query = $this->db->get('users',4,$this->uri->segment(3));*/
        $res = $query->result('array');
        return $res;
    }
}



?>