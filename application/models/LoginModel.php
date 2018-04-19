<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LoginModel extends CI_Model{
  function login(){
    //$sql = "SELECT * FROM login WHERE username = ? AND password = ? " ;
    //$bind_data = array($this->username,md5($this->password));
    //$this->db->query($sql, $bind_data);
    $username = $this->username;
    $password = md5($this->password);
    $condition = "username LIKE '$username' AND password LIKE '$password'" ;
    $this->db->select('login_id,username,level');
    $this->db->from('login');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    return $query->row() ;
  }
}
