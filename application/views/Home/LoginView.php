<?php
  //ถ้ามีการ login ไว้แล้ว ก็จะไปหน้า home
  if (isset($this->session->userdata['logged_in'])) {
    header("Location: index.php/Maincontrol");
  }
?>

<!-- แถบบน -->
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url('index.php')?>"><font color="#fffff">Slight</font></a>
  </div>
</div>
</nav>
<br /><br />

<!-- กล่อง login -->

  <div class="container">
    <div class="row">
    <div class="span4 offset4 well">
    <!-- 	<?php
echo form_open('login/save');
?> -->
    	 <legend align="center"  > <b> Login </b></legend>
      <form name = login class="form-horizontal" action='<?php echo base_url('index.php/login/save');?>' method='POST'>
      <div class="form-group">
        <label class="control-label col-sm-8" for="password"><?php echo $error; ?> </label> <!-- ต้องชนิด password เพื่อให้ซ่อนรหัสตอนกรอกรหัส -->
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Username :</label>
      <div class="col-sm-8">
        <input type = 'text' name = 'username' id = "username" class="form-control"   placeholder="Enter username" value="<?php echo set_value('username'); ?>">
         <?php echo form_error('username'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="password">Password : </label> <!-- ต้องชนิด password เพื่อให้ซ่อนรหัสตอนกรอกรหัส -->
      <div class="col-sm-8">
        <input type = 'password' name = 'password' class="form-control" maxlength="16"  placeholder="Enter password">
         <?php echo form_error('password'); ?>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8" align="center">
        <input type =submit name =insert value="Sign in" class="btn btn-default" >
      </div>
    </div>
 </form>
</div>
</div>
</div>
</div>