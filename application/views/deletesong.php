<div class="pagecontainer">
				<div style="color: rgb(63, 170, 219);margin-top: 30px" class="headertext">
					Add an Album: <hr>
                </div>

        <div class="formcard grey">
            <!--form to enter the product   -->
            
            <?php echo form_open_multipart('Admin/deletesong');?>                   
            <br><br>
            <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <input  type="text" class="form-control "  id="price" placeholder="Search" name="search">

            </div>
            
            <div class="col-md-4 col-lg-4 col-sm-12">
             <div class="form-group" style="text-align:left;">
                   <button class="btn " type="submit" class="">Search</button>
                </div>
                </div>
                </div>
            </form>

            <!-- form to select file -->
                

         <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-12">

                <table class="table">
            <?php
                
              
              foreach ($songs as $row) {
                echo "<tr>
                <td><img  style='width:100px; height:100px'src=".base_url("resources/images/".$row['image'])."></img</td>"."
                <td>".$row['title']."</td>"."

                <td>".$row['name']."</td>".
               

                "<td><a class='btn btn-danger' href=".base_url("Admin/albumDelete/").$row['id'].">Delete</a></td>"

                ."</tr>";


              }
               
             ?>
           </table>

              

           
          </div>

                <div class="col-md-4 col-lg-4 col-sm-12 success">
                        
                        
             


              </div>
              </form>
              <div class="col-md-4 col-lg-4 col-sm-12" style="color: red !important;" >
                           
                       
              </div>

          </div>




 </div>