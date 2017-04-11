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

<body style="background-color: white">
	<!--<div class="row" >
		<nav>
			<div class="nav-wrapper">
                <ul>
					<li class="col s3"><a href="<?php echo base_url()?>Project/project" style="text-align: center">Projects</a></li>
					<li class="col s3"><a href="#create-project-modal" style="text-align: center; line-height:20px; padding-top:12px; padding-bottom: 12px">Create<br>Project</a></li>
					<li class="col s3 active"><a href="<?php echo base_url()?>Project/Picture" style="text-align: center">Pictures</a></li>
					<li class="col s3"><a href="<?php echo base_url()?>Project/test" style="text-align: center">Test</a></li>
				</ul>
			</div>
		</nav>
	</div>-->

	<div class="fixed-action-btn vertical">
   		<?php echo form_open_multipart('Project/upload_picture'); ?> 

   		<a class="btn-floating btn-large waves-effect waves-light red file-field input-field" onclick="document.getElementById('picture_upload').click();"> 
   			<input type="file" multiple name="picture_upload" accept="image/*" onchange="this.form.submit()" id="picture_upload" style="display: none;">
    		<i class="large material-icons">publish</i>
    	</a> 
    	<?php echo form_close(); ?>

    	<a class="btn-floating btn-large waves-effect waves-light red" href="/project/project" style="margin-top: 20px"> 
    		<i class="large material-icons">room</i>
    	</a> 

 	</div>

    <div class="row" style="max-width: 800px; margin-top: 20px;">
 		<div id="pictureGrid" class="grid" style="height: 100%;background-color: white">

		</div>
    </div>


    <div id="pictureModal" class="modal modal-fixed-footer" style="height:600px;">

		<?php echo form_open('project/edit_picture_info'); ?>

	    <div class="modal-content row">
	    	<input type="hidden" id="picture_id" name="picture_id"></input>

	    	<div class= "col s12 l6">
	    	<img class="modalPic center" id="modalPic" style="height:auto; width:100%">
	    	</div>

	    	<div class= "col s12 l6">
	    	<h5 style="text-align: center">Picture Information</h5>
			<hr/>

			<div style="position: relative; margin-top: 20px; margin-left: 10px; height:300px">
				<div class="input-field col s6" style="margin-top:-10px">
					<strong>Latitude</strong>
	          		<input type="text" id="Latitude" name="Latitude" class="validate">
	        	</div>

	        	<div class="input-field col s6" style="margin-top:-10px">
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

	        	<div class="input-field col s12">
	        		<strong>Description</strong>
		          	<textarea id="picture_description" name="picture_description" data-length="500" style="min-height: 120px;" class="materialize-textarea active"></textarea>
		          	
		        </div>
			</div>

			</div>

		</div>

		<div class="modal-footer">
			<input style="color:black; font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center" type="submit" name="Submit" value="Submit" class="modal-action modal-close waves-effect waves-green btn-flat "></input>
		<?php echo form_close(); ?>
	      	<a style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black" class="modal-action modal-close waves-effect waves-gray btn-flat">Cancel</a>

	    <?php echo form_open('project/deletePicture'); ?>
	    	<input type="hidden" id="delete_pic" name="delete_pic"></input>
	      	<input style="color:red; font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center" type="submit" name="Submit" value="Delete" class="modal-action modal-close waves-effect waves-red btn-flat "></input>
	    <?php echo form_close(); ?>

	    </div>

	</div>

</body>


  	<script>
	    $(document).ready(function(){

			$.ajax({
		        url: "/project/test_post", 
		        dataType: 'json',
		        success: function(result)
		        {
		        	var count = 0;
		        	
		        	$.each(result, function(){

		        		modalnum = "pictureModal" + count;
		        		hrefmodalnum = "#pictureModal" + count;

		        		var testElement = document.getElementById("pictureGrid");
						var elementdiv = document.createElement("div");
						var elementa = document.createElement("a");
						var elementimg = document.createElement("img");
		    			var srcPic = "/files/images/" + this.picture_id + ".jpg";

		    			//elementdiv.setAttribute("id","picture-card");
		    			elementdiv.setAttribute("class","grid-image-item");	
		    			
		    			elementa.setAttribute("id", modalnum);
		    			elementa.setAttribute("class", "myImg");
		    			elementa.setAttribute("href", "#pictureModal");

		    			elementimg.setAttribute("src", srcPic);

		    			testElement.appendChild(elementdiv);
		    			elementdiv.appendChild(elementa);
		    			elementa.appendChild(elementimg);

					    count += 1;
					});

		            var $grid = $('.grid').imagesLoaded( function() {
					  // init Packery after all images have loaded
					  $grid.packery({
					    itemSelector: '.grid-image-item', percentPosition: true, "gutter": 10
					  });
					});

		        	$('.myImg').click(function() {
	    				var picnum = $(this).attr("id");
	    				var mynum = picnum.substring(12);
	    				var srcPic = "/files/images/" + result[mynum].picture_id + ".jpg";
	    				
				        $("#pictureModal .modal-content #picture_description").val( result[mynum].description );
				        $("#pictureModal .modal-content #Latitude").val( result[mynum].lat );
				        $("#pictureModal .modal-content #Longitude").val( result[mynum].lng );
				        $("#pictureModal .modal-content #Address").val( result[mynum].address );
				        $("#pictureModal .modal-content #picture_id").val( result[mynum].picture_id );
				        $("#pictureModal .modal-footer #delete_pic").val( result[mynum].picture_id );
				        $('#pictureModal .modalPic').attr('src', srcPic );
				        $('.modal').modal();
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

					openModal();


		        }
		    });
		});


	    function openModal(){
	    	$('.modal').modal();
	    }


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

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdDu8izbxISEkID8QNUqH3zUnmfU-jRys&libraries=places">
    </script>
	

</html>