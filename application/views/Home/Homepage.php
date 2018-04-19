
<?php
  //ถ้ามีการ login ไว้แล้ว ก็จะไปหน้า home
  if (isset($this->session->userdata['logged_in'])) {
    header("Location: index.php/Maincontrol");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      color: #00000;
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Add a gray background color and some padding to the footer */
    .footer {
      background-color: #483D8B;
      padding: 10px;
      color: #fff;
      display: block;
      text-align: center;
      position: fixed;
      left: 0;
      width: 100%;
      bottom: 0;
    }

    .clearfix {
      overflow: auto;
      border: 2px solid #483D8B;
      padding: 10px;
      width: 60%;
    }

    .img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      float: left;
      padding: 10px;
    }
  }
  </style>
</head>
<body>


<!-- แถบบน -->
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url('index.php')?>"><font color="#fffff"> Slight</a></font></a>
  </div>

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
        <span class="w3-right "><font color="#000000" size="1"><?php echo $value['post_datetime']; ?><br></font></span>
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
