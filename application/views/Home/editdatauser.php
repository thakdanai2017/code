<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
  } else {
    header("location: ".base_url());
    //ย้ายไปหน้าที่ไม่มีการเข้าสู่ระบบ
  }
?>


สวัสดีคุณ <?php echo $username; ?>
<br>
กรอกข้อมูลส่วนตัว
<form class="userdata" action="<?php echo base_url('index.php/maincontrol/saveuserdata') ?>" method="post">
    ชื่อ :<input type="text" name="name" maxlength="50" value="<?php echo $userdata->member_name ;?>"> <br>
    นามสกุล :<input type="text" name="surname" value="<?php echo $userdata->member_surname ;?>" maxlength="50"> <br>
    เพศ :<input type="radio" name="gender" value="M" class="gender" id='M'>M
    <input type="radio" name="gender" value="F" class="gender" id='F'>F <br>
    วันเกิด <input type="date" name="bday" min="2000-01-02"><br>
    <input type="submit" name="submit" value="submit" >

</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
        //alert('hello');
        if(<?php echo $userdata->member_gender;?> == 'M'){
           $('#M').attr("checked", "checked");
        }else{
            $('#F').attr("checked", "checked");
        }
  });
</script>
