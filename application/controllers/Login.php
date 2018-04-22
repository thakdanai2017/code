<?php


defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class Login extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->model("IP_modern");
			$this->IP_modern->save();
		}

	public function index()
	{
		$data['error'] = "";
		$this->load->view('template/header');
		$this->load->view('Home/LoginView',$data);
	}
  function save(){
      $this->load->library('form_validation');
      //trim ห้ามเว้ห้ามเว้นวรรค
      $this->form_validation->set_rules('username','Username','trim|required|max_length[16]|min_length[4]');
      $this->form_validation->set_rules('password','Password','trim|required|max_length[16]|min_length[4]');
			//ถ้ากรอกข้อมูลไม่ตรงตาม form ให้กลับไปหน้าเดิม
      if($this->form_validation->run() == FALSE)
      {
				$data['result'] = "";
				$this->load->view('template/header');
        $this->load->view('Home/LoginView',$data);
      }
      else
			// ถ้ากรอกข้อมูลถูกต้องตาม form ให้ส่งค่าไปยัง model
      {
        $this->load->model("LoginModel");
        $this->LoginModel->username = $this->input->post("username");
        $this->LoginModel->password = $this->input->post("password");
				//ถ้า register สำเร็จ ให้แสดงผลว่าสำเร็จ
      	//$data['test'] = $this->LoginModel->login()->login_id;

				//logged_in สำเร็จ
				if ($this->LoginModel->login() != false) {
					// Load session library
					$this->load->library('session');
					if($this->LoginModel->login()->level == 1){
						$session_data = array(
						'login_id' => $this->LoginModel->login()->login_id,
						'username' => $this->LoginModel->login()->username,
						'admin_permission' => "admin_permission_success"
						);
					}else {
						$session_data = array(
						'login_id' => $this->LoginModel->login()->login_id,
						'username' => $this->LoginModel->login()->username,
						//'admin_permission' => "no_permisstion"
						);
					}


					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);

					//$this->load->view('Home/mainpage');
					redirect('Maincontrol');
				}
				else {
					$data['error'] = "เข้าระบบไม่สำเร็จกรุณาตรวจสอบ username password";
					//$this->load->view('Home/Homepage');
					$this->load->view('template/header');
					$this->load->view('Home/LoginView',$data);

				}
				//$this->load->view('test',$data);
      }
  	}
/*
		public function mainpage(){
			$this->load->view('Home/mainpage');
		}
*/
		public function logout(){
			session_destroy();
			$this->session->set_userdata('logged_in', null );
			//$this->load->view('template/header');
			//$this->load->view('Home/Homepage');
			redirect('Maincontrol');
		}





}
