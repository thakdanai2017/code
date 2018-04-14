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
      $this->db->query($sql, $bind_data);
      return $this->db->affected_rows() > 0 ? "T":"F";
     }
    //return $this->db->affected_rows() > 0 ? "T":"F";
  }

}
