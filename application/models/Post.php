<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//date_default_timezone_set('Asia/Bangkok');
class Post extends CI_Model{

  function inputPost($login_id){
    $content = $this->input->post('content');

    $sql = "SELECT member_id FROM member WHERE login_id = $login_id";
    $query = $this->db->query($sql);

    $data = array(
        'member_id' => $query->row()->member_id,
        'post_datetime' => date('Y-m-d h:i:s'),
        'post_detail' => $this->input->post('content')
    );
    $this->db->insert('post', $data);

    //return $query->row()->member_id;

  }

  function getfeed(){
    $this->db->limit(5);
    $this->db->order_by('post_id','DESC');
    $result = $this->db->get('Member_post');
    return $result->result_array();
  }

  function list_by_one($login_id){
    $this->db->WHERE('login_id',$login_id);
    $this->db->order_by('post_id','DESC');
    $result = $this->db->get('Member_post');
    return $result->result_array();
  }

  function updataPost($member_id){
    $data = array(
        'post_detail' => $this->input->post('content')
    );

    $this->db->where('post_id = '.$this->input->post('post_number'));
    $this->db->where('member_id ='.$member_id);
    $this->db->update('post', $data);
  }

  function deletePost($login_id){
    $this->db->where('post_id = '.$this->input->post('post_number'));
    $this->db->delete('post');
  }

  function getMember_id_by_session($login_id){
    $this->db->select('member_id');
    $this->db->from('member');
    $this->db->where('login_id', $login_id);
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row()->member_id;
  }

  function search(){
      //$this->db->like('post_detail',$this->input->post('keyword'));
      $this->db->like('username',$this->input->post('keyword'));
      $this->db->order_by('post_id','DESC');
      $result = $this->db->get('Member_post');
      return $result->result_array();
  }

}
