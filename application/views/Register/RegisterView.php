
<?php
  //ถ้ามีการ login ไว้แล้ว ก็จะไปหน้า home
  //if (isset($this->session->userdata['logged_in'])) {
  //  header("Location: index.php/Maincontrol");
  //}

?>


</div>
</nav>
<br><br>

<!-- กล่อง Register -->
  <div class="container">
    <div class="row">
    <div class="span4 offset4 well">
    	 <legend align="center" style="padding: 10px;"> <b> Register </b></legend>
         <?php
              echo form_open('register/save',array(
              'class' => "form-horizontal" ));
        ?>

    <div class="form-group">
      <label class="control-label col-sm-3" ></label>
      <div class="col-sm-8">
            <b><?php echo $result; ?></b>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="username">Username :</label>
      <div class="col-sm-8">
        <input type = 'username' onkeyup="isEngchar(this.value,this)" name = 'username' id = "username" class="form-control"  maxlength="16" placeholder="Enter username" value="<?php echo set_value('username'); ?>"> <?php echo form_error('username'); ?>
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
        <input type =submit name =insert value="Register" class="btn btn-default" >
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
</body>
</html>
