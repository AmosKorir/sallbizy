<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
 
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/custom.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>resources/style.css">

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>



  </head>
  <body class="formpage " style="padding-bottom:20px;  background-repeat: stretch;
         background-image:url(<?php echo base_url();?>resources/cover.jpg"> 
    <div style="text-align:center;margin-top:30px;">
      <img  src=<?php echo base_url('resources/newlogo.png');?>>
      <b><h3><font color=white>M-song</font><h3></b>
  </div>
    
    <div class="formcard" style="margin: auto; max-width:300px; margin-bottom:30px;margin-top:20px;">
    <div  style="text-align: center;"> <h3><b>Login</b></h3> </div>
    <br>
    <div class ="form_div " style=" padding-left: 0px">
       <?php echo validation_errors();?>
     <?php echo form_open('AdminLogin/login');?>
   <div class="form-group">
    
<div class="form-group">
  <label for="lg_password" class="sr-only">Password</label>
  <input type="password" class="form-control" id="lg_password" name="password" placeholder="password">
</div>
<div class="form-group" style="text-align: center;">
   <button type="submit" class="login-button custom_buttons"> Login </button>
   <br><br>
   
</div>
</form>
</div>
</div>

  </body>