<!-- this is the begining of the body  -->
	<div class="body_container">
		<div class="row">
		
		 <div class="col-lg-10 col-sm-12 col-md-10">
				<!--  Create more columns -->
				<div class="row">
					<div class=" col-sm-12 col-md-3 col-lg-3 " style="margin-left:10px;">
						 <div class="list-group">
										 <a href="<?=base_url()?>" class="list-group-item main-color-bg active">
											 <span class="glyphicon glyphicon-home"></span> Home</a>

										  <a href="<?=site_url('Phone/item/')?>" class="list-group-item grey">
											 <span class="glyphicon glyphicon-phone"></span>  Phone</a>
												
											<a href="<?=site_url('Laptop/item/')?>" class="list-group-item grey">
												<span class="glyphicon glyphicon-inbox"></span> Laptop</a>
										 <a href="<?=site_url('Watch/item/')?>?Watches" class="list-group-item grey">
											 <span class="glyphicon glyphicon-fire">
										 </span>  Watches</a>
										 <a href="<?=site_url('HM/item/')?>?Home Appliances" class="list-group-item grey"><span class="glyphicon glyphicon-wrench">
										 </span>  Home Appliances</a>

						 </div>
						
					</div>
					<!-- this is the end of the left column-->
					<div class="col-lg-8 col-md-8 col-sm-12">

						

							<!-- insert code from here -->
							<nav class="navbar navbar-default" style="background-color:black">
		                  <div class="container">
		                          <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeadercollapse">
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
		                          </button>
		                          <div class="collapse navbar-collapse navHeadercollapse">
		                           
		                              
		                                     
		                                    <ul class="nav navbar-nav ">
		                                      <li ><a href=<?=base_url("newproduct")?>><span class="glyphicon glyphicon-bullhorn theam_glaphycon"></span> Sell</a></li>
		                                                                       
		                                        <li ><a href="<?=base_url("item/myitems/".$this->session->userdata('userid'))?>"><span   class="glyphicon glyphicon-bullhorn theam_glaphycon"></span> My Sells </a></li>
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



							<div class="formcard grey">
								 <h3><b>Register for free</b></h3> <br>
								<div  style="margin: auto; max-width:400px;">
							 <?php echo validation_errors();?>
   							  <?php echo form_open('register');?>
									
								<div class="form-group" style="text-align: center;">
								    <input name="firstname" placeholder="First name" type="text" class="form-control" id="usr">
								</div>
								<div class="form-group">
								 <input name="firstname" placeholder="First name" type="text" class="form-control" id="usr">
								</div>
								<div class="form-group">
								   <input name="lastname" placeholder="lastname" type="text" class="form-control" id="usr">
								</div>
								<div class="form-group">
								 
								  <input name="email" placeholder="email" type="text" class="form-control" id="usr">
								</div>
								<div class="form-group">
								 
								  <input name="phone" placeholder="Phone" type="text" class="form-control" id="usr">
								</div>
								<div class="form-group">
								
								  <input name="location" placeholder="Location" type="text" class="form-control" id="usr">
								</div>

								<div class="form-group">
								 
								  <input name="password" placeholder="Password" type="password" class="form-control" id="pwd">
								</div>
								<div class="form-group " style="text-align: right !important;">
								 
								  <input name="conpassword" placeholder="Confirm password" type="text" class="form-control" id="usr">
								</div>

								<div class="form-group" style="text-align: right;">
								   <button type="submit" class="login-button custom_buttons"> Register </button>
								</div>
							  </div>

							</div>
						</div>

							</form>
						</div>























          

          			</div>





            </div>

        
          </div>



          </nav>


        </div>
        <div class="d-none d-sm-block col-lg-1 col-md-1">
         <!-- this is just a place holder -->
        </div>
        </div>
        </div>
        <


        </body>
        </html>
