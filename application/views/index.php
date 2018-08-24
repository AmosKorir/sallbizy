<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>


<!-- this is the begining of the body  -->
	<div class="body_container">
		<div class="row">
			 <div class="col-lg-10 col-sm-12 col-md-10 " style="background-color: white">

			 	 
					<div class="row">

						 <div class=" col-sm-12 col-md-3 col-lg-3"  style="padding-left: 10px;">

				 			<div class="list-group grey" style="margin-left: 10px;">
											 <a href="<?=base_url()?>" class="list-group-item main-color-bg active">
												 <span class="glyphicon glyphicon-home"></span> Home</a>

											  <a href="<?=site_url('Phone/item/')?>" class="list-group-item grey">
												 <span class="glyphicon glyphicon-phone"></span>  Phone</a>
													
												<a href="<?=site_url('Laptop/item/')?>" class="list-group-item grey">
													<span class="glyphicon glyphicon-inbox "></span> Laptop</a>
											 <a href="<?=site_url('Watch/item/')?>?Watches" class="list-group-item grey">
												 <span class="glyphicon glyphicon-fire">
											 </span>  Watches</a>
											 <a href="<?=site_url('HM/item/')?>?Home Appliances" class="list-group-item grey"><span class="glyphicon glyphicon-wrench ">
											 </span>  Home Appliances</a>

							 </div>

							 <?php if(!empty($this->session->userdata('userid'))){echo'
							 <div class="list-group grey" style="margin-left: 10px;margin-top:2px;
			 			 					;padding-left: 0px; ">

			 			 					 <a href="'.site_url('Phone/item/').'" class="list-group-item grey">
												 <span class="glyphicon glyphicon-user"></span> Account Details</a>
													
											 <a href="'.site_url("item/getmysales/").'" class="list-group-item main-color-bg grey">
												 <span class="glyphicon glyphicon-home"></span> My Bookings</a>

											  <a href="'.site_url("item/getidle/").'" class="list-group-item grey">
												 <span class="glyphicon glyphicon-plus"></span>  News items</a>
													
												

							 </div>
							 ';}?>
							

						</div>

				

					<div class="col-lg-9 col-md-9 col-sm-12" style="margin: 0px;padding: 0px;">

						<nav class="navbar navbar-inverse navbar-fixed-top">
		                  <div class="container">
		                          <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeadercollapse">
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
		                          </button>
		                          <div class="collapse navbar-collapse navHeadercollapse">
		                           
		                              
		                                     
		                                    <ul class="nav navbar-nav ">
		                                      <li ><a href="newproduct"><span class="glyphicon glyphicon-bullhorn theam_glaphycon"></span> Sell</a></li>
		                                                                       
		                                        <li ><a href="<?=base_url("item/myitems/".$this->session->userdata('userid'))?>"><span   class="glyphicon glyphicon glyphicon-transfertheam_glaphycon"></span> My Sales </a></li>
		                                    </ul>
		                              <!-- the auto hidden buttons -->
		                                      <?php
		                                      if(empty($this->session->userdata("userid"))){
		                                        echo '
		                                    <ul class="nav navbar-nav ">
		                                      <li ><a " rel="modal:open" id="manual-ajax" href="'.site_url('account').'"><span class="glyphicon glyphicon-user theam_glaphycon"> </span> Login
		                                      </a>

		                                      </li>


		                                      <li><a href="register"><span class="glyphicon glyphicon-user theam_glaphycon"> </span> Register</a></li>

		                                    </ul>
		                                    ';}?>
		                    </div>                   
		                  </div>
              			  </nav>
						<!-- This is the begining of the next carousel -->
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

					
					</div>
					
			 </div>
			 	
				</div>

				</div>

		

			


		</div>
	</div>
</body>