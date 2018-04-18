<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RegisterModel extends CI_Model{
  function save(){
    $sql = "
            INSERT INTO login (email,username,password)
            VALUES(?,?,?)
            ";
    $bind_data = array(
                      $this->email,
                      $this->username,
                      md5($this->password)
                    );
    // check Duplicate email
    $this->db->where('email', $this->email);
    $query = $this->db->get('login');
    $count_row_email = $query->num_rows();
    // check Duplicate username
    $this->db->where('username', $this->username);
    $query = $this->db->get('login');
    $count_row_username = $query->num_rows();

    if ($count_row_email > 0 && $count_row_username > 0) {
        return "1";
    }
    if ($count_row_username > 0) {
         return "2";
    }
    if ($count_row_email > 0 ) {
          return "3";
    }
    else {
      //ถ้าผ่านทุกกรณี ให้ insert ค่าที่นี่
      $this->db->query($sql, $bind_data);
      //check ว่าทำสำเร็จหรือไม่
      $check = $this->db->affected_rows() > 0 ? "T":"F";
      if($check=="T"){
        //ส่งค่า id ที่พึ่งทำสำเร็จกลับมา
        $login_id = $this->db->insert_id();
        //สร้าง user ขึ้นมา
        $this->creatdatamember($login_id);
        return "T";
      }else{
        return "F";
      }
     }
  }

  private function creatdatamember($login_id){
    $sql = "INSERT INTO member(login_id) VALUES($login_id)";
    $this->db->query($sql);
  }

  public function savauserdata($login_id){
    $data = array(
			'member_name' => $this->input->post('name'),
      'member_surname' => $this->input->post('surname'),
      'member_gender' => $this->input->post('gender'),
      'member_birthday' => $this->input->post('bday'),
      //'member_picture' => $this->input->post('name').".png"
		);
		$this->db->where('login_id',$login_id);
		$this->db->update('member',$data);
  }

  public function getdatauser($login_id){
    $this->db->select('*');
    $this->db->from('member');
    $this->db->where('login_id', $login_id);
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row();
  }

  public function uploadpic($login_id,$name_picture){
    $oldpicture = $this->get_name_picture($login_id);
    $data = array(
      'member_picture' => $name_picture
    );
    $this->db->where('login_id',$login_id);
    $this->db->update('member',$data);
    return $oldpicture ;
  }

  private function get_name_picture($login_id){
    $this->db->select('member_picture');
    $this->db->from('member');
    $this->db->where('login_id', $login_id);
    $this->db->limit(1);
    return $this->db->get()->row()->member_picture;
  }

}
