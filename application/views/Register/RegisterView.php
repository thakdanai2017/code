
<?php
  //ถ้ามีการ login ไว้แล้ว ก็จะไปหน้า home
  if (isset($this->session->userdata['logged_in'])) {
    header("Location: index.php/Maincontrol");
  }

?>

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
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><font color="ffffff">Slight</font></a>
  </div>
</div>
</nav>
<br><br>

<!-- กล่อง Register -->
  <div class="container">
    <div class="row">
    <div class="span4 offset4 well">
    	 <legend align="center"  > <b> Register </b></legend>
         <?php
              echo form_open('register/save',array(
              'class' => "form-horizontal" ));
        ?>
    <?php echo $result; ?>
    <div class="form-group">
      <label class="control-label col-sm-3" for="username">Username :</label>
      <div class="col-sm-8">
        <input type = 'username' name = 'username' id = "username" class="form-control"  maxlength="16" placeholder="Enter username" value="<?php echo set_value('username'); ?>"> <?php echo form_error('username'); ?>
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

<!-- footer -->
<div class="footer">
  <p>Footer Text</p>
</div>
</body>
</html>
