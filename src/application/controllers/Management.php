<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller 
{
  public function __construct()
  {
    // CI_Model constructor の呼び出し
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Management_model');
    date_default_timezone_set('Asia/Tokyo');
  }
  //管理画面
  public function index()
  {
    $data = null;
    //side
    $data['category_name'] = $this->Management_model->fetch_all_rows();
    // セッションで保持した情報を$dataに代入したのちにアンセット
    if (!empty($_SESSION['success_message'])) {
      $data['success_message'] = $_SESSION['success_message'];
      unset($_SESSION['success_message']);
    }
    if (!empty($_SESSION['error_message'])) {
      $data['error_message'] = $_SESSION['error_message'];
      unset($_SESSION['error_message']);
    }
    $this->load->view('side', $data);
    //main
    $category_id = $this->input->get('category_id');
    if(!empty($category_id)){
      $data['result'] = $this->Management_model->getcategory($category_id);
      $this->load->view('management_page', $data);
    } else{
      $data['result'] = $this->Management_model->fetch_all();
      $this->load->view('management_page', $data);
    }
  }
  //新規追加画面
  public function additional_page()
  {
    $this->load->view('additional_page');
  }
  //データベースに追加
  public function db_add()
  {
    $category_id = $this->input->post('category_id',true);
    $title = $this->input->post('title', true);
    $num = $this->input->post('num', true);
    $place = $this->input->post('place', true);
    $pc = $this->input->post('pc', true);
    $etc = $this->input->post('etc', true);
    $data = [
      'category_id' => $category_id, 
      'title' => $title,
      'num' => $num,
      'place' => $place,
      'pc' => $pc,
      'etc' => $etc,
      'created_at' => date("Y-m-d H:i:s"), 
      'updated_at' => date("Y-m-d H:i:s") 
    ];
    $this->Management_model->insert_row($data);
    header("Location: /Management/index?category_id=$category_id");
  }
  //編集・詳細画面
  public function detail_page()
  {
    $this->load->view('detail_page');
  }
  //編集を更新
  public function update_row()
  {
    if (!empty($this->input->post('change'))){
      $id = $this->input->post('id');
      $category_id = $this->input->post('category_id',true); 
      $title = $this->input->post('title', true);
      $num = $this->input->post('num', true);
      $place = $this->input->post('place', true);
      $pc = $this->input->post('pc', true);
      $etc = $this->input->post('etc', true);
      $data = [
        'id' => $id,
        'category_id' => $category_id,
        'title' => $title,
        'num' => $num,
        'place' => $place,
        'pc' => $pc,
        'etc' => $etc,
        'created_at' => date("Y-m-d H:i"), 
        'updated_at' => date("Y-m-d H:i") 
      ];
      $this->Management_model->update_row($data);
      header("Location: /Management/index?category_id=$category_id");
    }
  //削除項目の選択・削除
    if ($this->input->post('delete')){
      $id = $this->input->post('id');
      $category_id = $this->input->post('category_id',true);
      $this->Management_model->delete_row($id);
      header("Location: /Management/index?category_id=$category_id");
    }
  }
}

?>