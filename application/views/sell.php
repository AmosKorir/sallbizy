<div class="pagecontainer">
				<div style="color: rgb(63, 170, 219);" class="headertext">
                    Add a Song: <hr>
                </div>

        <div class="formcard grey">
            <!--form to enter the product   -->



                   <?php echo form_open_multipart('Admin/search');?>                   
                    <br><br>
                    <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <input  type="text" class="form-control "  id="price" placeholder="Search" name="search">

                    </div>
                    
                    <div class="col-md-4 col-lg-4 col-sm-12">
                     <div class="form-group" style="text-align:left;">
                           <button class="btn btn-primary" type="submit" class="">Search</button>
                        </div>
                        </div>
                        </div>
                    </form>



            <?php echo validation_errors();?>
            <?php echo form_open_multipart('Admin/insertSong');?>

            
						

                      
            <div class="row">

             <div class="col-md-4 col-lg-4 col-sm-12">

                <p style="color: rgb(63, 170, 219);">Select album</p>

            <?php
                 echo "<table class='table table-striped'>";
                 echo "<tr class='info'><td>Album title</td></tr>";
                foreach ($albums as $album) {
                   echo "<tr>";                        
                      echo " <td>
                                 <label><input type='radio' value=".$album['albumid']." name='id'>".$album['name']."</label>
                            </td>";
                }
                echo "</table>";

            ?>
          </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="product" placeholder="Song title" name="songtitle">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                         <select class="form-control" id="sell" name="category">
                        <option>gospel</option>
                        <option>benga</option>
                        <option>ohangla</option>
                        <option>afrofussion</option>
                        <option>nyatiti</option>
                        <option>orutu</option>
                        <option>onanda</option>
                        <option>genge</option>
                        <option>rhumba</option>
                        <option>bongo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                            <div class="form-group">
                         <select class="form-control" id="sell" name="type">
                        
                        <option>Video</option>
                        <option>Audio</option>
                        </select>
                    </div>
                       <input type="number" class="form-control "  id="price" placeholder="Set your Price:" name="songprice">
                   
                </div>

                <div class="col-md-4 col-lg-4 col-sm-12">

                    <label  for="my-file-selector">
                                                
                    <input class=" form-control" id="my-file-selector" placeholder="Select image" ondragover="" name="userfile" type="file">
                                                    
                     </label>
                 <div class="form-group" style="text-align:left;">
                   <button type="submit" class=" form-control btn btn-primary">Upload</button>
                </div>
                </div>
              



            </div>
            
            
            </form>
          </div>




 </div>