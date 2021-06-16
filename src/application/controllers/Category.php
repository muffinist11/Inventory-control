<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{

  public function __construct()
  {
    // CI_Model constructor の呼び出し
    parent::__construct();
    $this->load->library('session');
    $this->load->model('Category_model');
    date_default_timezone_set('Asia/Tokyo');
  }

  public function index()
  {
    $data = null;
    // データベースからカテゴリー全体を持ってくる
    $data['category_name'] = $this->Category_model->fetch_all_rows();
    // セッションで保持した情報を$dataに代入したのちにアンセット
    if (!empty($_SESSION['success_message'])) {
      $data['success_message'] = $_SESSION['success_message'];
      unset($_SESSION['success_message']);
    }
    if (!empty($_SESSION['error_message'])) {
      $data['error_message'] = $_SESSION['error_message'];
      unset($_SESSION['error_message']);
    }
    // VIEWに$dataを渡す
    $this->load->view('category_view', $data);
  }

  // カテゴリーの追加
  public function add_category()
  {
    $name = $this->input->post('category', true);
    $data = null;
    if (!empty($_SESSION['success_message'])) {
      $data['success_message'] = $_SESSION['success_message'];
      unset($_SESSION['success_message']);
    }
    if (!empty($_SESSION['error_message'])) {
      $data['error_message'] = $_SESSION['error_message'];
      unset($_SESSION['error_message']);
    }
    if ($this->input->post('btn_add')) {
      $error_message = null;
      if (empty($name)) {
        $error_message[] = '内容を入力してください';
      }
      if (empty($error_message)) {
        $res = $this->Category_model->category_check($name);
        // $resにtrueが入ってきているのかを確認
        if ($res) {
          $error_message[] = '追加のカテゴリーはデータベースに登録されています。';
          $_SESSION['error_message'] = $error_message;
          $data ['error_message']= $_SESSION['error_message'];
          unset($_SESSION['error_message']);
          // $this->load->view('add_category_view', $data);
        } else {
          $data = [
            'category' => $name,
            'user_id' => $_SESSION['loguser'],
            'created_at' => date("Y-m-d H:i:s")
          ];
          $success_message = null;
          if ($this->Category_model->insert_row($data)) {
            $_SESSION['success_message'] = 'カテゴリーを追加しました。';
          } else {
            $_SESSION['error_message'] = 'カテゴリーの追加に失敗しました。';
          }
        }
      } else {
        $data['error_message'] = $error_message;
      }
      // $data = $_SESSION;
      // unset($_SESSION);
    }
    $this->load->view('add_category_view', $data);
  }

  public function category_table()
  {
    $data['category_neme'] = $this->Category_model->fetch_all_rows();
    header('Location: /Category');
  }
  // 削除項目の選択
  public function category_delete()
  {
    $category = $this->input->get('category_id');
    if (!empty($category)) {
      $data['categories'] = $this->Category_model->fetch_one_row($category);
      if (!empty($data['categories'])) {
        $data['category_name'] = $this->Category_model->fetch_all_rows();
        $this->load->view('category_delete_view', $data);
      } else {
        $_SESSION['error_message'] = '存在しないレコードです。';
        header('Location: /Category/add_category');
        exit();
      }
    } else {
      header('Location: /');
      exit();
    }
  }

  // 削除の実行
  public function delete_category_item()
  {
    if (!empty($category = $this->input->post('category_id', true))) {
      $category = $this->input->post('category_id');
      if ($this->Category_model->delete_row($category) && $this->Category_model->delete_stocks($category)) {
        $_SESSION['success_message'] = '削除しました。';
      }
      header('Location: /Category');
      exit();
    } else {
      $_SESSION['error_message'] = '削除に必要なパラメータは含まれていません。';
      header('Location: /Category');
      exit;
    }
  }
}
