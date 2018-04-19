<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
  echo $username;
  } else {
    //header("location: login");
    echo "null";
  }
?>

<a href="<?php echo base_url('Main_control/mainpage')?>">mainpage</a>
</html>
