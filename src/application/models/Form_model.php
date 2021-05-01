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
        $query = $this->db->get('users',4,$this->uri->segment(3));
        $res = $query->result('array');
        return $res;
    }

    public function page_row(){
        $this->load->database();
        $query = $this->db->get("users");
        return $query->num_rows();
    }

    public function update_row($id,$data){

        $this->load->database();

        return $this->db->where('id', $id)
                ->update('users', $data);
    }

    public function delete_row($id){
        $this->load->database();
        return $this->db->where('id', $id)
            ->delete('users');
    }


    

}