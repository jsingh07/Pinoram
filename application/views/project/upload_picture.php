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

/*------pac-container z index changed to show google autocomplete inside modal----------*/
.pac-container {
    z-index: 100000;
}

</style>

	<div class="row"">
		<nav>
			<div class="nav-wrapper" style="background-color: white;">
                <ul>
					<li class="col s3"><a href="<?php echo base_url()?>Project/project" style="text-align: center">Projects</a></li>
					<li class="col s3"><a href="#create-project-modal" style="text-align: center; line-height:20px; padding-top:12px; padding-bottom: 12px">Create<br>Project</a></li>
					<li class="col s3 active"><a href="<?php echo base_url()?>Project/Picture" style="text-align: center">Pictures</a></li>
					<li class="col s3"><a href="<?php echo base_url()?>Project/test" style="text-align: center">Test</a></li>
				</ul>
			</div>
		</nav>
	</div>



	<div class="row" style="max-width: 1000px;">
	 		<div class="grid" data-packery='{ "itemSelector": ".grid-image-item", "percentPosition": true, "gutter": 10 }'>
	        	<?php foreach ($files->result() as $files){ ?>
	        		<div class="grid-image-item">
			        	<a href="#pictureModal" class="myImg"
			        		data-id='[
			        		"<?php echo $files->description; ?>",
			        		"<?php echo $files->lat; ?>", 
			        		"<?php echo $files->lng; ?>", 
			        		"<?php echo $files->address; ?>",
			        		"<?php echo $files->picture_id; ?>", 
			        		"<?php echo base_url('files/images/'. $files->picture_id.'.jpg');?>"]' >
			        		<img src="<?php echo base_url('files/images/'. $files->picture_id.'.jpg');?>">
			        	</a>

			        	<div class="row" style="position: relative; margin-top: 290px; margin-left: 5px; margin-right: 5px;">
			        		<p class="left" style="text-align: left"><?php echo $files->address; ?><p>
			        	</div>

			        </div>
				<?php } ?>
			</div>
		
    </div>

    <div class="fixed-action-btn">
   		<?php echo form_open_multipart('Project/upload_picture'); ?>
   		<input type="hidden" name="project_id" id="project_id" value="<?php $project_id ?>" />
   		<button class="btn-floating btn-large waves-effect waves-light red file-field input-field"> 
    		<i class="large material-icons">publish</i>
    		<input type="file" multiple name="picture_upload" accept="image/*" onchange="this.form.submit()" id="picture_upload" onchange="previewFile()">
    	</button> 

    	<?php echo form_close(); ?>
 	</div>


    <div id="pictureModal" class="modal modal-fixed-footer" style="height:600px;">

		<?php echo form_open('project/edit_picture_info'); ?>

	    <div class="modal-content row">
	    	<input type="hidden" id="picture_id" name="picture_id"></input>

	    	<h4 style="text-align: center">Picture Information</h4>
			<hr/>

			<img class="modalPic center" id="modalPic" style="height:auto; width:100%">

			<div style="position: relative; margin-top: 20px; margin-left: 10px; height:300px">
				<div class="input-field col s6">
					<strong>Latitude</strong>
	          		<input type="text" id="Latitude" name="Latitude" class="validate">
	        	</div>

	        	<div class="input-field col s6">
	        		<strong>Longitude</strong>
	          		<input type="text" id="Longitude" name="Longitude" class="validate">
	        	</div>

	        	<div class="input-field col s12">
                    <input id="locate" type="button" value="Locate">
                </div>

	        	<div class="input-field col s12">
	        		<strong>Address</strong>
	          		<input type="text" id="Address" name="Address" class="validate">
	        	</div>

	        	<div class="input-field col s12">
	        		<strong>Description</strong>
		          	<textarea id="picture_description" name="picture_description" data-length="500" style="min-height: 120px;" class="materialize-textarea active"></textarea>
		          	
		        </div>
			</div>
		</div>


		<div class="modal-footer row">
			<btn><input type="submit" name="Submit" value="Submit" class="modal-action modal-close waves-effect waves-green btn-flat "></input></btn>
		<?php echo form_close(); ?>
	      	<btn class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</btn>

	    <?php echo form_open('project/deletePicture'); ?>
	    	<input type="hidden" id="delete_pic" name="delete_pic"></input>
	      	<btn><input style="color:red" type="submit" name="Submit" value="Delete" class="modal-action modal-close waves-effect waves-green btn-flat "></input></btn>
	    <?php echo form_close(); ?>

	    </div>


	</div>

	<div id="create-project-modal" class="modal modal-fixed-footer" style="min-height:500px;">

			<?php echo form_open('project/create_project'); ?>
		    <div class="modal-content row">
				<h4 style="text-align: center">Create a New Project</h4>
				<hr/>
				<div style="margin-top: 20px; margin-left: 10px;">
					<div class="input-field col s12">
		          		<input type="text" id="project_title" name="project_title" class="validate"
		            			value="">
		          		<label for="project_title"><strong>Title</strong></label>
		        	</div>
		        	<div class="input-field col s12">
			          	<textarea id="project_description" name="project_description" data-length="500" style="min-height: 120px;" class="materialize-textarea"></textarea>
			          	<label for="project_description"><strong>Description</strong></label>
			        </div>
			        <div class="switch">
					    <label>
					      	Private 
					      	<input id="project_access" name="project_access" type="checkbox">
					      	<span class="lever" for="project_access"></span>
					      	Public
					    </label>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<btn><input type="submit" name="Create" value="Create" class="modal-action modal-close waves-effect waves-green btn-flat "></input></btn>
		      	<btn class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</btn>
		    </div>
		    <?php echo form_close(); ?>

		</div>



  	<script>
  		$(document).ready(function(){
	      $('.carousel').carousel({noWrap: true});

	    });

	    $(document).ready(function(){
			$('.myImg').click(function() {
		        var picData = $(this).data('id');

		        $("#pictureModal .modal-content #picture_description").val( picData[0] );
		        $("#pictureModal .modal-content #Latitude").val( picData[1] );
		        $("#pictureModal .modal-content #Longitude").val( picData[2] );
		        $("#pictureModal .modal-content #Address").val( picData[3] );
		        $("#pictureModal .modal-content #picture_id").val( picData[4] );
		        $("#pictureModal .modal-footer #delete_pic").val( picData[4] );
		        $('#pictureModal .modalPic').attr('src', picData[5]);
		        $('.modal').modal();
		        for(var i = 0; i < 5; i++)
		        	console.log(picData[i]);
		     });

			var geocoder = new google.maps.Geocoder();
	        var input = document.getElementById('Address');


	        var autocomplete = new google.maps.places.Autocomplete(input);

	        document.getElementById('locate').addEventListener('click', function() {
	          geocodeLatLng(geocoder);
	        });

	        google.maps.event.addListener(autocomplete, 'place_changed', function() {
	          geocodeAddress(geocoder);
	        });

		});


      function geocodeAddress(geocoder) {

        var lat = document.getElementById('Latitude');
        var lng = document.getElementById('Longitude');

        var addressInput = document.getElementById('Address').value;

        geocoder.geocode({'address': addressInput}, function(results, status) {
          if (status === 'OK') {
            //var myaddress = (results[0].formatted_address);
            var mylat = (results[0].geometry.location.lat());
            var mylng = (results[0].geometry.location.lng());

            lat.value = mylat;
            lng.value = mylng;
            //addr.value = myaddress;
          } 
          else 
          {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      function geocodeLatLng(geocoder) 
      {
        var latInput = document.getElementById('Latitude').value;
        var lngInput = document.getElementById('Longitude').value;

        var address = document.getElementById('Address');

        var latlng = {lat: parseFloat(latInput), lng: parseFloat(lngInput)};

        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') 
            {
              var myaddress = (results[1].formatted_address);
              address.value = myaddress;
            } 
            else 
            {
              window.alert('No results found');
            }
        });
      }

		$(document).ready(function(){
		    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		    $('.modal').modal();
		  });


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdDu8izbxISEkID8QNUqH3zUnmfU-jRys&libraries=places">
    </script>
	
	
</html>