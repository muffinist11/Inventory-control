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
    // 登録全データーの取得
    public function fetch_all_rows($limit = null)
    {
        !empty($limit) ? $this->db->limit($limit) : false;
        return $this->db->order_by('updated_at', 'ASC')
            ->get('categories')
            ->result_array();
    }
    
    // 指定されたIDの取得
    public function fetch_one_row($category)
    {
        return $this->db->where('category', $category)
            ->select('id,user_id,category')
            ->get('categories')
            ->row_array();
    }

    // 指定されたIDの削除
    public function delete_row($category)
    {
        return $this->db->where('category', $category)
            ->delete('categories');
    }

    public function delete_stocks($category)
    {
        return $this->db->where('category_id', $category)
            ->delete('stocks');
    }
    
}
