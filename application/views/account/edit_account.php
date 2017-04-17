<html>
<style>
.thumb.active{
	display:none;
}
</style>
<body >
	<div class="row" id="user-profile" style=" position: relative; margin-top: 3%; max-width: 800px; width: 100%; height: 450px;">

		<div class="card z-depth-5 col s12" style="height: 450px;">
			<div class="vertical-menu left hide-on-small-and-down" style="margin-left:-11px; position: relative; display:inline-block; z-index:100;">

				<a href="" class="active" style="padding-left: 40px;">Account</a>
				<a href="<?php echo site_url();?>Account/profile" style="padding-left: 40px;">Edit Profile</a>
			 	<a href="<?php echo site_url();?>Login/password_recovery" style="padding-left: 40px;">Change Password</a>
			  	<a href="<?php echo site_url();?>Account/delete_account" style="padding-left: 40px;">Delete Account</a>
			</div>

			<div class="row hide-on-med-and-up">
	    		<div class="col s12">
					<ul class="tabs">
		        		<li class="tab col s3"><a target="_self" class="active" href="">Account</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/profile">Edit<br>Profile</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Login/password_recovery">Change<br>Password</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/delete_account">Delete<br>Account</a></li>
		      		</ul>
	      		</div>
      		</div>

      		

			<div class="row" id="profile" style="min-width: 300px">
      			<div class="row">
				<div class="col s4 m3" id="account-label" style="text-align: right; margin-left: -11px">

					<ul>
						<li><img id="profile_image" class="circle responsive-img" src="/files/profile_images/<?php echo $this->session->userdata('user_id')?>.jpg" style="width: 100px;"></li>
						<li>Username</li>
						<li>First Name</li>
						<li>Last Name</li>
						<li>Email</li>
					</ul>
				</div>

				<?php echo form_open('Account/edit_account'); ?>

				<div class="col s7 m5" style="margin-left: 10px; margin-top: 47px">
						<h4 style ="margin-bottom: 55px"><?php echo $this->session->userdata('username')?></h4>
						<input id="username" name="username" autocomplete="off" value="<?php echo $this->session->userdata('username') ?>">
						<input id="first_name" name="first_name" autocomplete="off" value="<?php echo $this->session->userdata('first_name') ?>">
						<input id="last_name" name="last_name" autocomplete="off" value="<?php echo $this->session->userdata('last_name') ?>">
						<input id="email" name="email" autocomplete="off" value="<?php echo $this->session->userdata('email') ?>">
				</div>

				<div style="position: relative;">
		            <button style="margin-left: 20px; margin-top: 40px" class="col s4 m2 push-l3 btn waves-effect waves-light" type="submit" name="submit">Submit</button>
		        </div>
		        <?php echo form_close(); ?>
		        </div>
			</div>

			<div id="profileModal" class="modal modal-fixed-footer" style="max-width: 500px; max-height: 500px">
				<div class="row center" style="margin-top: 10px">
					<h3>Profile Picture</h3>
					<hr style="margin-top: -10px"></hr>
				<div>
				<div class="row">
					<div class="col s12" style="margin-top: 20px">
					<?php echo form_open_multipart("account/upload_profile_picture", 'id="form"'); ?>
      					<div id="demo-basic"></div>
      					
            		</div>
       			</div>

      			<div id="picture-modal-footer" class="modal-footer" align="right">
      				<a class="modal-action modal-close waves-effect waves-black btn-flat" style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black">
      					Cancel       
                	</a> 
      				 
      				<a class="waves-effect waves-black btn-flat" style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black" onclick="document.getElementById('upload').click();">
      					Upload
                		<input type="file" id="upload" accept="image/*" style="display:none" onchange="readFile(this)"></input>       
                	</a> 

                	<a class="waves-effect waves-black btn-flat" style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black" id="submitbutton">
      					Submit
      					<input type="hidden" id="imagebase64" name="imagebase64">
      				<?php echo form_close(); ?>
      				</a>
      				<a class="waves-effect waves-black btn-flat" id="rotate" style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black">
      					Rotate     
                	</a> 
                	      
      			</div>
      			
      		</div>

		</div>
	</div>
</body>

<script>
	 $(document).ready(function(){
    $('ul.tabs').tabs();

    $("#profileModal").modal();

    $("#profile_image").click(function(){
    	$("#profileModal").modal('open');
    });


  });
      


</script>
<script >
	
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

		function readFile(input) {
 			if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            
	            reader.onload = function (e) {
					$('.demo-basic').addClass('ready');
	            	uploadCrop.croppie('bind', {
	            		url: e.target.result
	            	}).then(function(){
	            		console.log('jQuery bind complete');
	            	});
	            	
	            }
	            
	            reader.readAsDataURL(input.files[0]);
	        }
	        else {
		        swal("Sorry - you're browser doesn't support the FileReader API");
		    }
		}

	

        
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
</script>
</html>