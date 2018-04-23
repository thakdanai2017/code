<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
    if (isset($this->session->userdata['logged_in']['admin_permission'])) {
      //echo $this->session->userdata['logged_in']['admin_permission'];
      header("Location:".base_url('index.php/Admin_control'));
    }
  }
?>

<!-- แถบบน -->

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
    	 <legend align="center" style="padding: 10px;"> <b> Login </b></legend>
      <form name = login class="form-horizontal" action='<?php echo base_url('index.php/login/save');?>' method='POST'>
      <div class="form-group">
        <label class="control-label col-sm-8" for="password">
          <?php //echo $error; ?>
          <?php if(isset($error))
                  echo $error;
                else {
                  echo '';
                }
           ?>
        </label> <!-- ต้องชนิด password เพื่อให้ซ่อนรหัสตอนกรอกรหัส -->
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Username :</label>
      <div class="col-sm-8">
        <input type = 'text' name = 'username' onkeyup="isEngchar(this.value,this)" id = "username" class="form-control"  maxlength="16" placeholder="Enter username" value="<?php echo set_value('username'); ?>">
         <?php echo form_error('username'); ?>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="password">Password : </label> <!-- ต้องชนิด password เพื่อให้ซ่อนรหัสตอนกรอกรหัส -->
      <div class="col-sm-8">
        <input type = 'password' name = 'password'  class="form-control" maxlength="16"  placeholder="Enter password">
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
<script type="text/javascript">
function isEngchar(str,obj){
    var isEng=true;
    var orgi_text=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    var chk_text=str.split("");
    chk_text.filter(function(s){
        if(orgi_text.indexOf(s)==-1){
            isEng=false;
            obj.value=str.replace(RegExp(s, "g"),'');
        }
    });
    return isEng;
}
</script>
