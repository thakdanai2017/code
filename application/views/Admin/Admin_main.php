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


    <!-- เมนูแถบขวาบน -->
 <ul class="nav navbar-nav navbar-right">
        <li>
          <div class="btn-group">
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('index.php/Admin_control') ?>'">Admin Manage User</button>
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('index.php/Admin_control_post') ?>'">Admin Manage Post</button>
          </div>
        </li>
        <li><a href="<?php echo base_url('index.php/maincontrol/getlists'); ?>"><span class="glyphicon glyphicon-user"></span><font color="#fffff"> <?php echo "Admin : ".$username; ?> </font></a></li>
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

</div>
</nav>

<!-- กล่องโพสต์ -->
<div align="center">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:1000px">
<h3 align="center">Manage Users</h3>
  <hr class="w3-clear">

    <!-- ช่องค้นหา -->

  <table border="0" align="center">
  <tr>
  <td>
    <form class="navbar-form" method="post" action="<?php echo base_url()?>index.php/Admin_control/search_user" align="right">
    <div class="input-group">
      <input type="text" class="form-control"  name='keyword' size="80" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="search" value="search">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
    </div>
    </td>
    <td><button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url('index.php/Admin_control/admin_adduser') ?>'">AddUser</button></td>
    </tr>
 </form>
 </table>

<br>

<!--ช่องโพสต์-->

<div align="left">
<!-- foreach -->
<?php foreach ($mem as $row) { ?>
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:900px"><br>
<table border="0" width="850">

  <tr>
        <td width="">
          <img src="<?php echo base_url('uploads/'.$row['member_picture'])?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:50px">
        </td>
        <td>
          <b><?php echo $row['username'] ?></b>
        </td>
        <td width="350">
          <h5 align="left">
            <?php echo $row['member_name']." ".$row['member_surname'];?>
          </h5>
        </td>
        <td ><div align="right" ><button type="button" onclick="Edit_user(<?php echo $row['login_id'] ?>)" class="btn btn-success" style="margin-bottom:5px">Edit</button></div></td>
        <td width="100"><div align="right" ><button type="button" onclick="Uploads(<?php echo $row['login_id'] ?>)" class="btn btn-info" style="margin-bottom:5px">Uploads</button></div></td>
        <td width="90"><div align="right" ><button type="button" onclick="Delete_user(<?php echo $row['login_id'] ?>)" class="btn btn-danger" style="margin-bottom:5px">Delete</button></div></td>

       </tr>


            </table>
        <br>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half"> <!-- ใส่รูป -->
            </div>
          </div>

</div>
<?php } ?>
<!-- foreach -->



</div>

<!-- footer -->
<br>
<br>
<br>
<br>
<div class="footer">
  <p>Slight</p>
</div>

<script type="text/javascript">

    function Edit_user(login_id){
      //alert('edit'+login_id);
      window.location='<?php echo base_url('index.php/Admin_control/Admin_edituser') ?>'+'/'+login_id;
    }
    function Uploads(login_id){
       window.location='<?php echo base_url('index.php/Admin_control/Admin_uploads') ?>'+'/'+login_id;
    }

    function Delete_user(login_id){
      window.location='<?php echo base_url('index.php/Admin_control/Admin_delete') ?>'+'/'+login_id;
    }

</script>
</body>
</html>
