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


	<div class="fixed-action-btn vertical">
   		<?php echo form_open_multipart('Album/upload_picture', 'id="formPictureUpload"'); ?> 
   		<input type="hidden" name="hiddenlat" id="hiddenlat">
   		<input type="hidden" name="hiddenlng" id="hiddenlng">
   		<input type="hidden" name="hiddenaddress" id="hiddenaddress">
   		<a class="btn-floating btn-large waves-effect waves-light red file-field input-field" onclick="document.getElementById('picture_upload').click();"> 
   			<input type="file" multiple name="picture_upload" accept="image/*" onchange="uploadPicture(this)" id="picture_upload" style="display: none;">
    		<i class="large material-icons">publish</i>
    	</a> 
    	<?php echo form_close(); ?>

 	</div>

 	<div id="picturePreviewModal" class="modal" style="height:auto;">

	   	<image id="picturePreviewImage" ></image>
	   	<div class="modal-footer">
	      <button id="imageUploadButton" class="modal-action modal-close waves-effect waves-green btn-flat" style="color: green; width: 50%; max-width: 100px; padding: 0;">Upload</button>
	      <button class="modal-action modal-close waves-effect waves-green btn-flat" style="width: 50%; padding: 0; max-width: 100px">Cancel</button>
	    </div>

  	</div>

  	<div id="loading" class="modal" style="height:auto; max-width: 350px; margin-top: 30%">


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

	    <div id="picture-info" class="modal-content row">
	    	<input type="hidden" id="picture_id" name="picture_id"></input>



	    	<div id="picture-info-div" class= "right" style="width: 300px; margin-top:10px;">
		    	

				<div style="position: relative; margin-top: 20px; width:100%">
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


  	<script>
	    $(document).ready(function(){

	    	$('#picture_upload').click(function() {
	    		//console.log(this.value);
	    	});

			$.ajax({
		        url: "/Album/test_post", 
		        dataType: 'json',
		        success: function(result)
		        {
		        	var count = 0;

		        	if(result.length == 0)
		        	{
		        		var temp0 = document.getElementById("pictureGrid");
		        		var temp1 = document.createElement("div");
		        		var temp2 = document.createElement("div");
		        		var temp3 = document.createElement("div");
		        		var temp4 = document.createElement("div");
		        		var temp5 = document.createElement("span");

		        		temp1.setAttribute("class","row");	
		        		temp1.setAttribute("style","max-width: 400px; position: relative;");	
		        		temp2.setAttribute("class","col s12 m12");	
		        		temp2.setAttribute("style","margin-top: 100px;");	
		        		temp3.setAttribute("class","card z-depth-5");	
		        		temp4.setAttribute("class","card-content black-text");
		        		temp5.setAttribute("class","card-title");
		        		temp5.innerText = "You have no pictures in your album. Please use the upload button below to upload pictures.";

		        		temp0.appendChild(temp1);
		    			temp1.appendChild(temp2);
		    			temp2.appendChild(temp3);
		    			temp3.appendChild(temp4);
		    			temp4.appendChild(temp5);
		        	}

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
	    				var srcPic = '/files/images/' + result[mynum].picture_id + '.jpg';

	    				var img = new Image();
						img.onload = function() 
						{

						  var imgWidth = this.width;
						  var imgHeight = this.height;

						  $("#pictureModal").css("background-image", "url('" + srcPic + "')");
						  $("#pictureModal").css("background-repeat", "no-repeat");
						  setModalSize(imgWidth, imgHeight);

						  $(window).resize(function(){
						    setModalSize(imgWidth, imgHeight);
						  });
						}
						img.src = srcPic;
	    				
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


		        }
		    });
		});


	    function openModal(){
	    	$('.modal').modal();
	    }

	    function setModalSize(imgWidth, imgHeight)
	    {
	    	var windowheight = Math.round($(window).height() ); 
	    	var windowwidth = Math.round($(window).width() ); 

	    	var myModalScroll = document.getElementById('pictureModal');
	    	myModalScroll.scrollTop = 0;

	    	if(imgWidth >= imgHeight)
	    	{
	    		var mywidth = Math.round(((imgWidth / imgHeight) * 400) + 350);
	    		var mywidthstring = mywidth + "px";
	    		if(windowwidth * .9 > 1200)
	    		{
	    			var modalHeight = Math.round((imgHeight/imgWidth) * (1200 - 350));
	    		}
	    		else
	    		{
	    			var modalHeight = Math.round((imgHeight/imgWidth) * ((windowwidth * .9) - 350));
	    		}
	    		if(modalHeight < 300)
	    		{
	    			if((windowwidth * .9) > 400)
	    			{
	    				var picHeight = Math.round((imgHeight/imgWidth) * 400);
	    			}
	    			else
	    			{
	    				var picHeight = Math.round((imgHeight/imgWidth) * (windowwidth * .9));
	    			}
	    			var infooffset = picHeight + 5;
	    			var backgroundSize = "100% " + "auto";
	    			modalHeight = picHeight + 250;
	    			calcinfoheight = picHeight + 460;
		    		$("#pictureModal").css("height", modalHeight);
		    		$("#pictureModal").css("width", "90%");
		    		$("#pictureModal").css("max-width", "400px");
		    		$("#pictureModal").css("background-size", backgroundSize);
		    		$("#pictureModal").css("overflow-y", "hidden");
		    		$("#pictureModal").css("margin-top", "10px");
		    		$("#picture-info").css("margin-top", infooffset);
		    		$("#picture-info").css("background-color", "transparent");
		    		$("#picture-info").css("height", "auto");
		    		$("#picture-info").css("padding-bottom", "0px");
		    		$("#picture-info-div").attr("class", "center");
		    		$("#picture-info-div").css("text-align", "left");
		    		$("#picture-info-div").css("width", "100%");
		    		$("#picture-info-div").css("height", calcinfoheight);
		    		$("#picture-info-div").css("overflow-y", "scroll");
		    		$("#picture-info-div").css("margin-top", "-15px");
		    		$("#picture-info-div").css("background-color", "transparent");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","fixed");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","100%");

	    		}
	    		else
	    		{
	    			var modalWidth;
	    			if(modalHeight > 600)
	    			{
	    				modalHeight = 600;
	    				modalWidth = (((imgWidth/imgHeight) * 600) + 350);
	    			}
	    			else
	    			{
	    				modalWidth = "90%";
	    			}
					
		    		var backgroundSize = "auto " + modalHeight +"px";
		    		$("#pictureModal").css("height", modalHeight);
		    		$("#pictureModal").css("width", modalWidth);
		    		$("#pictureModal").css("max-width", "1200px");
		    		$("#pictureModal").css("background-size", backgroundSize);
		    		$("#pictureModal").css("margin-top", "20px");
		    		$("#picture-info").css("background-color", "transparent");
		    		$("#picture-info").css("margin-top", "0px");
		    		$("#picture-info").css("height", "auto");
		    		$("#picture-info").css("padding-bottom", "70px");
		    		$("#picture-info-div").attr("class", "right");
		    		$("#picture-info-div").css("width", "300px");
		    		$("#picture-info-div").css("background-color", "transparent");
		    		$("#picture-info-div").css("overflow-y", "scroll");
		    		$("#picture-info-div").css("height", "auto");
		    		$("#picture-info-div").css("margin-top", "10px");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","absolute");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","350px");
	    		}
	    	}
	    	else
	    	{

	    		if(windowwidth < 900)
	    		{
	    			if((windowwidth * .9) > 400)
	    			{
	    				var picHeight = Math.round((imgHeight/imgWidth) * 400);
	    			}
	    			else
	    			{
	    				var picHeight = Math.round((imgHeight/imgWidth) * (windowwidth * .9));
	    			}
	    			var infooffset = picHeight + 20;
	    			var backgroundSize = "100% " + "auto";
	    			$("#pictureModal").css("height", "100%");
		    		$("#pictureModal").css("width", "90%");
		    		$("#pictureModal").css("max-width", "400px");
		    		$("#pictureModal").css("background-size", backgroundSize);
		    		$("#pictureModal").css("margin-top", "-50px");
		    		$("#picture-info").css("margin-top", infooffset);
		    		$("#picture-info").css("background-color", "white");
		    		$("#picture-info").css("height", "400px");
		    		$("#picture-info").css("padding-bottom", "0px");
		    		$("#picture-info-div").attr("class", "center");
		    		$("#picture-info-div").css("text-align", "left");
		    		$("#picture-info-div").css("width", "100%");
		    		$("#picture-info-div").css("background-color", "white");
		    		$("#picture-info-div").css("height", "auto");
		    		$("#picture-info-div").css("margin-top", "5px");
		    		$("#pictureModal").css("overflow-y", "scroll");
		    		$("#picture-info-div").css("overflow-y", "visible");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","fixed");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","100%");
		    		$("#picture-modal-footer").css("bottom", "0px");
		    		$("#picture-modal-footer").css("position", "static");
	    		}
	    		else
	    		{
					//var myheight = Math.round(((imgHeight / imgWidth) * 400));
					var mywidth = Math.round(((imgWidth / imgHeight) * 600));
					var modalwidth = (mywidth + 350) + "px";
		    		//var myheightstring = "900px";
		    		$("#pictureModal").css("width", modalwidth);
		    		$("#pictureModal").css("height", "900px");
		    		$("#pictureModal").css("max-width", "900px");
		    		$("#pictureModal").css("background-size", "auto 600px");
		    		$("#pictureModal").css("margin-top", "10px");
		    		$("#picture-info").css("background-color", "transparent");
		    		$("#picture-info").css("margin-top", "0px");
		    		$("#picture-info").css("height", "auto");
		    		$("#picture-info").css("padding-bottom", "0px");
		    		$("#picture-info-div").attr("class", "right");
		    		$("#picture-info-div").css("width", "300px");
		    		$("#picture-info-div").css("background-color", "transparent");
		    		$("#picture-info-div").css("overflow-y", "scroll");
		    		$("#picture-info-div").css("height", "auto");
		    		$("#picture-info-div").css("margin-top", "15px");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","absolute");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","350px");
		    	}
	    	}
	    }

	    function uploadPicture(input)
	    {
	    	if (input.files && input.files[0]) 
	    	{
		        var reader = new FileReader();
		        var file = input.files[0];

		        reader.onload = function (e) 
		        {

					$('#picturePreviewImage').attr('src', e.target.result);

		            var image  = new Image();
		            image.src = e.target.result;
		            var windowheight = Math.round($(window).height() ); 
	    			var windowwidth = Math.round($(window).width() ); 

		            image.onload = function () 
		            {
		            	var mypic = document.getElementById('picturePreviewImage');
		   
		            	EXIF.getData(mypic, function() 
		            	{

					    	if(EXIF.getTag(this, "GPSLatitude") && EXIF.getTag(this, "GPSLongitude"))
					    	{
							  	var lat = EXIF.getTag(this, "GPSLatitude"),
					            lng = EXIF.getTag(this, "GPSLongitude"),
					            latRef = EXIF.getTag(this, "GPSLatitudeRef"),
					            lngRef = EXIF.getTag(this, "GPSLongitudeRef");
					            mylat = toDecimal(lat[0], lat[1], lat[2], latRef);
					            mylng = toDecimal(lng[0], lng[1], lat[2], lngRef);
					        	//alert("I was taken at " + mylat + " " + mylng);
					        	var hiddenaddress = document.getElementById('hiddenaddress');
					        	var hiddenlat = document.getElementById('hiddenlat');
					        	var hiddenlng = document.getElementById('hiddenlng');

					        	hiddenlat.value = mylat;
					        	hiddenlng.value = mylng;
							
			            		var geocoder = new google.maps.Geocoder();
			            		var latlng = {lat: parseFloat(mylat), lng: parseFloat(mylng)};

						        geocoder.geocode({'location': latlng}, function(results, status) 
						        {
						            if (status === 'OK') 
						            {
						              var myaddress = (results[1].formatted_address);
						              hiddenaddress.value = myaddress;
						            }
						        });
						    }
				       	});

		            	if(this.width >= this.height)
		            	{

		            		/*$('#picturePreviewImage').css('-ms-transform', 'rotate(90deg)'); 
		            		$('#picturePreviewImage').css('-webkit-transform', 'rotate(90deg)');
		            		$('#picturePreviewImage').css('transform', 'rotate(90deg)');*/
		            		if(windowwidth < 450)
		            		{
		            			$('#picturePreviewImage').css('width', '100%');
				            	$('#picturePreviewImage').css('height', 'auto');
				            	$('#picturePreviewModal').css('width', '90%');
		            		}
		            		else
		            		{
				            	$('#picturePreviewImage').css('width', '400px');
				            	$('#picturePreviewImage').css('height', 'auto');
				            	$('#picturePreviewModal').css('width', '400px');
				            }
		            	}
		            	else
		            	{
		            		if(windowwidth < 450)
		            		{

		            			var tempheight = (windowheight * .5) + 'px';
		            			$('#picturePreviewImage').css('height', tempheight);
				            	$('#picturePreviewImage').css('width', 'auto');
				            	var previewModalWidth = ((this.width / this.height) * (windowheight * .5)) + "px";
				            	$('#picturePreviewModal').css('width', previewModalWidth);
		            		}
		            		else
		            		{
				            	$('#picturePreviewImage').css('height', '400px');
				            	$('#picturePreviewImage').css('width', 'auto');
				            	var previewModalWidth = ((this.width / this.height) * 400) + "px";
				            	$('#picturePreviewModal').css('width', previewModalWidth);
				            }
		            	}
		            	$('#imageUploadButton').click(function() 
		            	{
		            		$('#loading').modal({dismissible: false}).modal('open');
		            		input.form.submit();
		            	});
			        }

		            $('#picturePreviewModal').modal({
      						dismissible: false,
      						complete: function() { document.getElementById("formPictureUpload").reset(); }
      						}).modal('open');

		            var imageInfo =    +' '+ // get the value of `name` from the `file` Obj
			          file.type    +' '+
			          Math.round(file.size/1024) +'KB';
			          //console.log(imageInfo);
		        }


		        reader.readAsDataURL(input.files[0]);
		    }
	    }

	    function toDecimal($deg, $min, $sec, $hem) 
		{
		    $d = $deg + ((($min/60) + ($sec/3600)/100));
		    return ($hem=='S' || $hem=='W') ? $d*=-1 : $d;
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
            ('Geocode was not successful for the following reason: ' + status);
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