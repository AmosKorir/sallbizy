<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>M~song</title>
	<link rel="shortcut icon" href="<?php echo base_url();?>resources/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo base_url();?>resources/favicon.ico" type="image/x-icon">
	<!-- Latest compiled and minified CSS -->
  
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/custom.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/mediaquery.css">
	<script src="<?php echo base_url(); ?>resources/jquery.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
 

<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />



	</head>
  <body>
		<div class="navbar-fixed-top custom_navbar" >
			<div class="row"  >
				<div class="col- col-md-6 col-lg-6" >
								<div class="navbar-header" style="margin-left:20px;">
										<img  src=<?php echo base_url('resources/newlogo.png');?>>
										<a class="brand" href="#">M~song</a>
								</div>
							</div>
							
							<div class="col-sm-6 col-md-6 col-lg-6 sm">
								<?php
								$role=$this->session->userdata('role');
								if(!empty($role==='admin')){
										echo'<a href="'.base_url('superuser/').'">Admin</a>';
								}
								?>
								
							</div>
			</div>
				
		</div>
		
				<!-- second navbar -->
				<nav class="navbar   menu1">
				
						<div class="container">
										<button class="  success navbar-toggle" data-toggle="collapse" data-target=".navHeadercollapse">
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
													<span class="icon-bar"></span>
										</button>
										<div class="collapse navbar-collapse navHeadercollapse">
										 
												<!-- the auto hidden buttons -->
															 
															<ul class="nav navbar-nav ">
																	<li > <a href="<?=site_url('Admin/')?>">
																			<span class="glyphicon glyphicon-home"></span> Songs</a></li>
																<li ><a href="<?=site_url('AdminArtist/')?>" >
																	<span class="glyphicon glyphicon-phone"></span>  Artist</a></li>
																<li ><a href="<?=site_url('AdminAlbum/')?>">
																	<span class="glyphicon glyphicon-blackboard "></span> Album</a></li>
																	<li ><a href="<?=site_url('AdminAlbum/')?>">	
																	<span class="glyphicon glyphicon-blackboard "></span> Adverts</a></li>					 
																
															</ul>



															<?php
															if(empty($this->session->userdata("userid"))){
																echo '
															<ul class="nav navbar-nav navbar-right ">
															<li ><a "  href="'.site_url('account').'"><span class="glyphicon glyphicon-user "> </span> Login
															</a>
															</li>
															<li><a href="'.base_url('register').'"><span class="glyphicon glyphicon-log-in "> </span> Register</a></li>
															</ul>
															';}else{
																echo'
															<ul class="nav navbar-nav navbar-right ">
															<li><a href="'.base_url('logout').'"><span class="glyphicon glyphicon-log-in "> </span> Logout</a></li>
															</li>
															</ul>
															
																
																
																';
															}
															
															?>

															
												
															
							</div>                   
						</div>
						</nav>
					
						<!-- navbar three -->
						<div class="menu3">
							
									<?php echo'
							     <div  style="margin-left: 10px; padding-left: 0px; ">
											 
											  <a href="'.site_url("Admin/deleteSong/").'">
												 <span class=" class="glyphicon glyphicon-briefcase"></span>Delete Songs</a>&nbsp  



											  <a href="'.site_url("Admin/deleteArtist/").'">
												 <span class=" class="glyphicon glyphicon-briefcase"></span>Delete Artist</a>&nbsp  
			 			 															    

											  <a href="'.site_url("Admin/deleteAlbum/").'">
												 <span class=" class="glyphicon glyphicon-briefcase"></span>  Delete Album </a>
												   <a href="'.site_url("Admin/deleteAlbum/").'">
												 <span class=" class="glyphicon glyphicon-briefcase"></span>  Delete Adverts </a>

												  
													
							        </div>
							 ';
							 ?>
								
						</div>
					
		