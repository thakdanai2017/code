<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Maincontrol extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("IP_modern");
		$this->IP_modern->save();
	}

	public function index()
	{
		//$this->load->view('Home/mainpage');
		$this->load->model('Post');
		$data['feed_data'] = $this->Post->getfeed();
		$this->load->view('Home/mainpage' , $data );
	}

	public function saveuserdata(){
		$login_id = ($this->session->userdata['logged_in']['login_id']);
		if($this->input->post('submit')!=null){
					$this->load->model('RegisterModel');
					$data['data'] = $this->RegisterModel->savauserdata($login_id);
					//$this->load->view('Home/mainpage');
					redirect("Maincontrol");
					//$this->load->view('');
		}else {
				$this->load->model('RegisterModel');
				$data['userdata'] = $this->RegisterModel->getdatauser($login_id);
				$this->load->view('Profile/Profile',$data);
		}
	}



	public function postfeed(){
		if($this->input->post('submit')!=null){
			$login_id = ($this->session->userdata['logged_in']['login_id']);
			$this->load->model('Post');
			$this->Post->inputPost($login_id);
			//$this->load->view('Home/mainpage' , $data );
			redirect("Maincontrol");
		}
	}

	public function getlists(){
		$login_id = ($this->session->userdata['logged_in']['login_id']);
		$this->load->model('Post');
		$data['feed_data'] = $this->Post->list_by_one($login_id);
		$this->load->view('Home/MyHome' , $data );
	}

	public function updatepost(){
		//redirect("Maincontrol");
		if($this->input->post('post_number')!=NULL){
				$login_id = ($this->session->userdata['logged_in']['login_id']);
				$this->load->model('Post');
				$member_id = $this->Post->getMember_id_by_session($login_id);
				$this->Post->updataPost($member_id);
				redirect("Maincontrol");
		}
	}

	public function deletepost(){
		if($this->input->post('post_number')!=NULL){
				$login_id = ($this->session->userdata['logged_in']['login_id']);
				$this->load->model('Post');
				$this->Post->deletePost($login_id);
				redirect("Maincontrol");
		}
	}

	public function search(){
		if($this->input->post('search')!=NULL){
				$this->load->model('Post');
				$data['feed_data'] = $this->Post->search();
				//เอา คำส่งกลับไปด้วย
				$data['wordsearch'] = $this->input->post('keyword');
				//ถ้า loing ให้ไปหน้านึง ไม่ได้ loing ก็ไปอีกหน้านึง
				if(isset($this->session->userdata['logged_in']))
					$this->load->view('Home/mainpage' , $data );
				else
					$this->load->view('Home/Homepage',$data);
		}else{
			redirect("Maincontrol");
		}
	}

}
