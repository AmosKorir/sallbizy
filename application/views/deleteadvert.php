<div class="pagecontainer">
        <div style="color: rgb(63, 170, 219);margin-top: 30px" class="headertext">
          Add an Album: <hr>
                </div>

        <div class="formcard grey">
            <!--form to enter the product   -->
          

         <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">

                <table class="table">
            <?php
           
              foreach ($album as $row) {
                echo "<tr>
                <td><img  style='width:100px; height:100px'src=".base_url("resources/artist/".$row['image'])."></img</td>"."
                <td>".$row['name']."</td>"
                ."<td><a class='btn btn-danger' href=".base_url("Admin/albumDelete/").$row['albumid'].">Delete</a></td>"

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