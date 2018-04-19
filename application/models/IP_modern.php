<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IP_modern extends CI_Model{
  function save(){
    $data = array(
      'ip' => $this->input->ip_address(),
      'time' => date('Y-m-d h:i:s')
    );
    $this->db->insert('IP_modern',$data);
  }
}
