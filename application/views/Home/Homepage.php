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




<!-- ลงทะเบียน&login -->
  <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('index.php/register/load')?>"><span class="glyphicon glyphicon-user"></span><font color="#fffff"> Register</a></font></li>
        <li><a href="<?php echo base_url('index.php/login')?>"><span class="glyphicon glyphicon-log-in"></span><font color="#fffff"> Login</a></font></li>
  </ul>

<!-- ช่องค้นหา -->
   <form class="navbar-form" action="<?php echo base_url(); ?>index.php/maincontrol/search" method="post" align="center">
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

<!-- กล่องที่โพสต์แล้ว -->
<?php foreach ($feed_data as $value) { ?>
<div align="center" bgcolor="#FFDEAD">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:1000px"><br>
        <?php
  #ถ้ามีรูปแสดงรูป แต่ถ้าไม่มีรูปให้แสดง ภาพตั้งตัน
  if($value['member_picture']!=NULL){
    echo "<img class='img' src='".base_url('uploads/'.$value['member_picture'])."' width='100' height='100'>";
  }else {
    echo "<img class='img' src='".base_url('uploads/30422253_1813735568931061_1243079156_n.png')."' width='100' height='100'>";
  }
  ?>
        <span class="w3-right "><font color="#000000" size="1">
          <!-- ใส่เวลาจากตรงนี้นะ -->
          <script language="javascript">
          document.write(maketime("<?php echo $value['post_datetime']; ?>"));
          </script>
          <!-- ใส่เวลาจากตรงนี้นะ -->
        <br></font></span>
        <h5 align="left" > <?php echo $value['username']; ?>
          <?php //<input id='highlight' type="text" value="<?php echo $value['username']; " readonly="readonly" /> ?><br></h5>
        <br>

        <p align="left"><?php echo $value['post_detail']; ?></p>
  </div>
</div>
<?php } ?>

<script src="//code.jquery.com/jquery-3.1.0.slim.min.js"></script>
<script src="js/jQuery.highlight.js"></script>
<script type="text/javascript">
</script>
</body>
</html>
