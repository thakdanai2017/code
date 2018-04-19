<?php echo $error; //ให้แสดงผลว่าสำเร็จป่าว?>
<?php echo form_open_multipart('register/do_upload');?>

<br /><br />
รูปภาพ <input type="file" name="userfile" size="200" /> <br>
<input type="submit" value="upload" name="upload" />

</form>
