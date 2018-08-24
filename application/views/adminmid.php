<div class="pagecontainer">
				<div class="headertext">
                    Admin: <hr>
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



                 <!-- list users -->
                 <div class="row grey">
                    <div class="col-md-1 col-sm-12 col-lg-1">
                    Name
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
                    Phone
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
                    Email
                    </div>
                    <div class="col-md-1 col-sm-12 col-lg-1">
                   Role
                    </div>
                    <div class="col-md-1 col-sm-12 col-lg-1">
                    Make Reseller
                    
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
                    Remove Reseller
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
    
                    </div>
                   
    
                </div>
   




                <?php
                foreach($currentusers as $user){
                    echo'
                    <div class="row">
                    <div class="col-md-1 col-sm-12 col-lg-1">'
                    . $user['firstname']." " .$user['lastname'].'
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
                    '.$user['phone'].'
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
                    '.$user['username'].'
                    </div>
                    <div class="col-md-1 col-sm-12 col-lg-1">
                    '.$user['role'].'
                    </div>
                    <div class="col-md-1 col-sm-12 col-lg-1">
                    <a class=" btn btn-success" href="'.base_url('superuser/add/').$user['userid'].'">Add</a>
                    
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
                    <a class=" btn btn-danger" href="'.base_url('superuser/remove/').$user['userid'].'">Remove</a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-lg-1">
    
                    </div>
    
                </div>
                <hr>
                ';
                }
                
                
                
                ?>
                </table>
            

















                </div>
                </nav>
                </div>



               





                
                
</div>