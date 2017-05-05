$(document).ready(function(){
	var div_album_id = document.getElementById("hidden-album-id");
	var my_album_id = div_album_id.getAttribute("data-id");
			$.ajax({
		        url:"/Album/get_picture_public",
        		data: { 
            		album_id: my_album_id
          		},
		        dataType: 'json',
		        success: function(result)
		        {
		        	//console.log(result);
		        	var count = 0;

		        	var div_album_id = document.getElementById("hidden-album-id");
		        	var album_id = div_album_id.getAttribute("data-id");
		        	var album_count = 0;
		        	var found = false; 
		        	//find position fo album within array

		        	
		        	//check if album has any pictures in it
		        	if(result['pictures'].length == 0)
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
		        	else
		        	{
			        	//loop through all pictures in album to layout in grid
			        	$.each(result['pictures'], function(){
			        		
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
		        	}

		        	
		            var $grid = $('.grid').imagesLoaded( function() {
					  // init Packery after all images have loaded
					  $grid.packery({
					    itemSelector: '.grid-image-item', percentPosition: true, "gutter": 10
					  });
					});

		        	$('.myImg').click(function() {
	    				var picnum = $(this).attr("id");
	    				var mynum = picnum.substring(12);
	    				var srcPic = '/files/images/' + result['pictures'][mynum].picture_id + '.jpg';

	    				var img = new Image();
						img.onload = function() 
						{

						  var imgWidth = this.width;
						  var imgHeight = this.height;

						  //$("#pictureModal").css("background-image", "url('" + srcPic + "')");
						  //$("#pictureModal").css("background-repeat", "no-repeat");
						  //$(".modal-image").attr("src", srcPic);
						  setModalSize(imgWidth, imgHeight, srcPic);

						  $(window).resize(function(){
						    setModalSize(imgWidth, imgHeight, srcPic);
						  });
						}
						img.src = srcPic;
	    				
				        $("#pictureModal .modal-content #picture_description").val( result['pictures'][mynum].description );
				        $("#pictureModal .modal-content #Latitude").val( result['pictures'][mynum].lat );
				        $("#pictureModal .modal-content #Longitude").val( result['pictures'][mynum].lng );
				        $("#pictureModal .modal-content #Address").val( result['pictures'][mynum].address );
				        $("#pictureModal .modal-content #picture_id").val( result['pictures'][mynum].picture_id );
				        $("#pictureModal .modal-footer #delete_pic").val( result['pictures'][mynum].picture_id );
				        $('#pictureModal .modalPic').attr('src', srcPic );
				        $('.modal').modal();

				 
				   
				    });


		        }
		    });
		});


	    function openModal(){
	    	$('.modal').modal();
	    }

	    function setModalSize(imgWidth, imgHeight, srcPic)
	    {
	    	var windowheight = Math.round($(window).height() ); 
	    	var windowwidth = Math.round($(window).width() ); 

	    	var myModalScroll = document.getElementById('pictureModal');
	    	//var modalImage = document.createElement('img');
	    	//modalImage.setAttribute("")
	    	myModalScroll.scrollTop = 0;

	    	//check aspect of image portrait or landscape
	    	if(imgWidth >= imgHeight)
	    	{
	    		//take 90% of windowwidth, max 1100
	    		if(windowwidth * .9 > 1100)
	    		{
	    			var modalHeight = Math.round((imgHeight/imgWidth) * (1100 - 320));
	    		}
	    		else
	    		{
	    			var modalHeight = Math.round((imgHeight/imgWidth) * ((windowwidth * .9) - 320));
	    		}
	    		//check if mobile page or desktop
	    		if(modalHeight < 300)
	    		{
	    			//base pic height on width of window
	    			if((windowwidth * 1) > 400)
	    			{
	    				var picHeight = Math.round((imgHeight/imgWidth) * 400);
	    			}
	    			else
	    			{
	    				var picHeight = Math.round((imgHeight/imgWidth) * (windowwidth * 1));
	    			}
	    			//var infooffset = picHeight + 5;
	    			//modalHeight = picHeight + 300;
	    			infoHeight = (picHeight + 600) + "px";
		    		$("#pictureModal").css("height", "95%");
		    		$("#pictureModal").css("width", "100%");
		    		$("#pictureModal").css("max-width", "400px");
		    		$("#pictureModal").css("overflow-y", "hidden");
		    		$("#pictureModal").css("margin-top", "-50px");
		    		$("#modal-image1").attr("src", "");
		    		$("#modal-image2").attr("src", srcPic);
		    		$(".modal-image").css("width", "100%");
		    		$(".modal-image").css("height", "auto");
		    		$(".modal-image").css("float", "left");

		    		$("#picture-info").css("background-color", "transparent");
		    		$("#picture-info").css("height", "auto");
		    		//$("#picture-info").css("padding-bottom", "0px");
		    		$("#picture-info-div").attr("class", "center");
		    		$("#picture-info-div").attr("float", "none");
		    		$("#picture-info-div").css("text-align", "left");
		    		$("#picture-info-div").css("width", "100%");
		    		$("#picture-info-div").css("height", infoHeight);
		    		$("#picture-info-div").css("overflow-y", "auto");
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
	    				modalWidth = (((imgWidth/imgHeight) * 600) + 320);
	    			}
	    			else
	    			{
	    				modalWidth = "90%";
	    			}
					
		    		var imgHeight = modalHeight +"px";
		    		var infoHeight = (modalHeight-30) + "px";
		    		$("#pictureModal").css("height", modalHeight);
		    		$("#pictureModal").css("width", modalWidth);
		    		$("#pictureModal").css("max-width", "1100px");
		    		//$("#pictureModal").css("background-size", backgroundSize);
		    		$("#pictureModal").css("margin-top", "20px");
		    		$("#modal-image1").attr("src", srcPic);
		    		$("#modal-image2").attr("src", "");
		    		$(".modal-image").css("width", "auto");
		    		$(".modal-image").css("height", imgHeight);
		    		$(".modal-image").css("float", "left");

		    		$("#picture-info").css("background-color", "transparent");
		    		$("#picture-info").css("height", infoHeight);
		    		$("#picture-info").css("padding-bottom", "70px");
		    		$("#picture-info-div").attr("float", "right");
		    		$("#picture-info-div").attr("class", "right");
		    		$("#picture-info-div").css("width", "300px");
		    		$("#picture-info-div").css("background-color", "transparent");
		    		$("#picture-info-div").css("overflow-y", "auto");
		    		$("#picture-info-div").css("height", "auto");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","absolute");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","320px");
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
	    				var picHeight = Math.round((imgHeight/imgWidth) * (windowwidth * 1));
	    			}
	    			var backgroundSize = "100% " + "auto";
	    			var infoHeight = (picHeight + 600) + "px";
	    			$("#pictureModal").css("height", "95%");
		    		$("#pictureModal").css("width", "100%");
		    		$("#pictureModal").css("max-width", "400px");
		    		$("#pictureModal").css("margin-top", "-15%");
		    		$("#pictureModal").css("overflow-y", "hidden");
		    		$("#modal-image1").attr("src", "");
		    		$("#modal-image2").attr("src", srcPic);
		    		$(".modal-image").css("width", "100%");
		    		$(".modal-image").css("height", "auto");
		    		$(".modal-image").css("float", "left");

		    		$("#picture-info").css("height", "auto");
		    		//$("#picture-info").css("padding-bottom", "0px");
		    		$("#picture-info-div").attr("class", "center");
		    		$("#picture-info-div").attr("float", "none");
		    		$("#picture-info-div").css("text-align", "left");
		    		$("#picture-info-div").css("width", "100%");
		    		$("#picture-info-div").css("height", infoHeight);
		    		$("#picture-info-div").css("overflow-y", "auto");
		    		$("#picture-info-div").css("background-color", "transparent");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","fixed");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","100%");

		    		/*$("#picture-info").css("margin-top", infooffset);
		    		$("#picture-info").css("height", "400px");
		    		$("#picture-info").css("padding-bottom", "0px");
		    		$("#picture-info-div").attr("class", "center");
		    		$("#picture-info-div").css("text-align", "left");
		    		$("#picture-info-div").css("width", "100%");
		    		$("#picture-info-div").css("height", "auto");
		    		$("#picture-info-div").css("margin-top", "5px");
		    		$("#pictureModal").css("overflow-y", "scroll");
		    		$("#picture-info-div").css("overflow-y", "visible");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","fixed");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","100%");
		    		$("#picture-modal-footer").css("bottom", "0px");
		    		$("#picture-modal-footer").css("position", "static");*/
	    		}
	    		else
	    		{
					//var myheight = Math.round(((imgHeight / imgWidth) * 400));
					var mywidth = Math.round(((imgWidth / imgHeight) * 500));
					var modalwidth = (mywidth + 320) + "px";
		    		//var myheightstring = "900px";
		    		$("#pictureModal").css("width", modalwidth);
		    		$("#pictureModal").css("height", "500px");
		    		$("#pictureModal").css("max-width", "900px");
		    		$("#pictureModal").css("margin-top", "10px");
		    		$("#modal-image1").attr("src", srcPic);    //auto 600px
		    		$("#modal-image2").attr("src", "");
		    		$(".modal-image").css("width", "auto");
		    		$(".modal-image").css("height", "500px");
		    		$(".modal-image").css("float", "left");

		    		$("#picture-info").css("background-color", "transparent");
		    		$("#picture-info").css("margin-top", "0px");
		    		$("#picture-info").css("height", "auto");
		    		$("#picture-info").css("padding-bottom", "0px");
		    		$("#picture-info-div").attr("class", "right");
		    		$("#picture-info-div").css("width", "300px");
		    		$("#picture-info-div").css("background-color", "transparent");
		    		$("#picture-info-div").css("overflow-y", "hide");
		    		$("#picture-info-div").css("height", "450px");
		    		$("#picture-info-div").css("margin-top", "15px");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("position","absolute");
		    		$(".modal.modal-fixed-footer .modal-footer#picture-modal-footer").css("width","320px");
		    	}
	    	}
	    }

	    function uploadPicture(input)
	    {
	    	$('#loading').modal({dismissible: false}).modal('open');
	   

	    	if (input.files && input.files[0]) 
	    	{
		        var reader = new FileReader();
		        var file = input.files[0];

		        reader.onload = function (e) 
		        {

					$('#picturePreviewImage').attr('src', e.target.result);

		            var image  = new Image();
		            image.src = e.target.result;
		            //var windowheight = Math.round($(window).height() ); 
	    			//var windowwidth = Math.round($(window).width() ); 

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
						            input.form.submit();
						        });

						    }
						    else
						   	{
						   		input.form.submit();
						   	}
				       	});
				    }

				}
				reader.readAsDataURL(input.files[0]);
			}
	    }

	    function toDecimal($deg, $min, $sec, $hem) 
		{
		    $d = $deg + ((($min/60) + ($sec/3600)/100));
		    return ($hem=='S' || $hem=='W') ? $d*=-1 : $d;
		}
