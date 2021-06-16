<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_model extends CI_Model
{
    public function __construct()
    {
        //parent:: __construct();
        $this->load->database();
    }
//データベースに登録
    public function insert_row($data)
    {
        $this->db->insert('stocks', $data);
    }
    
// 登録データの取得
    public function fetch_all($limit = null){
        !empty($limit) ? $this->db->limit($limit) : false;
        return $this->db->order_by('updated_at', 'ASC')
        ->get('stocks')
        ->result_array();
    }

    public function fetch_all_rows($limit = null)
    {
        !empty($limit) ? $this->db->limit($limit) : false;
        return $this->db->order_by('updated_at', 'ASC')
            ->get('categories')
            ->result_array();
    }

//登録データの編集・更新
    public function update_row($data){
    $this->load->database();
    return $this->db->where('id', $data['id'])->update('stocks', $data);
}

//指定されたIDの取得
    public function fetch_one_row($data){
        return $this->db->where('id', $data['id'])
        ->select('id')
        ->get('stocks')
        ->row_array();
    }
    
    //指定されたIDの削除
    public function delete_row($id)
    {
        return $this->db->where('id', $id)->delete('stocks');
    }

    public function getcategory($category_id)
    {
        return $this->db->where('category_id', $category_id)
        ->get('stocks')
        ->result_array();
    }
}

?>