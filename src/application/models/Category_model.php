<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Category_model extends CI_Model
{
    public function __construct()
    {
        
        $this->load->database();
    }
    // データベースにデータ登録
    public function insert_row($data)
    {
        return $this->db->insert('categories', $data);
    }

    public function fetch_all_rows($limit = null)
    {
        !empty($limit) ? $this->db->limit($limit) : false;
        return $this->db->order_by('updated_at', 'ASC')
            ->get('categories')
            ->result_array();
    }
}
