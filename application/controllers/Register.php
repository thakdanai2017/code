<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('Home/Homepage');
	}
  function load()
  {
		$data['result'] = "";
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
          $this->load->view('Register/RegisterSuccess');
			 	// ถ้าข้อมูลซ้ำกลับไปหน้าเดิม และ กรอกใหม่
				}else if ($this->RegisterModel->save()=="F"){
						$data["result"] = "ระบบขัดข้องกรุณาลงทะเบียนใหม่อีกครั้ง";
	          $this->load->view('Register/RegisterView',$data);
	      }else if ($this->RegisterModel->save()=="1"){
						$data["result"] = "email และ username ซ้ำกรุณากรอกใหม่";
	          $this->load->view('Register/RegisterView',$data);
	      }else if ($this->RegisterModel->save()=="2"){
						$data["result"] = "username ซ้ำกรุณากรอกใหม่";
	          $this->load->view('Register/RegisterView',$data);
	      }else if ($this->RegisterModel->save()=="3"){
						$data["result"] = "email ซ้ำกรุณากรอกใหม่";
	          $this->load->view('Register/RegisterView',$data);
	      }
      }
    }

}
