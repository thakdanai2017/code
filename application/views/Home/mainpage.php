<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
    if (isset($this->session->userdata['logged_in']['admin_permission'])) {
      //echo $this->session->userdata['logged_in']['admin_permission'];
      header("Location:".base_url('index.php/Admin_control'));
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
  <form class="navbar-form" action="<?php echo base_url();?>index.php/maincontrol/search" method="post" align="center">
    <div class="input-group">
      <input type="text" class="form-control" name="keyword" size="80" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="search" value="search">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
    </div>
  </form>
</div>
</nav>
<br>
 <!-- กล่องโพสต์ -->
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:30px;margin-left:180px;" >
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <br>
           <?php
           if($userdata->member_picture==NULL){ ?>
           <p class="w3-center"><img src="<?php echo base_url('assets/img/logo2.png');?>" class="w3-circle" style='width:100px' alt="<?php echo $username;?>"></p>
          <?php }else{?>
            <p class="w3-center"><img src="<?php echo base_url('uploads/'.$userdata->member_picture);?>" class="w3-circle" style='width:100px' alt="<?php echo $username;?>"></p>
            <?php }?>
         <h5 class="w3-center"> <?php echo $username; ?> </h5><br>
        </div>
      </div>

    <!-- End Left Column -->
  </div>
    <!-- Middle Column -->
<div class="container">
  <form class="form-horizontal postfeed" action='<?php echo base_url(); ?>index.php/maincontrol/postfeed' method='POST'>
  <div class="w3-col m8">
      <div class="w3-row-padding">
        <div class="w3-col m11">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">สร้างโพสต์</h6>
              <input type="text" name = 'content' id = "content" class="form-control"  maxlength="100" placeholder=" คุณกำลังคิดอะไรอยู่ ? "><br>
              <button type =submit name =submit value="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i>  Post</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</div>
</div>

<!-- กล่องที่โพสต์แบ้ว -->
<br>
<?php foreach ($feed_data as $value) { ?>
<div align="center" bgcolor="#FFDEAD">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:1000px"><br>
        <?php
  #ถ้ามีรูปแสดงรูป แต่ถ้าไม่มีรูปให้แสดง ภาพตั้งตัน
  if($value['member_picture']!=NULL){
    echo "<img class='img img-circle' src='".base_url('uploads/'.$value['member_picture'])."'style='width:100px'>";
  }else {
    echo "<img class='img img-circle' src='".base_url('uploads/30422253_1813735568931061_1243079156_n.png')."' style='width:100px'>";
  }
  ?>
        <span class="w3-right "><font color="#000000" size="1">
          <!-- ใส่เวลาจากตรงนี้นะ -->
          <script language="javascript">
          document.write(maketime("<?php echo $value['post_datetime']; ?>"));
          </script>
          <!-- ใส่เวลาจากตรงนี้นะ -->
          <br></font></span>
        <h5 align="left"><?php echo $value['username'];?><br></h5>
        <br>

        <p align="left"><?php echo $value['post_detail']; ?></p>
  </div>
</div>
<?php } ?>

</body>
</html>
