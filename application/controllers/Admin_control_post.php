<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
class Admin_control_post extends CI_Controller {

	public function index()
	{
    $this->load->model('Post');
    $data['feed_data'] = $this->Post->getfeed();
		$this->load->view('template/header');
		$this->load->view('Admin/Admin_sub.php',$data);
	}

  public function search_post(){
    if($this->input->post('search')!=NULL){
        $this->load->model('Post');
        $data['feed_data'] = $this->Post->search_post();
        //เอา คำส่งกลับไปด้วย
        $data['wordsearch'] = $this->input->post('keyword');
				$this->load->view('template/header');
        $this->load->view('Admin/Admin_sub.php',$data);
    }else{
        redirect("Admin_control_post");
    }
  }
  public function deletepost(){
    if($this->input->post('post_number')!=NULL){
        $login_id = $this->input->post('login_number');
        $this->load->model('Post');
        $this->Post->deletePost($login_id);
        redirect("Admin_control_post");
    }
  }
  public function Edit_post(){
    if($this->input->post('post_number')!=NULL){
        $login_id = $this->input->post('login_number');
        $this->load->model('Post');
        $member_id = $this->Post->getMember_id_by_session($login_id);
        $this->Post->updataPost($member_id);
        //redirect("Maincontrol");
    }
  }
}
