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


  <!-- ช่องค้นหา&ลงทะเบียน -->
    <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('index.php/maincontrol/getlists'); ?>"><span class="glyphicon glyphicon-user"></span><font color="#fffff"> <?php echo $username; ?> </font></a></li>
            <li><div class="dropdown">
                <i class="fa fa-gear dropdown-toggle" data-toggle="dropdown" style="font-size:24px;bottom: 0;padding: 10px;"></i>
                    <ul class="dropdown-menu" style="background-color: #e6e6e6;">
                          <li><a href="<?php echo base_url('index.php/maincontrol/saveuserdata'); ?>">Edit Profile</a></li>
                          <li><a href="<?php echo base_url('index.php/register/upload_profile') ?>">Upload Picture</a></li>
                          <li><a href="<?php echo base_url('index.php/Login/logout'); ?>">Logout</a></li>
                    </ul>
                </div>
            </li>
    </ul>

<!-- ช่องค้นหา -->
  <form class="navbar-form" action="123456" align="center">
    <div class="input-group">
      <input type="text" class="form-control"  size="80" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
    </div>
  </form>
</div>
</nav>
<?php $login_id=$this->uri->segment(3);
?>
<!-- กล่อง login -->
<br>
<div align="center">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:1000px" >
       <legend align="center" style="padding: 20px;"> <b>Upload Profile Picture By Admin </b> </legend>
    <?php echo form_open_multipart('admin_control/do_upload/'.$login_id,array('class' => 'form-horizontal' ));?>
    <br />
    <?php echo $error; ?>
    <img id="img" src="" alt="" align="center" style="width: 200px;height:200px;padding: 20px;"/>
    <div class="form-group" align="left">
      <label class="control-label col-sm-3" for="picture">Picture  : </label>
      <div class="col-sm-8" align="left">
          <input type="file" name="userfile" size="100" OnChange="Preview(this)"/>
      </div>

      <div class="col-sm-offset-2 col-sm-8" align="center" style="padding: 20px;">
        <input type="submit" value="upload" name="upload" class="btn btn-default"  OnChange="Preview(this)"/>
      </div>
    </div>
  </form>
</div>
</div>

<!-- footer -->
<div class="footer">
  <p>Footer Text</p>
</div>
</body>
</html>
