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
</style>

<body style="background-color: white">

	<div class="fixed-action-btn">
   		<?php echo form_open_multipart('Project/upload_picture'); ?> 

   		<a class="btn-floating btn-large waves-effect waves-light red file-field input-field" onclick="document.getElementById('picture_upload').click();"> 
   			<input type="file" multiple name="picture_upload" accept="image/*" onchange="this.form.submit()" id="picture_upload" style="display: none;">
    		<i class="large material-icons">publish</i>
    	</a> 
    	<?php echo form_close(); ?>
 	</div>

    <div class="row" style="max-width: 800px; background-color: white">
 		<div id="pictureGrid" class="grid" style="height: 100%;background-color: white">

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
				    });


		        }
		    });
		});

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdDu8izbxISEkID8QNUqH3zUnmfU-jRys&libraries=places">
    </script>
	

</html>