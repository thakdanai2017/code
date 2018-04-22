<?php
  if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
  $login_id = ($this->session->userdata['logged_in']['login_id']);
    if (!isset($this->session->userdata['logged_in']['admin_permission'])) {
      //echo $this->session->userdata['logged_in']['admin_permission'];
      header("Location:".base_url());
    }
  } else {
    header("Location:".base_url());
    //ย้ายไปหน้าที่ไม่มีการเข้าสู่ระบบ
  }
?>

    <!-- เมนูแถบขวาบน -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <div class="btn-group">
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('index.php/Admin_control') ?>'">Admin Manage User</button>
              <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('index.php/Admin_control_post') ?>'">Admin Manage Post</button>
          </div>
        </li>
        <li><a href="<?php echo base_url('index.php/maincontrol/getlists'); ?>"><span class="glyphicon glyphicon-user"></span><font color="#fffff"> <?php echo "Admin : ".$username; ?> </font></a></li>
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

  </div>
</nav>





<!-- กล่องโพสต์ -->
<div align="center">
<div class="w3-container w3-card w3-white w3-round w3-margin" style="width:1000px">
 <h3 align="center">Manage Post</h3>
  <hr class="w3-clear">
    <!-- ช่องค้นหา -->
  <form class="navbar-form" method="post" action="<?php echo base_url('index.php/Admin_control_post/search_post'); ?>" align="center">
    <div class="input-group">
      <input type="text" class="form-control"  size="80" placeholder="Search" name="keyword">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="search" value="search">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
    </div>
  </form>

<br>

<?php if (isset($return)) {
  echo $return;
} ?>
<!-- foreach -->



<div align="center">
  <?php foreach ($feed_data as $row): ?>
      <div class="w3-container w3-card w3-white w3-round w3-margin" style="width:900px"><br>
          <table width="850" >
          <tr>
            <td class="col-sm-10">
              <img src="<?php echo base_url('uploads/'.$row['member_picture']) ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:50px">
              <span class="w3-right "><font color="#000000" size="1">
                <!-- ใส่เวลาจากตรงนี้นะ -->
                <script language="javascript">
                document.write(maketime("<?php echo $row['post_datetime']; ?>"));
                </script>
                <!-- ใส่เวลาจากตรงนี้นะ -->
              </font></span>
              <h5 align="left"><?php echo $row['username'] ?></h5>
              <br>
              <hr class="w3-clear">
              <p align="left" style="margin-bottom:40px"><?php echo $row['post_detail'] ?></p>
            </td>
            <td><div align="right" >
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCenter"
              onclick="getcontent_to_modal(<?php echo $row['login_id'].",".$row['post_id']?>,<?php echo "'".$row['post_detail']."'"; ?>,<?php echo "'".$row['username']."'"; ?>)" style="margin-bottom:0px">
                  Edit
              </button>
              <button type="button" class="btn btn-danger" onclick="Delete_post(<?php echo $row['post_id'] ?>)" style="margin-bottom:0px">Delete</button>
            </div></td>

            <tr>
            </table>
      </div>
      <?php endforeach; ?>
</div>


</table>
</div>
</div>

<!-- footer -->
<br>
<br>
<br>
<br>
<!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLongTitle">
          <b id='name_own_post'> Post ของ ..... </b>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="login_id" value="" hidden>
        <input type="text" id="post_id" value="" hidden>
        <input type="text" id="content_to_edit" name="content" value="ข้อความ" class="form-control" maxlength="100">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="Edit_post()">Save changes</button>
      </div>
    </div>
  </div>
</div>



<div class="footer">
  <p>Slight</p>
</div>

<script type="text/javascript">

    function getcontent_to_modal(login_id,post_id,content,username){
      //alert('edit'+login_id+' '+post_id+' '+content+' '+username);
      $('#name_own_post').html('Post ของ &#160'+username);
      $("#content_to_edit").attr("value",content);
      $("#login_id").attr("value",login_id);
      $("#post_id").attr("value",post_id);
      //alert('success');

    }

    function Edit_post(){
      //var content = $("#login_id").val();
      //var login_id = $("#post_id").val();
      var content = $("content_to_edit").val();
      console.log(content);

      $.post("<?php echo base_url(); ?>index.php/Admin_control_post/Edit_post",
      {
        post_number: $("#post_id").val(),
        login_number:  $("#login_id").val(),
        content : $("#content_to_edit").val()
      },
      function(data,status){
          $(location).attr('href', '<?php echo base_url(); ?>index.php/Admin_control_post')
          //alert('success');
      });

    }

    function Delete_post(post_number,login_number){
      //alert('delte'+post_num);
      $.post("<?php echo base_url(); ?>index.php/Admin_control_post/deletepost",
      {
        post_number: post_number,
        login_number : login_number
      },
      function(data,status){
          $(location).attr('href', '<?php echo base_url(); ?>index.php/Admin_control_post')
          //alert('success');
      });

    }

</script>
</body>
</html>
