	$(document).ready(function(){
	    $('ul.tabs').tabs();

	    $("#profileModal").modal();

	    $("#profile_image").click(function(){
	    	$("#profileModal").modal('open');
	    });

  	});
	
	var uploadCrop = $('#demo-basic').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'circle'
            },
            boundary: {
                width: 250,
                height: 250
            },
            enableOrientation: true
    });

    var div_user_id = document.getElementById("hidden-user-id");
    var my_user_id = div_user_id.getAttribute("data-id");
    var profile_pic_link = '/files/profile_images/'+ my_user_id +'.jpg';

    $.get(profile_pic_link)
    .done(function() { 
    	$('#profile_image').attr("src", profile_pic_link);
    	/*uploadCrop.croppie('bind', {
    		url: "/files/profile_images/<?php echo $this->session->userdata("user_id")?>.jpg"
    	});*/
    }).fail(function() { 
    	$('#profile_image').attr("src","/files/static_images/default_profile.jpg");
    	/*uploadCrop.croppie('bind', {
    		url: "/files/profile_images/default.jpg"
    	});*/
    })

	function readFile(input) {
			if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
				$('.demo-basic').addClass('ready');
            	uploadCrop.croppie('bind', {
            		url: e.target.result
            	})
            	
            }
            
            reader.readAsDataURL(input.files[0]);
        }
        else {
	        swal("Sorry - you're browser doesn't support the FileReader API");
	    }
	};
    
	$('#rotate').click(function(){
		uploadCrop.croppie('rotate', 90);
	});

	$('#submitbutton').click(function(){
        uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(blob){
				    $('#imagebase64').val(blob);
        			$('#form').submit();
        });

    });