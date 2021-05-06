<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller 
{
   public function index()
  {
    $this->load->view('management_page');
  }
   public function additional_page()
   {
    $this->load->view('additional_page');
   }
   public function db_add()
   {
    if(!empty($_POST['btn_submit'])){
    
      $title = @$this->input->post('title',true);
			$num = @$this->input->post('num',true);
			$place = @$this->input->post('place',true);
      $pc = @$this->input->post('pc',true);
      $etc = @$this->input->post('etc',true);
			$now_date = date("Y-m-d H:i:s");
      

			$data = [
				'title' => $title,
				'num' => $unum,
				'place' => $place,
        'pc' => $pc,
        'etc' => $etc,
				'created_at' => $now_date
			];

			$this->Form_model->management_row($data);
			$this->load->view('management_page');
		}
	}
    public function detail_page()
   {
    $this->load->view('detail_page');
   }
}

?>