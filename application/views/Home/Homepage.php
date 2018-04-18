
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
      <a class="navbar-brand" href="<?php echo base_url('index.php')?>"><font color="#fffff"> Slight</a></font></a>
  </div>

<!-- ลงทะเบียน&login -->
 <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('index.php/login')?>"><span class="glyphicon glyphicon-log-in"></span><font color="#fffff"> Login</a></font></li>
        <li><a href="<?php echo base_url('index.php/register/load')?>"><span class="glyphicon glyphicon-user"></span><font color="#fffff"> Register</a></font></li>
  </ul>

<!-- ช่องค้นหา -->
  <form class="navbar-form" action="123456" align="right">
    <div class="input-group">
      <input type="text" class="form-control"  size="30" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
    </div>
  </form>
</div>
</nav>

<center><div class="clearfix" align="left">
<img class="img" src="img/user1.png" width="100" height="100">
Panumat<br>
10 เมษายน 2561  เวลา 20.30 นาที<br><br>
" ไปเล่นสงกานต์กันนนนนนนน!! "</div></center>

<br>
<center><div class="clearfix" align="left">
<img class="img" src="img/user2.png" width="100" height="100">
Korakoch<br>
10 เมษายน 2561  เวลา 00.30 นาที<br><br>
" what the hack!! "</div></center>
<br>
<center><div class="clearfix" align="left">
<img class="img" src="img/user3.png" width="100" height="100">
Sophon<br>
17 เมษายน 2561  เวลา 11.30 นาที<br><br>
" I have to go to University T-T "</div></center>
<br>
<center><div class="clearfix" align="left">
<img class="img" src="img/user4.png" width="100" height="100">
Thakdanai<br>
17 เมษายน 2561  เวลา 11.50 นาที<br><br>
" Please pay "</div></center>
