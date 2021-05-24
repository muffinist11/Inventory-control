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
    // データベースから値をすべて持ってくる
    $data['result'] = $this->Management_model->fetch_all_rows();
     // VIEWに$dataを渡す
    $this->load->view('management_page', $data);
  }

  //新規追加画面
   public function additional_page()
   {
    $this->load->view('additional_page');
   }
   //データベースに追加
   public function db_add()
   {
     //$category_id = 
    $title = $this->input->post('title', true);
    $num = $this->input->post('num', true);
    $place = $this->input->post('place', true);
    $pc = $this->input->post('pc', true);
    $etc = $this->input->post('etc', true);
    // $created_at = $this->input->post('created_at', true);
    // $updated_at = $this->input->post('updated_at', true);

    $data = [
      //'category_id' = 
      'title' => $title,
      'num' => $num,
      'place' => $place,
      'pc' => $pc,
      'etc' => $etc,
      'created_at' => date("Y-m-d H:i:s"), 
      'updated_at' => date("Y-m-d H:i:s") 
    ];
    
    $this->Management_model->insert_row($data);
    $this->index();
    
   }

   //編集・詳細
   public function detail_page()
   {
    $this->load->view('detail_page');
   }

  }


?>