<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
class Register extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("IP_modern");
		$this->IP_modern->save();
	}

	public function index()
	{
			//$this->load->view('template/header');
		$this->load->model('Post');
		$data['feed_data'] = $this->Post->getfeed();
		$this->load->view('Home/Homepage',$data);
	}
  function load() //จำไม่ได้ เขียนบอกที
  {
		$data['result'] = "";
		$this->load->view('template/header');
    $this->load->view('Register/RegisterView',$data);
  }
  function save(){
      $this->load->library('form_validation');
      //trim ห้ามเว้ห้ามเว้นวรรค
      $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[50]');
      $this->form_validation->set_rules('username','Username','trim|required|max_length[16]|min_length[4]');
      $this->form_validation->set_rules('password','Password','trim|required|max_length[16]|min_length[4]');
      $this->form_validation->set_rules('repassword','Re-password','trim|required|matches[password]|max_length[16]|min_length[4]');

			//ถ้ากรอกข้อมูลไม่ตรงตาม form ให้กลับไปหน้าเดิม
      if($this->form_validation->run() == FALSE)
      {
				$data['result'] = "";
				$this->load->view('template/header');
        $this->load->view('Register/RegisterView',$data);
      }
      else
			// ถ้ากรอกข้อมูลถูกต้องตาม form ให้ส่งค่าไปยัง model
      {
        $this->load->model("RegisterModel");
        $this->RegisterModel->email = $this->input->post("email");
        $this->RegisterModel->username = $this->input->post("username");
        $this->RegisterModel->password = $this->input->post("password");
				//ถ้า register สำเร็จ ให้แสดงผลว่าสำเร็จ
        if ($this->RegisterModel->save()=='T'){
        	$this->load->view('template/header');
          $this->load->view('Register/RegisterSuccess');
					//$this->load->view('Profile/Profiletest');
			 	// ถ้าข้อมูลซ้ำกลับไปหน้าเดิม และ กรอกใหม่
				}else if ($this->RegisterModel->save()=="F"){
						$data["result"] = "ระบบขัดข้องกรุณาลงทะเบียนใหม่อีกครั้ง";
						$this->load->view('template/header');
	          $this->load->view('Register/RegisterView',$data);
	      }else if ($this->RegisterModel->save()=="1"){
						$data["result"] = "email และ username ซ้ำกรุณากรอกใหม่";
						$this->load->view('template/header');
	          $this->load->view('Register/RegisterView',$data);
	      }else if ($this->RegisterModel->save()=="2"){
						$data["result"] = "username ซ้ำกรุณากรอกใหม่";
						$this->load->view('template/header');
	          $this->load->view('Register/RegisterView',$data);
	      }else if ($this->RegisterModel->save()=="3"){
						$data["result"] = "email ซ้ำกรุณากรอกใหม่";
						$this->load->view('template/header');
	          $this->load->view('Register/RegisterView',$data);
	      }
      }
    }

		public function upload_profile(){
				$data['error']= null;
				$data['upload_data']=null;
				$this->load->view('Profile/Profile_pic',$data);
		}

/*
		public function profile(){
			$this->load->view('Profile/Profile');
		}


/*
		function do_upload(){
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			//$config['overwrite'] = 'TRUE';
			//$config['file_name'] = $this->input->post['name'].".png";

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				//$error = array('error' => $this->upload->display_errors());
				$data['filename'] = $this->input->post['userfile'];
				$this->load->view('Profile/Profiletest', $data );
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());

				$this->load->view('Profile/Profiletest', $data);
			}

		} */

		function do_upload(){
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			$config['encrypt_name'] = TRUE; //เข้ารหัสชื่อfile
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				//$data['filename'] = $this->input->post['userfile'];
				$this->load->view('Profile/Profile_pic', $error );
			}
			else //สำเร็จเด้ออันนี้
			{
				$namefile = $this->upload->data();
				//$data['test'] = $namefile['file_name']; //ชื่อไฟล์
				$this->load->model('RegisterModel');
				$login_id = 18;
				$oldpicture = $this->RegisterModel->uploadpic($login_id,$namefile['file_name']);
				//ลบไฟล์ภาพอันเก่าเด้อ จะได้ไม่หนัก
				@unlink("./uploads/".$oldpicture);
				//$data = array('upload_data' => $namefile);
				$data['test'] = $oldpicture; //ชื่อไฟล์
				$this->load->view('Profile/Profile_pic',$data);
			}

		}


}
