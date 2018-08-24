<div class="pagecontainer">
				<div class="headertext">
					 Details: <hr>
				</div>
				<?php foreach($items as $item):?>	
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
				<img style=" max-width:300px;max-height:300px" src="<?php echo site_url()?>/resources/images/<?php echo $item['image'];?>">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
				<div style="padding-left: 30px;">
										<h5 class="card-title"><?php echo $item['product_title']?></h5>
										<p class="card-text theam_glyphicon" >Price: <?php echo $item['price']?></p>
										<!-- switch cases here -->
											<?php $userdetail=$this->session->userdata('userdetails');
																						
											if($userdetail['role']==='reseller'){
												echo"You can resell this item";
												if($item['status']==='idle'){
													echo  "<p class='card-text theam_glyphicon' >Seller: ". $item['firstname']."</p>";
													echo "<p class='card-text theam_glyphicon' >Phone:".  $item['phone']."</p>";
												}elseif($userdetail['userid']===$item['brokerid']){
													echo  "<p class='card-text theam_glyphicon' >Seller: ". $item['firstname']."</p>";
													echo "<p class='card-text theam_glyphicon' >Phone:".  $item['phone']."</p>";
												}else{
													echo  "<p class='card-text theam_glyphicon' >Seller: ". $broker['firstname']."</p>";
													echo "<p class='card-text theam_glyphicon' >Phone:".  $broker['phone']."</p>";
												}
												
												

											}else {
												
												
												echo "<p class='card-text theam_glyphicon' >Phone:".  $broker['phone']."</p>";
											}



											?>
									
										<p class="card-text" style=" word-wrap: break-word;"><?php echo $item['description']?></p>
									
										</div>
									<div style="text-align: center;">
									
										<?php
												$userdetail=$this->session->userdata('userdetails');
											if($userdetail['role']==='reseller'){
												if($item['status']==='idle'){
												echo"
											<a class='btn-custom  ' href=".site_url("item/book/".$item['product_id']). ">Book</a>";
											}
											if($userdetail['userid']===$item['brokerid']){
												if($item['status']==='done'){
													echo '<br> You marked the item as sold';
												}else{
													echo "<a class='btn-customred ' href=".site_url("item/release/".$item['product_id']). ">Done</a>";
												}
												
												
											}
										}
											if($item['userid']===$this->session->userdata('userid')){
												echo"
											<a class='btn btn-custom ' href=".site_url("item/delete_product/".$item['product_id']). "> Delete</a>";
											}

										?>
											
										
									</div>
										<div style="color:green"> Please contact the above number:</div>
								</div>
				</div>
				
			</div>
			<?php endforeach;?>


</div>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="footer">
      <div class="fcontainer">
              
              <a href='#'><i class="fa fa-facebook fa-2x fa-fw"></i></a>
              <a href='#'><i class="fa fa-twitter fa-2x fa-fw"></i></a>
              
            </span>
      </div>
    </div>
