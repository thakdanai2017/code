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
  <title>Profile page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
          //alert('hello');
          if('<?php echo $userdata->member_gender;?>' == 'M'){
             $('#M').attr("checked", "checked");
          }else{
              $('#F').attr("checked", "checked");
              console.log('<?php echo $userdata->member_gender ;?>');
          }
    });
  </script>
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

<!-- user&ตั้งค่า -->
 <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('index.php/maincontrol/getlists'); ?>"><span class="glyphicon glyphicon-user"></span><font color="#fffff"> <?php echo $username; ?> </a></font></li>

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
  <div class="container">
    <div class="row">
    <div class="span4 offset4 well">
       <legend align="center"> <b> Profile </b></legend>
          <form class="form-horizontal userdata" action="<?php echo base_url('index.php/maincontrol/saveuserdata') ?>" method="post">
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Name :</label>
      <div class="col-sm-8">
        <input type="text" name="name" maxlength="50" value="<?php echo $userdata->member_name ;?>" class="form-control"  placeholder="Enter name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="surname">Surname :</label>
      <div class="col-sm-8">
        <input type="text" name="surname" value="<?php echo $userdata->member_surname ;?>" maxlength="50" id = "surname" class="form-control" placeholder="Enter surname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="birthday">Birthday : </label>
      <div class="col-sm-8">
        <input type = 'date' name="bday" min="2000-01-02" value="<?php echo  $userdata->member_birthday ?>" class="form-control" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="sex">Gender :</label>
      <div class="col-sm-8">
        <input type="radio" name="gender" value="M" class="gender" id='M'>M
        <input type="radio" name="gender" value="F" class="gender" id='F'>F <br>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-8" align="center">
        <input type=submit name='submit' value="Save" class="btn btn-default" >
      </div>
    </div>
 </form>

</div>
</div>
</div>
</div>

<!-- footer -->
<div class="footer">
  <p>Footer Text</p>
</div>

</body>
</html>
