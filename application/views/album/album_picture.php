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
	<div id ="hidden-album-id" data-id=<?php echo $this->session->userdata('album_id')?> >
	</div>
	
	<div id ="hidden-user" data-id=<?php echo $this->session->userdata('username')?> >
	</div>
	<div class="row" style="margin-top: 20px">
        <div class="col s12 m8 offset-m2 l6 offset-l3" >
            <div class="card-content" style="border: none; margin: auto">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <?php if(file_exists('files/profile_images/'.$this->session->userdata('profile_pic').'.jpg')) {?>
                        <img src="/files/profile_images/<?php echo $this->session->userdata('profile_pic')?>.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php }else{ ?>
                        <img src="/files/static_images/default_profile.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php } ?>

                    </div>
	                    <div class="col s8" >
	                        <h3 id= "album_name" style="font-weight: bold"></h3>
	                            <div id="album_des">
	                                <a id="description" style="font-size: 1.25em; color: #555;"></a>
	                            </div>
	                            <div>
                					<i id="edit" class="material-icons right waves-effect waves-light">mode_edit</i>
                					<i id="delete" class="material-icons right waves-effect waves-light">delete</i>
                				</div>
	                    </div>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>

<!--Modal to edit Album title and description-->
<div id="edit-Album-modal" class="modal modal-fixed-footer" style="min-height:500px;">

            <?php echo form_open('Album/edit_Album'); ?>
            <div class="modal-content row">
                <h4 style="text-align: center">Edit Album</h4>
                <hr/>
                <div style="margin-top: 20px; margin-left: 10px;">

                    <div class="input-field col s12">
                    <h5 style="margin-bottom: -5px;">Album Name</h5>
                        <input type="text" id="Album_title" name="Album_title" class="validate"
                                value="">
                        
                    </div>
                    <div class="input-field col s12">
                    	<h5 style="margin-bottom: -45px;">Description</h5>
                        <input id="Album_description" name="Album_description" data-length="150" style="min-height: 120px;" class="materialize-textarea" value=""></textarea>  
                    </div>
                    <div class="switch">
                        <label>
                            Private 
                            <input id="Album_access" name="Album_access" type="checkbox">
                            <span class="lever" for="Album_access"></span>
                            Public
                        </label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button style="color:green;font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center"  type="submit" name="Submit" value="Submit" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</button>
                <a style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black" class="modal-action modal-close waves-effect waves-gray btn-flat">Cancel</a>
            </div>
            <?php echo form_close(); ?>

        </div>

<!--Delete Modal-->
<div id="delete-Album-modal" class="modal" style="max-width: 400px;">

	<div class="modal-content">
		<h4 id="delete_title" style="text-align: center; font-size: 2em"></h4>
		<p style="text-align: center; font-size: 1.25em; ">Warning: Deleting an album also deletes all pictures associated with it</p>
	</div>

	<div class="modal-footer">
	 	<?php echo form_open('Album/deleteAlbum'); ?>
	    <input type="hidden" id="delete_album" name="delete_album"></input>
		<button style="color:red;font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center"  type="submit" name="delete_album" value="Delete" class="modal-action modal-close waves-effect waves-green btn-flat ">Delete</button>
		<?php echo form_close(); ?>


        <a style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black" class="modal-action modal-close waves-effect waves-gray btn-flat">Cancel</a>
    </div>

</div>

 <!--FAB button for adding pictures-->
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

<!--Picutre modal to display image information-->
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