<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
  } else {
    //header("location: login");
    //ย้ายไปหน้าที่ไม่มีการเข้าสู่ระบบ
  }
?>

<!DOCTYPE html>
<html>
<title>Timeline</title>
<meta charset="UTF-8">
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
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
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

    i {
      color: #969591;
    }

    i:hover {
      color: #fff;
    }
  }
  </style>
<body class="w3-theme-l5">

<!-- แถบบน -->
<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url('index.php')?>"><font color="#fffff"> Slight</font></a>
  </div>

<!-- แถบบนขวา --> 
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

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <p class="w3-center"><img src="img/user1.png" class="w3-circle" style="height:106px;width:106px" alt="Panumat"></p>
         <h4 class="w3-center">Panumat Lastname</h4>
         <hr>
         <!-- <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Programmer, BUU</p> -->
         <!-- <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Chonburi, TH</p> -->
         <p>Birth Day : April 10, 1988</p>
         <p>Sex : Female</p>
        </div>
      </div>
      <br>
     
      
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
<div class="container">
  <form class="form-horizontal postfeed" action='maincontrol/postfeed' method='POST'>
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

   
<!-- กล่องโพสต์ -->     
<?php foreach ($feed_data as $value) { ?>
<div align="center" bgcolor="#FFDEAD">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:700px"><br>
        <?php
  #ถ้ามีรูปแสดงรูป แต่ถ้าไม่มีรูปให้แสดง ภาพตั้งตัน
  if($value['member_picture']!=NULL){
    echo "<img class='img' src='".base_url('uploads/'.$value['member_picture'])."' width='100' height='100'>";
  }else {
    echo "<img class='img' src='".base_url('uploads/30422253_1813735568931061_1243079156_n.png')."' width='100' height='100'>";
  }
  ?>
        <span class="w3-right "><font color="#000000" size="1"><?php echo $value['post_datetime']; ?><br></font></span>
        <h5 align="left"><?php echo $value['username'];?><br></h5>
        <br>
        <p align="left"><?php echo $value['post_detail']; ?></p>
  </div>
</div>
<?php } ?>
  
    <!-- End Middle Column -->
    </div>    
  <!-- End Grid -->
  </div>
<!-- End Page Container -->
</div>
</body>
</html> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $("[class=submit]").click(function(event){
      //alert($('.'+$(this).prop("class")).prop("value"));
        $.post("<?php echo base_url(); ?>/index.php/maincontrol/updatepost",
        {
          content: $('#'+$(this).prop("id")).prop("value"),
          post_number: $(this).prop("id")
        },
        function(data,status){
            $(location).attr('href', '<?php echo base_url(); ?>/index.php/maincontrol/getlists')
            //alert(data);
        });
    });

    $("[class=delete]").click(function(event){
      //alert($('.'+$(this).prop("class")).prop("value"));
        $.post("<?php echo base_url(); ?>/index.php/maincontrol/deletepost",
        {
          post_number: $(this).prop("id")
        },
        function(data,status){
            $(location).attr('href', '<?php echo base_url(); ?>/index.php/maincontrol/getlists')
            //alert(data);
        });
    });
});
</script>