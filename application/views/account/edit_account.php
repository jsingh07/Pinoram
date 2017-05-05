<html>

<body >
	<div id ="hidden-pic-id" data-id= "<?php echo $this->session->userdata("profile_pic")?>" >
    </div>
	<div class="row" id="user-profile">

		<div class="card col s12" style="height: 700px;">
			<div class="vertical-menu left hide-on-small-and-down" id="edit_account_v_menu">

				<a href="" class="active" style="padding-left: 40px;">Account</a>
				<!--<a href="<?php echo site_url();?>Account/profile" style="padding-left: 40px;">Edit Profile</a>-->
			 	<a href="<?php echo site_url();?>Login/password_recovery" style="padding-left: 40px;">Change Password</a>
			  	<a href="<?php echo site_url();?>Account/delete_account" style="padding-left: 40px;">Delete Account</a>
			</div>

			<div class="row hide-on-med-and-up">
	    		<div class="col s12">
					<ul class="tabs">
		        		<li class="tab col s3"><a target="_self" class="active" href="">Account</a></li>
		        		<!--<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/profile">Edit<br>Profile</a></li>-->
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Login/password_recovery">Change<br>Password</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/delete_account">Delete<br>Account</a></li>
		      		</ul>
	      		</div>
      		</div>
      		

			<div class="row" id="profile">
				<div class="error_msg">
					<?php 
						if(null !== $this->session->flashdata('validation_error'))
						{
							echo $this->session->flashdata('validation_error');
						}
					?>
					<?php 
						if(null !== $this->session->flashdata('email_change_validation'))
						{
							echo $this->session->flashdata('email_change_validation');
						}
					?>
				</div>

				<div class="col s4 m3" id="account-label">

					<ul>
						<li><img id="profile_image" class="circle responsive-img"></li>
						<li>Username</li>
						<li>First Name</li>
						<li>Last Name</li>
						<li>Email</li>
						<li>Bio</li>
					</ul>
				</div>

				<?php echo form_open('Account/edit_account'); ?>

				<div class="col s7 m5" id="account_input">
						<h4><?php echo $this->session->userdata('username')?></h4>
						<input id="username" class="validate" name="username" autocomplete="off" value="<?php echo $this->session->userdata('username') ?>">
						<input id="first_name" class="validate" name="first_name" autocomplete="off" value="<?php echo $this->session->userdata('first_name') ?>">
						<input id="last_name" class="validate" name="last_name" autocomplete="off" value="<?php echo $this->session->userdata('last_name') ?>">
						<input id="email" class="validate" type="email" name="email" autocomplete="off" value="<?php echo $this->session->userdata('email') ?>">
						<div>
							<textarea rows="5" cols="10" id="bio" name="bio" class="active" data-length="250"><?php echo $this->session->userdata('bio'); ?></textarea>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
				</div>
		        <?php echo form_close(); ?>
			</div>
		</div>
	</div>

	<div id="profileModal" class="modal modal-fixed-footer">
		<div class="row center">
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
				<a class="waves-effect waves-black btn-flat" style="color: green" id="submitbutton">
					Submit
					<input type="hidden" id="imagebase64" name="imagebase64">
					<?php echo form_close(); ?>
				</a>
				<a class="modal-action modal-close waves-effect waves-black btn-flat" style="color:black">
					Cancel       
        		</a> 
				<a class="waves-effect waves-black btn-flat" id="rotate" style="color:black">
					Rotate     
        		</a> 
        		<a class="waves-effect waves-black btn-flat" style="color:black" onclick="document.getElementById('upload').click();">
					Upload
        			<input type="file" id="upload" accept="image/*" style="display:none" onchange="readFile(this)"></input>       
        		</a> 
        	      
			</div>
			
		</div>
	</div>
</body>

<script type="text/javascript" src="/assets/js/account.js"> 
</script>


</html>