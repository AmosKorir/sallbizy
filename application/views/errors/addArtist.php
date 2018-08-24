<div class="pagecontainer">
				<div class="headertext">
					 Upload your item: <hr>
                </div>

        <div class="formcard grey">
            <!--form to enter the product   -->
            <?php echo validation_errors();?>
            <?php echo form_open_multipart('Welcome/create');?>

            
						<label  for="my-file-selector">
    					<input id="my-file-selector" placeholder="Select image" ondragover="" name="userfile" type="file">
							    					
							</label>

                      
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="product" placeholder="Song title" name="songtitle">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                         <select class="form-control" id="sell" name="artistid">
                        <option>Gospel</option>
                        <option>Hiphop</option>
                        <option>Rnb</option>
                        <option>Regae</option>
                        <option>Redymn</option>
                        <option>Bongo</option>
                        <option>Genge</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="product" placeholder="Album" name="album">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="form-group">
                        
                        <select class="form-control" id="sell" name="songcategory">
                        <option>Gospel</option>
                        <option>Hiphop</option>
                        <option>Rnb</option>
                        <option>Regae</option>
                        <option>Redymn</option>
                        <option>Bongo</option>
                        <option>Genge</option>
                        </select>
                    </div>
                   
                </div>
               



            </div>
            
            <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
            <input type="number" class="form-control "  id="price" placeholder="Set your Price:" name="songprice">
            </div>
            
            <div class="col-md-4 col-lg-4 col-sm-12">
             <div class="form-group" style="text-align:left;">
                   <button type="submit" class="">Upload</button>
                </div>
                </div>
                </div>
            </form>
          </div>




 </div>