<html>

<body style="background-color: white">
	<div id ="hidden-album-id" data-id=<?php echo $this->session->userdata['album_id']?> >
	</div>
	
	<div class="row" style="margin-top: 20px">
        <div class="col s12 m8 offset-m2 l6 offset-l3" >
            <div class="card-content" style="border: none; margin: auto">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <?php if(file_exists('files/profile_images/'.$profile_pic.'.jpg')) {?>
                        <img src=<?php echo '/files/profile_images/'.$profile_pic.'.jpg'?> class="circle responsive-img" style="margin-top: 20px">   
                        <?php }else{ ?>
                        <img src="/files/static_images/default_profile.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php } ?>
                    </div>
	                    <div class="col s8" >
	                        <h3 id= "album_name" style="font-weight: bold"><?php echo $album_name?> by <a href="<?php echo base_url()?>album/user/<?php echo $username; ?>"><?php echo $username?></a></h3>
	                            <div id="album_des">
	                                <a id="description" style="font-size: 1.25em; color: #555;"><?php echo $description?></a>
	                            </div>
	                    </div>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>

    <div class="row" style="max-width: 800px; margin-top: 20px;">
 		<div id="pictureGrid" class="grid" style="height: 100%; background-color: white">
		</div>
    </div>


    <div id="pictureModal" class="modal modal-fixed-footer" style="max-height: 600px; max-width: 900px; overflow: hidden;" >


		<img class="modal-image" id="modal-image1" style="display:block; margin:0; padding:0; float:left">

	    <div id="picture-info" class="modal-content row" style="padding: 0">
	    	<input type="hidden" id="picture_id" name="picture_id" readonly></input>

	    	<img class="modal-image" id="modal-image2" style="display:block; margin:0; padding:0; float:left">

	    	<div id="picture-info-div" class= "right" style="width: 300px;">
		    	
	    		<img class="modal-image" id="modal-image" style="display:block; margin:0; padding:0; float:left">

				<div style="position: relative; margin-top: 20px; width:100%">
					<div class="input-field col s6" style="margin-top:20px">
						<strong>Latitude</strong>
		          		<input type="text" id="Latitude" name="Latitude" class="validate" readonly>
		        	</div>

		        	<div class="input-field col s6" style="margin-top:20px">
		        		<strong>Longitude</strong>
		          		<input type="text" id="Longitude" name="Longitude" class="validate" readonly>
		        	</div>

		        	<div class="input-field col s12">
		        		<strong>Address</strong>
		          		<input type="text" id="Address" name="Address" class="validate" readonly>
		        	</div>

		        	<div class="input-field col s12" style="margin-top:-10px">
		        		<strong>Description</strong>
			          	<textarea id="picture_description" name="picture_description" data-length="500" style="min-height: 80px;" class="materialize-textarea active" readonly></textarea>
			        </div>
				</div>
			</div>

		</div>

	</div>

</body>


  	<script src="/assets/js/public_picture_modal.js">
	    
    </script>

    <script async defer
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdDu8izbxISEkID8QNUqH3zUnmfU-jRys&libraries=places">
    </script>
	

</html>