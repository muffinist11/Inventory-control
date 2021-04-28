<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
    {
        // CI_Model constructor の呼び出し
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Form_model');
        date_default_timezone_set('Asia/Tokyo');
        
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function adminlogin()
	{
		$this->load->view('adminlogin');
	}


	public function registar()
	{
		
		$data = null;
        

        if (!empty($_SESSION['error'])){     
            $data['error'] = $_SESSION['error']; 
            unset($_SESSION['error']);
            // $page_flag = 0;

        } elseif (!empty($_SESSION['clean'])){
			$data['clean'] = $_SESSION['clean'];
			unset($_SESSION['clean']);
          // $page_flag = 1;
        }

		$this->load->view('registar',$data);
	}

	//入力エラー表示 validation
	public function validation() {


		$user_name = @$this->input->post('user_name',true) ?:null;
		$user = @$this->input->post('user',true) ?:null;
		$pass = @$this->input->post('pass',true) ?:null;
		$compass = @$this->input->post('compass',true) ?:null;

		
		$error = null;
		$clean = null;
		
	
		if(empty($user_name)) {
			$error[] = "「氏名」は必ず入力してください";
			} elseif( 20 < mb_strlen($name)) {
			$error[] = "「氏名は20文字以内で入力してください」";
			} 
		
		if(empty($user)) {
			$error[] = "「ユーザーid」は必ず入力してください";
			} elseif(6 > mb_strlen($user))  {
			$error[] = "「ユーザーidは6桁以上で入力してください」";
			} 

		if(empty($pass)) {
			$error[] = "「パスワード」は必ず入力してください";
			} elseif(6 > mb_strlen($pass)) {
			$error[] = "「パスワード」は６桁以上で入力してください";
			}

		if(empty($compass)) {
			$error[] = "「パスワード確認」は必ず入力してください";
			} elseif($compass !== $pass) {
			$error[] = "「パスワード」と「確認パスワード」が一致しません";
		}

		


		if(empty($error)){
			$clean = array();
			foreach( $_POST as $key => $value ) {
				$clean[$key] = $this->security->xss_clean($value);
				$_SESSION['clean'] = $clean;
			}
		} else {
			$_SESSION['error'] = $error;
		}
		header('location: /form/registar');
		exit();
	}

	public function db_act(){


		if(!empty($_POST['btn_submit'])){


			$user_name = @$this->input->post('user_name',true);
			$user = @$this->input->post('user',true);
			$pass = @$this->input->post('pass',true);
			$now_date = date("Y-m-d H:i:s");

			$data = [
				'user_name' => $user_name,
				'user' => $user,
				'pass' => $pass,
				'created_at' => $now_date
			];

			$this->Form_model->insert_row($data);

			$this->load->view('touroku');
		}
	}



	


}
