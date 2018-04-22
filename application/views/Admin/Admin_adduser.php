<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
    if (!isset($this->session->userdata['logged_in']['admin_permission'])) {
      //echo $this->session->userdata['logged_in']['admin_permission'];
      header("Location:".base_url());
    }
  } else {
    header("Location:".base_url());
    //ย้ายไปหน้าที่ไม่มีการเข้าสู่ระบบ
  }
?>

</div>
</nav>
<br><br>

<!-- กล่อง Register -->
  <div class="container">
    <div class="row">
    <div class="span4 offset4 well">
    	 <legend align="center" style="padding: 10px;"> <b> Register User By Admin </b></legend>
         <?php
              echo form_open(base_url().'index.php/Admin_control/Admin_adduser',array(
              'class' => "form-horizontal" ));
        ?>

    <div class="form-group">
      <label class="control-label col-sm-3" for="username"></label>
      <div class="col-sm-8">
       <b><?php if(isset($result))echo $result; ?></b>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="username">Username :</label>
      <div class="col-sm-8">
        <input type = 'username' name = 'username' id = "username" class="form-control"  maxlength="16" placeholder="Enter username" value="<?php echo set_value('username'); ?>"> <?php echo form_error('username'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email : </label>
      <div class="col-sm-8">
        <input type = 'email' name = 'email' class="form-control" maxlength="50"  placeholder="Enter email" value="<?php echo set_value('email'); ?>"> <?php echo form_error('email'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="password">Password : </label>
      <div class="col-sm-8">
        <input type = 'password' name = 'password' class="form-control" maxlength="16"  placeholder="Enter password"> <?php echo form_error('password'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="repassword">Re-password : </label>
      <div class="col-sm-8">
        <input type = 'password' name = 'repassword' class="form-control" maxlength="16"  placeholder="Enter re-password"> <?php echo form_error('repassword'); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8" align="center">
        <input type=submit name=insert value="Register" class="btn btn-default" >
      </div>
    </div>
 </form>
</div>
</div>
</div>
</div>
</body>
</html>
