<html>
<style>
#picture-card {
	width: 300px;
	height: 400px;
	overflow: hidden;
	text-align: center;
}
#picture-card img{
	max-width: 300px;
	min-height: 300px;
	max-height: 300px;
	margin:0 -50%;
  	position: absolute;
}

.modal.modal-fixed-footer .modal-footer#picture-modal-footer {
  right: 0px;
  height: 55px;
  width: 350px;
}

/*------pac-container z index changed to show google autocomplete inside modal----------*/
.pac-container {
    z-index: 100000;
}

</style>


<body style="background-color: white">
	<div id ="hidden-album-id" data-id=<?php echo $this->session->userdata['album_id']?> >
	</div>

	<div class="fixed-action-btn horizontal">
   		<?php echo form_open_multipart('Album/upload_picture', 'id="formPictureUpload"'); ?> 
   		<input type="hidden" name="hiddenlat" id="hiddenlat">
   		<input type="hidden" name="hiddenlng" id="hiddenlng">
   		<input type="hidden" name="hiddenaddress" id="hiddenaddress">
   		<a class="btn-floating btn-large waves-effect waves-light red file-field input-field" onclick="document.getElementById('picture_upload').click();"> 
   			<input type="file" multiple name="picture_upload" accept="image/*" onchange="uploadPicture(this)" id="picture_upload" style="display: none;">
    		<i class="large material-icons">publish</i>
    	</a> 
    	<ul>
    		<li style="margin-top: 20px;"><h5 style="font-size: 1.2em">Upload a Picture</h5></li>
    	</ul>
    	<?php echo form_close(); ?>

 	</div>

 	<div id="picturePreviewModal" class="modal" style="height:auto;">

	   	<image id="picturePreviewImage" ></image>
	   	<div class="modal-footer">
	      <button id="imageUploadButton" class="modal-action modal-close waves-effect waves-green btn-flat" style="color: green; width: 50%; max-width: 100px; padding: 0;">Upload</button>
	      <button class="modal-action modal-close waves-effect waves-green btn-flat" style="width: 50%; padding: 0; max-width: 100px">Cancel</button>
	    </div>

  	</div>

  	<div id="loading" class="modal" style="height:auto; max-width: 350px; margin-top: 200px">


	   	<div class="modal-content center">
	    	<h4>Uploading...</h4>
	    </div>

  	</div>



    <div class="row" style="max-width: 800px; margin-top: 20px;">
 		<div id="pictureGrid" class="grid" style="height: 100%; background-color: white">
		</div>
    </div>


    <div id="pictureModal" class="modal modal-fixed-footer" style="max-height: 600px; max-width: 900px; overflow: hidden;" >

    	<!--<div class= "left" style="width: 100%; position: fixed">
    		<img class="modalPic center" id="modalPic" style="height:auto; width:100%">
    	</div>-->
		<?php echo form_open('Album/edit_picture_info'); ?>

		<img class="modal-image" id="modal-image1" style="display:block; margin:0; padding:0; float:left">

	    <div id="picture-info" class="modal-content row" style="padding: 0">
	    	<input type="hidden" id="picture_id" name="picture_id"></input>

	    	<img class="modal-image" id="modal-image2" style="display:block; margin:0; padding:0; float:left">

	    	<div id="picture-info-div" class= "right" style="width: 300px;">
		    	
	    		<img class="modal-image" id="modal-image" style="display:block; margin:0; padding:0; float:left">

				<div style="position: relative; margin-top: 20px; width:100%">
					<div class="input-field col s6" style="margin-top:20px">
						<strong>Latitude</strong>
		          		<input type="text" id="Latitude" name="Latitude" class="validate">
		        	</div>

		        	<div class="input-field col s6" style="margin-top:20px">
		        		<strong>Longitude</strong>
		          		<input type="text" id="Longitude" name="Longitude" class="validate">
		        	</div>

		        	<div class="input-field col s12" style="margin-top:-10px">
	                    <a id="locate" class="btn-flat blue" style="width: 100%; color: white; text-align: center">Locate</a>
	                </div>

		        	<div class="input-field col s12">
		        		<strong>Address</strong>
		          		<input type="text" id="Address" name="Address" class="validate">
		        	</div>

		        	<div class="input-field col s12" style="margin-top:-10px">
		        		<strong>Description</strong>
			          	<textarea id="picture_description" name="picture_description" data-length="500" style="min-height: 80px;" class="materialize-textarea active"></textarea>
			        </div>
				</div>
			</div>

		</div>

		<div id="picture-modal-footer" class="modal-footer" align="right">
			<button style="color:green;font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center"  type="submit" name="Submit" value="Submit" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</button>
		<?php echo form_close(); ?>
	      	<a style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black" class="modal-action modal-close waves-effect waves-gray btn-flat">Cancel</a>

	    <?php echo form_open('Album/deletePicture'); ?>
	    	<input type="hidden" id="delete_pic" name="delete_pic"></input>
	      	<button style="color:red; font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center"  type="submit" name="Submit" value="Delete" class="modal-action modal-close waves-effect waves-red btn-flat ">Delete</button>
	    <?php echo form_close(); ?>

	    </div>

	</div>

</body>


  	<script src="/assets/js/picture_modal.js">
	    
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdDu8izbxISEkID8QNUqH3zUnmfU-jRys&libraries=places">
    </script>
	

</html>