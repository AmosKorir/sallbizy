<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>


<!-- this is the begining of the body  -->
	<div class="body_container">
		<div class="row">
		
		 <div class="col-lg-9 col-sm-12 col-md-9">
				<!--  Create more columns -->
				<div class="row">
					 <div class=" col-sm-12 col-md-3 col-lg-3" >
						 <div class="list-group " style="margin-left: 10px;">
										 <a href=""<?=base_url()?>" class="list-group-item main-color-bg active">
											 <span class="glyphicon glyphicon-home"></span> Home</a>

										  <a href="<?=site_url('Phone/item/')?>"
										 	data-toggle="collapse"data-target="#demo"class="list-group-item">
											 <span class="glyphicon glyphicon-phone"></span>  Phone</a>
												
											<a href="<?=site_url('Laptop/item/')?>" class="list-group-item">
												<span class="glyphicon glyphicon-inbox"></span> Laptop</a>
										 <a href="<?=site_url('Watch/item/')?>?Watches" class="list-group-item">
											 <span class="glyphicon glyphicon-fire">
										 </span>  Watches</a>
										 <a href="<?=site_url('HM/item/')?>?Home Appliances" class="list-group-item"><span class="glyphicon glyphicon-wrench">
										 </span>  Home Appliances</a>






						 </div>
						
					</div>
					<!-- this is the end of the left column-->
					<div class="col-lg-8 col-md-8 col-sm-12">

						<nav class="navbar navbar-inverse">
							<div class="container-fluid">
								<ul class="nav navbar-nav">
									<li class="active"><a href="eco"><span class="glyphicon glyphicon-home theam_glaphycon"></span> Home</a></li>
								</ul>
								<ul class="nav navbar-nav">
									<li ><a href="newproduct"><span class="glyphicon glyphicon-bullhorn theam_glaphycon"></span> Sell</a></li>
								</ul>
									<ul class="nav navbar-nav">
									
									<li ><a href="<?=site_url("item/myitems/".$this->session->userdata('userid'))?>"><span class="glyphicon glyphicon-bullhorn theam_glaphycon"></span> My Sells </a></li>
								</ul>
								<li ><a href="<?=site_url("item/getmysales/")?>"><span class="glyphicon glyphicon-bullhorn theam_glaphycon"></span> My Brokes </a></li>
								</ul>
									
									<!-- the auto hidden buttons -->
									<?php
									if(empty($this->session->userdata("userid"))){
										echo '
								<ul class="nav navbar-nav pull-right">
									<li ><a " rel="modal:open" id="manual-ajax" href="'.site_url('account').'"><span class="glyphicon glyphicon-user theam_glaphycon"> </span> Login
									</a>

									</li>


									<li><a href="register"><span class="glyphicon glyphicon-user theam_glaphycon"> </span> Register</a></li>

								</ul>
								';}?>

								



							</div>
						</nav>

							<!-- This is the begining of the next carousel -->




						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						  <!-- Indicators -->
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						    <li data-target="#myCarousel" data-slide-to="3"></li>
						  </ol>

						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src="<?php echo base_url(); ?>resources/flower.png" />
						    </div>

						    <div class="item">
						      <img src="<?php echo base_url(); ?>resources/flower.png" />
						    </div>

						    <div class="item">
						    <img src="<?php echo base_url(); ?>resources/flower.png" />
						    </div>

						    <div class="item">
						      <img src="<?php echo base_url(); ?>resources/flower.png" />
						    </div>
						  </div>

						  <!-- Left and right controls -->
						  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						  </a>
						  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						  </a>
						</div>

						<!--  the end of the carousel-inner-->
								<!--phone section  -->
						<div>

								<!--work with phones products grid goes here  -->
								<div class="category_title" style="background-color:#f0f0f5;height:50px;margin-top:10px;"><h3> Phones online</h3></div>
								<!--product gridview  -->
						<?php foreach($items as $item):?>
							            <!-- Below is the product container -->
							<div class="product_container">
							              <!-- creating the card -->
							    <div class="carder" style="width: 18rem; margin: 10px; ">

					              <div class="card-body">
						               <img style="width: 18rem; height: 100px;" src="<?php echo site_url()?>/resources/images/<?php  echo $item['image'];?>">

						                <h5 class="card-title"><?php echo $item['product_title']?></h5>
						                <p class="card-text"><?php echo $item['price']?></p>
						              

						               	  <a  class="btn btn-success" href="<?=site_url("item/single_item/".$item["product_id"])?>" rel="modal:open" id="manual-ajax"> Get it !</a>
							                	

							                	<script type="text/javascript">
							                		        	$.fn.center = function () {
																	    this.css("position","absolute");
																	    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
																	    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
																	    return this;
																	}

															       	

										                	  $('#manual-ajax').click(function () {
															     $.blockUI({ insert options here });
																   $('.blockUI.blockMsg').center();
																});

			   									</script>

					              </div>
							    </div>
							</div>
						<?php endforeach;?>
							




					<!--work with phones products grid goes here  -->
					<div class="category_title" style="background-color:#f0f0f5;height:50px;margin-top:10px;"><h3>Laptop</h3></div>

						 <?php foreach($Laptop as $item):?>
				            <!-- Below is the product container -->
					<div class="product_container">
				              <!-- creating the card -->
				    <div class="carder" style="width: 18rem; margin: 10px; ">

		              <div class="card-body">
			              <img style="width: 18rem; height: 100px;" src="<?php echo site_url()?>/resources/images/<?php  echo $item['image'];?>">

			                <h5 class="card-title"><?php echo $item['product_title']?></h5>
			                <p class="card-text"><?php echo $item['price']?></p>
			              

			               	  <a  class="btn btn-success" href="<?=site_url("item/single_item/".$item["product_id"])?>" rel="modal:open" id="manual-ajax"> Get it !</a></a>
				                	

				                	<script type="text/javascript">
				                		        	$.fn.center = function () {
														    this.css("position","absolute");
														    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
														    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
														    return this;
														}

												       	

							                	  $('#manual-ajax').click(function () {
												     $.blockUI({ insert options here });
													   $('.blockUI.blockMsg').center();
													});

   									</script>

		              </div>
				    </div>
					</div>
			 <?php endforeach;?>


					




					<!-- end o;f itema -->
			</div>	
			<div class="col-lg-1 col-md-1">
			 <!-- this is just a place holder -->
				Riht section 
			</div>
		</div>



</body>
</html>
