<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');
class Admin_control extends CI_Controller {
	public function index()
	{
		$this->load->model('Admin_model');
		$data['mem']=$this->Admin_model->listmemall();
		$this->load->view('template/header');
		$this->load->view('Admin/Admin_main',$data);
		//$this->load->view('Profile/Profile');
	}
	public function admin_adduser()
	{
		if($this->input->post('insert')!=NULL){
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
        $this->load->view('Admin/Admin_adduser',$data);
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
					redirect('Admin_control');
        	//$this->load->view('template/header');
          //$this->load->view('Register/RegisterSuccess');
					//$this->load->view('Profile/Profiletest');
			 	// ถ้าข้อมูลซ้ำกลับไปหน้าเดิม และ กรอกใหม่
				}else if ($this->RegisterModel->save()=="F"){
						$data["result"] = "ระบบขัดข้องกรุณาลงทะเบียนใหม่อีกครั้ง";
						$this->load->view('template/header');
	          $this->load->view('Admin/Admin_adduser',$data);
	      }else if ($this->RegisterModel->save()=="1"){
						$data["result"] = "email และ username ซ้ำกรุณากรอกใหม่";
						$this->load->view('template/header');
	          $this->load->view('Admin/Admin_adduser',$data);
	      }else if ($this->RegisterModel->save()=="2"){
						$data["result"] = "username ซ้ำกรุณากรอกใหม่";
						$this->load->view('template/header');
	          $this->load->view('Admin/Admin_adduser',$data);
	      }else if ($this->RegisterModel->save()=="3"){
						$data["result"] = "email ซ้ำกรุณากรอกใหม่";
						$this->load->view('template/header');
	          $this->load->view('Admin/Admin_adduser',$data);
	      }
      }
			//redirect('Admin_control');
		}else{
			$this->load->view('template/header');
			$this->load->view('Admin/Admin_adduser');
		}
	}

	public function search_user(){
		if($this->input->post('search')!=NULL){
        $this->load->model('Admin_model');
        $data['mem']=$this->Admin_model->list_mem_by_keyword();
        //เอา คำส่งกลับไปด้วย
        $data['wordsearch'] = $this->input->post('keyword');
				$this->load->view('template/header');
        $this->load->view('Admin/Admin_main.php',$data);
    }else{
        //redirect("Admin_control");
    }
	}
	public function search_post(){
		$this->load->view('template/header');
		$this->load->view('Admin/Admin_sub');
	}

	public function Admin_edituser(){

		$login_id = $this->uri->segment(3);
				if($this->input->post('submit')!=null){
							$this->load->model('RegisterModel');
							$data['data'] = $this->RegisterModel->savauserdata($login_id);
							//$this->load->view('Home/mainpage');
							redirect("Admin_control");
							//$this->load->view('');
				}else {
						$this->load->model('RegisterModel');
						$data['userdata'] = $this->RegisterModel->getdatauser($login_id);
						//$data['test'] = $login_id;
						$this->load->view('template/header');
						$this->load->view('Admin/Admin_edituser',$data);
				}
	}

		function Admin_delete(){
			$login_id=$this->uri->segment(3);
			$this->load->model('Admin_model');
			$this->Admin_model->delete($login_id);
			redirect("Admin_control");
		}

		function Admin_uploads(){
			$data['error']= null;
				$data['upload_data']=null;
				$this->load->view('template/header');
				$this->load->view('Admin/Admin_uploads',$data);
		}
		function do_upload(){
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '1024';
			$config['encrypt_name'] = TRUE; //เข้ารหัสชื่อfile
			$config['remove_spaces'] = TRUE;
			$config['detect_mime'] = TRUE;
			$config['mod_mime_fix'] =TRUE;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());
				//$data['filename'] = $this->input->post['userfile'];
				$this->load->view('template/header');
				$this->load->view('Admin/Admin_uploads', $error );
			}
			else //สำเร็จเด้ออันนี้
			{
				$namefile = $this->upload->data();
				//$data['test'] = $namefile['file_name']; //ชื่อไฟล์
				$this->load->model('Admin_model');
				$login_id=$this->uri->segment(3);
				$oldpicture = $this->Admin_model->uploadpic($login_id,$namefile['file_name']);
				//ลบไฟล์ภาพอันเก่าเด้อ จะได้ไม่หนัก
				@unlink("./uploads/".$oldpicture);
				//$data = array('upload_data' => $namefile);
				redirect('Admin_control');
			}

		}


}
