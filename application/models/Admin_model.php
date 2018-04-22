<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set('Asia/Bangkok');
class Admin_model extends CI_Model{
  function listmemall(){
    //แก้ตรงนี้มา
    $result = $this->db->get('admin_manageuser');
    return $result->result_array();
  }
  function delete($login_id){
      $this->db->where('login_id',$login_id);
      $this->db->delete('login');
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

  public function list_mem_by_keyword()
  {
    $this->db->like('username',$this->input->post('keyword'));
    $this->db->order_by('login_id','DESC');
    $result = $this->db->get('admin_manageuser');
    return $result->result_array();
  }

}
?>
