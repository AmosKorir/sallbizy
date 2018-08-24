<div class="pagecontainer">
				<div style="color: rgb(63, 170, 219);" class="headertext">
					Register an Artist: <hr>
                </div>

        <div class="formcard grey">
            <!--form to enter the product   -->
            <?php echo validation_errors();?>
            <?php echo form_open_multipart('AdminArtist/insertArtist');?>

            
						<label  for="my-file-selector">
                            <p style="color: rgb(63, 170, 219);">Select Artist image <br></p>
    					<input class="form-control" id="my-file-selector" placeholder="Select image" ondragover="" name="userfile" type="file">
							    					
							</label>

                      
            
            <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
            <input  type="text" class="form-control "  id="price" placeholder="Artist name:" name="artistname">
            </div>
            
                <div class="col-md-4 col-lg-4 col-sm-12">
                     <div class="form-group" style="text-align:left;">
                           <button class="btn btn-primary" type="submit" class="">Upload</button>
                     </div>
                </div>
                </div>
            </form>
          </div>




 </div>