<div class="pagecontainer">
				<div class="headertext">
                    Admin: <hr>
                </div>
                    <!-- nav bar here -->
                        <nav class="admin-nav ">
                            
                            <div class="container admin-nav">
                                            <button class=" navbar-toggle" data-toggle="collapse" data-target=".navHeadercollapse">
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                            </button>
                                            <div class="collapse navbar-collapse navHeadercollapse">
                                                <ul class="nav navbar-nav ">
                                                <li class=border-left><a href="<?=base_url('superuser/users');?>">All users</a></li>
                                                    
                                                    <li class=border-left><a href="<?=base_url('superuser/resellers');?>">Resellers</a></li>
                                                    
                                                
                                                </ul>
                                                                    
                                            </div>  

                        

                            </div>
                        </nav>
                    <!-- product grid -->
                    <div class="positioner">
				
				  <div class="product_container">
				  
                        <?php foreach($items as $item):?>
                            <!-- Below is the product container -->
							      <!-- creating the card -->
							    <div class="card" style=" margin: 10px; background-color:rgba(255, 255, 255, 0.473) !important">

					              <div class="card-body">
										<div class="crow">
												<div class="gd-12 gd-m-12 gd-s-4">
													<img  class=" img-responsive" style=' display:block; height: 100%; width: 100%; object-fit: contain' src="<?php echo site_url()?>/resources/images/<?php  echo $item['image'];?>">
												</div>
												<div class="gd-12 gd-m-12 gd-s-8" style="text-align:center;">
													<h5 class="card-title">Title: <?php echo $item['product_title']?></h5>
													<p class="card-text">Price: <?php echo $item['price']?></p>
													<a  class="btn btn-custom" href="<?=site_url("item/single_item/".$item["product_id"])?>" id="mymodal"> Get it !</a>
												</div>
										</div>
									</div>
							    </div>
							
						<?php endforeach;?>
               		 </div>
				</div>
                    



               
         





                
                
</div>