
<?php
  //ถ้ามีการ login ไว้แล้ว ก็จะไปหน้า home
  if (isset($this->session->userdata['logged_in'])) {
    header("Location: index.php/Maincontrol");
  }
?>

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

///////////////////////////////////


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
      color: #ffffff;
      display: block;
      text-align: center;
      position: fixed;
      left: 0;
      width: 100%;
      bottom: 0;
    }
  }
  </style>
</head>
<body>

<!-- แถบบน -->
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
      <a class="navbar-brand" href="Home.php"><font color="ffffff">Slight</font></a>
  </div>
</div>
</nav>
<br><br>

<!-- กล่อง Register -->
  <div class="container">
    <div class="row">
    <div class="span4 offset4 well">
    	 <legend align="center"  > <b> Register </b></legend>
          <form class="form-horizontal" action='home.php' method='POST'>
    <div class="form-group">
      <label class="control-label col-sm-3" for="name">Username :</label>
      <div class="col-sm-8">
        <input type = 'name' name = 'name' id = "name" class="form-control"  maxlength="8" placeholder="Enter username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Password : </label>
      <div class="col-sm-8">
        <input type = 'email' name = 'email' class="form-control"   placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Re-password : </label>
      <div class="col-sm-8">
        <input type = 'email' name = 'email' class="form-control"   placeholder="Enter re-password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email : </label>
      <div class="col-sm-8">
        <input type = 'email' name = 'email' class="form-control"   placeholder="Enter email">
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

<!-- footer -->
<div class="footer">
  <p>Footer Text</p>
</div>
</body>
</html>
