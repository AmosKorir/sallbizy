<div class="pagecontainer">
				<div class="headertext">
					Details: <hr>
                </div>
                <!--  -->
                <?php
                // get the user data from the session
                     $data=$this->session->userdata('userdetails');
                     echo "Name :".$data['firstname']." ".$data['lastname']."<br>";
                     echo "Email andress :".$data['username'] ."<br>";
                     echo "Location :".$data['location']."<br>";
                     echo "Phone :".$data['phone']."<br>";
                ?>
</div>