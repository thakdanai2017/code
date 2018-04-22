<!DOCTYPE html>
<html lang="en">
<head>
  <title>Slight</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/img/logo2.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- ใส่เวลาจากตรงนี้นะ -->
  <script type="text/javascript">
    var thday = new Array ("อาทิตย์","จันทร์",
    "อังคาร","พุธ","พฤหัส","ศุกร์","เสาร์");
    var thmonth = new Array ("มกราคม","กุมภาพันธ์","มีนาคม",
    "เมษายน","พฤษภาคม","มิถุนายน", "กรกฎาคม","สิงหาคม","กันยายน",
    "ตุลาคม","พฤศจิกายน","ธันวาคม");

    function maketime(post_datetime) {
      //var datetime = "ehllo";
      var now = new Date(post_datetime);
      var datetime = "วัน" + thday[now.getDay()]+ "ที่ "+ now.getDate()+ " " +
      thmonth[now.getMonth()]+ " " + (0+now.getYear()+2443) + " เวลา " +  now.getHours() + ":" + (now.getMinutes()<10?'0':'') + now.getMinutes() + " นาที "
      return datetime;
    }
  </script>
  <!-- ใส่เวลาจากตรงนี้นะ -->
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

    i {
      color: #969591;
    }

    i:hover {
      color: #fff;
    }
  }
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
      <a  href="<?php echo base_url('index.php')?>"><img src="<?php echo base_url();?>assets/img/logoo.png" width="70"></a>
  </div>
