<div class="pagecontainer">
				<div class="headertext">
					 Create your account for free <hr>
                </div>
<!--    Registration form begins here       -->
<div style="text-align:center;margin-top:2px; background-color:white;">
										<img  src=<?php echo base_url('resources/newlogo.png');?>>
										<b><h3>Smartsoko<h3></b>
									</div>
<div class="formcard " style="padding-top:10px; background-color:white;">
								 
						
							 <?php echo validation_errors();?>
							 <?php echo $message;?>
							 
   							  <?php echo form_open('register');?>
									
                                <div class="row">

                                <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="form-group" style="text-align: center;">
                                        <input name="firstname" placeholder="First name" type="text" class="form-control" id="usr">
                                    </div>
                                </div>

                                
                                <div class="col-md-4 col-lg-4 col-sm-12">
                                    <div class="form-group">
                                    <input name="lastname" placeholder="lastname" type="text" class="form-control" id="usr">
                                    </div>
                                </div>
                                </div>
                                <!-- end of the first row -->

								<div class="row">
									<div class="col-md-4 col-lg-4 col-sm-12">
										<div class="form-group">
											<input name="email" placeholder="email" type="text" class="form-control" id="usr">
										</div>
									</div>
                                	<div class="col-md-4 col-lg-4 col-sm-12">
										<div class="form-group">
											<input name="phone" placeholder="Phone" type="text" class="form-control" id="usr">
										</div>
									</div> 
								</div>
								   <!-- give margin  -->
								   <div class="row">
										<div class="col-md-4 col-lg-4 col-sm-12">
											
												<div class="form-group" >
													<input name="location" placeholder="Location" type="text"  class="form-control" id="usr">
												</div>
											
										</div>
										<div class="col-md-4 col-lg-4 col-sm-12">
											<div class="form-group">
												<input name="password" placeholder="Password" type="password" class="form-control" id="pwd">
											</div>
										</div>
									</div>
								<div class="row">
										<div class="col-md-4 col-lg-4 col-sm-12">
												<div class="form-group " style="text-align: right !important;">
													<input name="conpassword" placeholder="Confirm password" type="text" class="form-control" id="usr">
												</div>
										</div>
										<div class="col-md-4 col-lg-4 col-sm-12">
												<div class="form-group" style="text-align:left;">
													<button type="submit" class="login-button custom_buttons"> Register </button>
												</div>
										</div>
								</div>
							</div>
								<!-- ending here -->
							  </div>

							</div>
						</div>

							</form>
						</div>

        <!-- This is the end of the registration -->





</div>