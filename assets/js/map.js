function initMap() 
{
	var bounds = new google.maps.LatLngBounds();
    var uluru = {lat: 37.548271, lng: -121.988571};
    var map = new google.maps.Map(document.getElementById('map'));

    var markers; 
    var infoWindowContent; 

    var infoWindow = new google.maps.InfoWindow(), marker, i;

    $.ajax({
        url: "/project/test_post", 
        dataType: 'json',
        success: function(result)
        {
        	var i = 0;
        	$.each(result, function(){
            	//console.log(this.address);
            	if(this.lat != 0 && this.lng != 0 && this.lat != undefined && this.lng != undefined)
            	{

	            	infoWindowContent = /*'<div class="info_content">' +
	        							'<h3>London Eye</h3>' +
	        							'<p>Latitude: '+ this.lat + '</p>' + 
	        							'<p>Longitude: '+ this.lng + '</p>' + 
	        							'</div>';*/
	        		//'<div id="pictureModal" class="modal modal-fixed-footer" style="height:600px;">' +

						'<?php echo form_open("project/edit_picture_info"); ?>' +

					    '<div class="modal-content row" style = "width: 300px">' +
					    	'<input type="hidden" id="picture_id" name="picture_id"></input>' +

					    	'<h5 style="text-align: center">Picture Information</h5>' +
							'<hr/>' +

							'<img class="modalPic center" id="modalPic" style="height:auto; width:100%" src="/files/images/'+this.picture_id+'.jpg'+'">' +

							'<div style="position: relative; margin-top: 20px; margin-left: 10px; height:300px">' +
								'<div class="input-field col s6">' +
									'<strong>Latitude</strong>' +
					          		'<input type="text" id="Latitude" name="Latitude" class="validate" value="'+this.lat+'">' +
					        	'</div>' +

					        	'<div class="input-field col s6">' +
					        		'<strong>Longitude</strong>' +
					          		'<input type="text" id="Longitude" name="Longitude" class="validate" value="'+this.lng+'">' +
					        	'</div>' +

					        	'<div class="input-field col s12">' +
				                    '<input id="locate" type="button" value="Locate">' +
				                '</div>' +

					        	'<div class="input-field col s12">' +
					        		'<strong>Address</strong>' +
					          		'<input type="text" id="Address" name="Address" class="validate" value="'+this.address+'">' +
					        	'</div>' +

					        	'<div class="input-field col s12">' +
					        		'<strong>Description</strong>' +
						          	'<textarea id="picture_description" name="picture_description" data-length="500" style="min-height: 120px;" class="materialize-textarea active" value="'+this.description+'"></textarea>' +
						          	
						        '</div>' +
							'</div>' +
						'</div>';
					//'</div>';
	            	
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
			                infoWindow.setContent(this.info);
			                infoWindow.open(map, marker);
			            }
			        })(marker, i));
			        i++;
			    }

		        // Automatically center the map fitting all markers on the screen
		        

        	});
        	map.fitBounds(bounds);

        	/*var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
		        this.setZoom(14);
		        google.maps.event.removeListener(boundsListener);
		    });*/

        }
    });





        
    // Display multiple markers on a map
    /*var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });*/

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