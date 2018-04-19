<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
  } else {
    header("location: ".base_url());
    //ย้ายไปหน้าที่ไม่มีการเข้าสู่ระบบ
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>UploadProfile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      background-color: #483D8B;
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Add a gray background color and some padding to the footer */
    .footer {
      background-color: #483D8B;
      padding: 10px;
      color: #FFFFFF;
      display: block;
      text-align: center;
      position: fixed;
      left: 0;
      width: 100%;
      bottom: 0;
    }

    i {
      color: #483D8B;
    }

    i:hover {
      color: #FFFFFF;
    }
  }
  </style>
</head>
<body>

  <!-- แถบบน -->
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo base_url('index.php')?>"><font color="#fffff"> Slight</font></a>
    </div>

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

<!-- กล่อง login -->
<br>
<div align="center">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:1000px" ><br>
       <legend align="center"> <b>Upload Profile Picture </b></legend><br>
    <?php echo form_open_multipart('register/do_upload',array('class' => 'form-horizontal' ));?>
    <br />
    <?php echo $error; ?>
    <div class="form-group" align="left">
      <label class="control-label col-sm-3" for="name">Picture  : </label>
      <div class="col-sm-8" align="left">
          <input type="file" name="userfile" size="100" />
      </div>
      <br>
      <br>
      <br>
      <br>
      <div class="col-sm-offset-2 col-sm-8" align="center">
        <input type="submit" value="upload" name="upload" class="btn btn-default"/>
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
