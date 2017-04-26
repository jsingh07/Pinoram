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