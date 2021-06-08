<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

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
		session_destroy();
		$this->load->view('login');
	}

	public function adminlogin()
	{
		session_destroy();
		$this->load->view('adminlogin');
	}

	// 丹下さんも使用できます
	public function logout(){
		session_destroy();
		header('Location: index');
	}

	public function admin_page()
	{	
		
		if(isset($_SESSION['user'])) {
			$this->load->view('admin_page');
		} else {
			header('HTTP/1.1 401 Unauthorized');
		}
	}


	
	public function login_check()


	{
		$user = $this->input->post('user',true);
		$pass = $this->input->post('pass',true);
		
		$this->Form_model->log_get($user);
		$this->load->model('Form_model');

		$loguser = $this->Form_model->log_get($user);
		
		if($loguser['pass'] !== $pass){


		header("Location: /form/index");
		} else {
		// 丹下さんカテゴリページ
		// header("ユーザーページ");
	    $_SESSION['loguser'] = $loguser['user'];
		header("Location: /Category");
		exit;
	}         
	}


	public function admin_check()
	{

		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

			$this->load->library('session');
			$user = $this->input->post('user',true);
			$pass = $this->input->post('pass',true);
			$_SESSION = $_POST;
			
			$user = $_SESSION['user'];
			$pass = $_SESSION['pass'];
			
			$this->Form_model->admin_get();
			$this->load->model('Form_model');

			$data = $this->Form_model->admin_get();

			foreach($data as $value){
				$adminuser = $value['user'];
				$adminpass = $value['pass'];
			}

			if($adminuser === $user && $adminpass === $pass){
			header("Location: /form/admin_page");

			} else {
				header("Location: /form/adminlogin");
			}
			
		} else {
			header('HTTP/1.1 401 Unauthorized');        
		}

	}

	public function registar()
	{
		
		if(isset($_SESSION['user'])){

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

		} else {
			header('HTTP/1.1 401 Unauthorized'); 
		}
	}

	//入力エラー表示 validation
	//空の入力時にはinput要素のrequired属性で対応
	public function validation() {


		$user_name = $this->input->post('user_name',true) ?:null;
		$user = $this->input->post('user',true) ?:null;
		$pass = $this->input->post('pass',true) ?:null;
		$compass = $this->input->post('compass',true) ?:null;

		$this->Form_model->log_get($user);
		$this->load->model('Form_model');

		$loguser = $this->Form_model->log_get($user);

		
		$error = null;
		$clean = null;
		
	
		if( 20 < mb_strlen($user_name)) {
			$error[] = "「氏名は20文字以内で入力してください」";
			} 
		
		if(6 > mb_strlen($user))  {
			$error[] = "「ユーザーidは6桁以上で入力してください」";
		} elseif($loguser['user'] == $user) {
				$error[] = "このユーザーIDは使われています";
			};
		
		if(6 > mb_strlen($pass)) {
			$error[] = "「パスワード」は６桁以上で入力してください";
		} 
		
		if($compass !== $pass) {
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

			$user_name = $this->input->post('user_name',true);
			$user = $this->input->post('user',true);
			$pass = $this->input->post('pass',true);
			$now_date = date("Y-m-d H:i:s");

			$data = [
				'user_name' => $user_name,
				'user' => $user,
				'pass' => $pass,
				'created_at' => $now_date
			];

			$this->Form_model->insert_row($data);

			$this->load->view('touroku');
		} else {
			header('HTTP/1.1 401 Unauthorized');
		}
	}

	public function users_edit()
	{	
		if(isset($_SESSION['user'])){

			$this->Form_model->table_row();
			$data['result'] = $this->Form_model->table_row();

			// pagination
			$this->load->library('pagination');
			$config ['base_url'] = "/form/users_edit";
			$config ['total_rows'] = $this->Form_model->page_row();
			$config ['per_page'] = 4;
			$config ['prev_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config ['prev_tag_close'] = '</div></li>';
			$config ['cur_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config ['cur_tag_close'] = '</div></li>';
			$config ['num_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config ['num_tag_close'] = '</div></li>';
			$config ['next_tag_open'] = '<li class="page-item"><div class="page-link">';
			$config ['next_tag_close'] = '</div></li>';


			$this->pagination->initialize($config);

			$this->load->view('users_edit',$data);
		} else {
			header('HTTP/1.1 401 Unauthorized');
		}

	}

	public function edit(){

		if(isset($_SESSION['user'])){

			$id = $this->input->post('id');
			$user_name = $this->input->post('uesr_name');
			$user = $this->input->post('user');
			$pass = $this->input->post('pass');


			if(!empty($this->input->post('btn_submit'))){
				$this->load->view('edit');
			}

			if (!empty($this->input->post('change'))){

			$user_name = $this->input->post('user_name');
			$user = $this->input->post('user');
			$pass = $this->input->post('pass');
			$updated_at = date("Y-m-d H:i:s");

			$data = [
				'user_name' => $user_name,
				'user' => $user,
				'pass' => $pass,
				'updated_at' => $updated_at
			];

			$this->Form_model->update_row($id,$data);

			header('location:/form/users_edit');
			
			}

			if (!empty($this->input->post('delete'))){

				$user_name = $this->input->post('user_name');
				$user = $this->input->post('user');
				$pass = $this->input->post('pass');

				$data = [
					'user_name' => $user_name,
					'user' => $user,
					'pass' => $pass,
				];

				$this->Form_model->delete_row($id,$data);

				header('location:/form/users_edit');
				
				}


			if(!empty($this->input->post('back'))){
				header('location:/form/users_edit');
			}
		} else {
				header('HTTP/1.1 401 Unauthorized'); 
			}
	}
	
}
