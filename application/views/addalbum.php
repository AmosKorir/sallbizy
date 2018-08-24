<div class="pagecontainer">
				<div style="color: rgb(63, 170, 219);margin-top: 30px" class="headertext">
					Add an Album: <hr>
                </div>

        <div class="formcard grey">
            <!--form to enter the product   -->
            
            <?php echo form_open_multipart('AdminAlbum/search');?>                   
            <br><br>
            <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <input  type="text" class="form-control "  id="price" placeholder="Search" name="search">

            </div>
            
            <div class="col-md-4 col-lg-4 col-sm-12">
             <div class="form-group" style="text-align:left;">
                   <button class="btn-primary" type="submit" class="">Search</button>
                </div>
                </div>
                </div>
            </form>

            <!-- form to select file -->
               
              <?php echo form_open_multipart('AdminAlbum/insertAlbum');?>

         <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">

                <p style="color: rgb(63, 170, 219);">Select artist</p>

            <?php
                 echo "<table class='table table-striped'>";
                 echo "<tr class='info'><td>Artist name</td></tr>";
                foreach ($artist as $artist) {
                   echo "<tr>";
                         

                   echo "

                            <td>
                                 <label><input type='radio' value=".$artist['artistid']." name='id'>".$artist['name']."</label>
                            </td>";

                }
                echo "</table>";

            ?>
          </div>

                <div class="col-md-4 col-lg-4 col-sm-12 success">
                        
                            <input  type="text" class="form-control "  id="price" placeholder="Album name" name="albumname">

                        

                    <label  for="my-file-selector">
                        <p style="color: rgb(63, 170, 219);">Select Image</p>
                          
                    <input class=" form-control" id="my-file-selector" placeholder="Select image" ondragover="" name="userfile" type="file">
                                                    
                     </label>
                        <br><br>
                      <button class="btn btn-primary form-control" type="submit" class="">Upload</button>
             


              </div>
              </form>
              <div class="col-md-4 col-lg-4 col-sm-12" style="color: red !important;" >
                            <!-- this error section -->
                        <?php echo validation_errors();?>
              </div>

          </div>




 </div>