function initMap() 
{
	var bounds = new google.maps.LatLngBounds();
    var uluru = {lat: 37.548271, lng: -121.988571};
    var map = new google.maps.Map(document.getElementById('map'), {
          center: uluru,
          zoom: 8
        });

    var markers; 
    var infoWindowContent; 

    var infoWindow = new google.maps.InfoWindow(), marker, i;

    $.ajax({
        url: "/Album/get_Album", 
        dataType: 'json',
        success: function(result)
        {


        	console.log(result);
        	if(result.length != 0)
        	{
        		var marked = 0;
        		var i = 0;
        		var url = window.location.href.split("?album_id=");
        		var album_id = url[1];

        		var album_count = 0;
	        	var found = false; 
	        	//find position fo album within array
	        	$.each(result, function(){
	        		$.each(this, function(){
	        			if(this.album_id == album_id)
	        			{
							found = true;
						}
						else if(!found)
						{
							album_count++;
						}
	        		});
	        	});

	        	$.each(result['album'][album_count]['pictures'], function(){
	            	//console.log(this.address);

	            	if(this.lat != 0 && this.lng != 0 && this.lat != undefined && this.lng != undefined)
	            	{
	            		var imageurl = "/files/images/";
	            		marked = 1;
		            	infoWindowContent = 
						    	'<div class="card" style="height: 150px; width:150px; background-image: url('+imageurl+this.picture_id+'.jpg); background-size: 150px, 150px ">'+
								//'<img class="modalPic center" id="modalPic" style="height:auto; width:100%;" src="/files/images/'+this.picture_id+'.jpg'+'">' +
								'</div>';

		            	
		            	var position = new google.maps.LatLng(this.lat, this.lng);
				        bounds.extend(position);
				        marker = new google.maps.Marker({
				            position: position,
				            map: map,
				            //title: markers[i][0]
				            info: infoWindowContent
				        });
				        // Allow each marker to have an info window    
				        google.maps.event.addListener(marker, 'click', (function(marker, i) {
				            return function() {
				            	//var myinfowindow = document.getElementsByClassName("gm-style-iw");
				            	//myinfowindow.style.background = "url("+"'/files/images/"+this.picture_id+".jpg')";
				                infoWindow.setContent(this.info);
				                infoWindow.open(map, marker);
				            }
				        })(marker, i));
				        i++;
					    
				    }

		        // Automatically center the map fitting all markers on the screen
		        
        		});
	        	//console.log(bounds);
	        	if(marked)
				{
		        	google.maps.event.addListener(map, 'zoom_changed', function() {
					    zoomChangeBoundsListener = 
					        google.maps.event.addListener(map, 'bounds_changed', function(event) {
					            if (this.getZoom() > 12 && this.initialZoom == true) {
					                // Change max/min zoom here
					                this.setZoom(12);
					                this.initialZoom = false;
					            }
					        google.maps.event.removeListener(zoomChangeBoundsListener);
					    });
					});
		        	map.initialZoom = true;
	        		map.fitBounds(bounds);
	        	}
        	}	

        	/*var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
		        this.setZoom(14);
		        google.maps.event.removeListener(boundsListener);
		    });*/

        }
    });
}











        /*styles: 
        [
			{
		        "featureType": "all",
		        "elementType": "labels.text.fill",
		        "stylers": [
		            {
		                "saturation": 36
		            },
		            {
		                "color": "#333333"
		            },
		            {
		                "lightness": 40
		            }
		        ]
		    },
		    {
		        "featureType": "all",
		        "elementType": "labels.text.stroke",
		        "stylers": [
		            {
		                "visibility": "on"
		            },
		            {
		                "color": "#ffffff"
		            },
		            {
		                "lightness": 16
		            }
		        ]
		    },
		    {
		        "featureType": "all",
		        "elementType": "labels.icon",
		        "stylers": [
		            {
		                "visibility": "off"
		            }
		        ]
		    },
		    {
		        "featureType": "administrative",
		        "elementType": "geometry.fill",
		        "stylers": [
		            {
		                "color": "#fefefe"
		            },
		            {
		                "lightness": 20
		            }
		        ]
		    },
		    {
		        "featureType": "administrative",
		        "elementType": "geometry.stroke",
		        "stylers": [
		            {
		                "color": "#fefefe"
		            },
		            {
		                "lightness": 17
		            },
		            {
		                "weight": 1.2
		            }
		        ]
		    },
		    {
		        "featureType": "landscape",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#f5f5f5"
		            },
		            {
		                "lightness": 20
		            }
		        ]
		    },
		    {
		        "featureType": "poi",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#f5f5f5"
		            },
		            {
		                "lightness": 21
		            }
		        ]
		    },
		    {
		        "featureType": "poi.park",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#dedede"
		            },
		            {
		                "lightness": 21
		            }
		        ]
		    },
		    {
		        "featureType": "road.highway",
		        "elementType": "geometry.fill",
		        "stylers": [
		            {
		                "color": "#ffffff"
		            },
		            {
		                "lightness": 17
		            }
		        ]
		    },
		    {
		        "featureType": "road.highway",
		        "elementType": "geometry.stroke",
		        "stylers": [
		            {
		                "color": "#ffffff"
		            },
		            {
		                "lightness": 29
		            },
		            {
		                "weight": 0.2
		            }
		        ]
		    },
		    {
		        "featureType": "road.arterial",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#ffffff"
		            },
		            {
		                "lightness": 18
		            }
		        ]
		    },
		    {
		        "featureType": "road.local",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#ffffff"
		            },
		            {
		                "lightness": 16
		            }
		        ]
		    },
		    {
		        "featureType": "transit",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#f2f2f2"
		            },
		            {
		                "lightness": 19
		            }
		        ]
		    },
		    {
		        "featureType": "water",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "color": "#e9e9e9"
		            },
		            {
		                "lightness": 17
		            }
		        ]
		    }
		]*/