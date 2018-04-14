<h1> Register </h1>

<?php  echo $result ?>
<?php
echo form_open('register/save');
?>
Email: *<br/>
<input type = "text" name = "email" maxlength="50" placeholder="กรุณาป้อน email"
  value="<?php echo set_value('email'); ?>"><br/>
  <?php echo form_error('email'); ?>
Username: *<br/>
<input type = "text" name = "username" maxlength="16" placeholder="กรุณาป้อน username"
  value="<?php echo set_value('username'); ?>"><br/>
  <?php echo form_error('username'); ?>
Password: *<br/>
<input type = "password" name = "password" maxlength="16" placeholder="กรุณาป้อน password"><br/>
  <?php echo form_error('password'); ?>
Retype-password: *<br/>
<input type = "password" name = "repassword" maxlength="16" ><br/>
  <?php echo form_error('repassword'); ?>
<input type = "submit">
</form>
