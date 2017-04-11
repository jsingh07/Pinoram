<html>
<link href="/assets/css/vertical.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<body>
	<div class="row" id="user-profile" style=" position: relative; margin-top: 3%; max-width: 800px; height: 700px;">
		<div class="card z-depth-5 col s12" style="height: 700px;">
			<div class="vertical-menu left hide-on-small-and-down" style="margin-left:-11px; position: relative; display:inline-block; z-index:100;">
				<a href="<?php echo site_url();?>Account" style="padding-left: 40px;">Account</a>
				<a href="" class="active" style="padding-left: 40px;">Edit Profile</a>
			 	<a href="<?php echo site_url();?>Login/password_recovery" style="padding-left: 40px;">Change Password</a>
			  	<a href="<?php echo site_url();?>Account/delete_account" style="padding-left: 40px;">Delete Account</a>
			</div>

			<div class="row hide-on-med-and-up">
	    		<div class="col s12">
					<ul class="tabs">
		        		<li class="tab col s3"><a target="_self" href="<?php echo site_url();?>Account">Account</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" class="active" href="">Edit<br>Profile</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Login/password_recovery">Change<br>Password</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/delete_account">Delete<br>Account</a></li>
		      		</ul>
	      		</div>
      		</div>

			<div class="row" id="profile">
				<div class="col s3" id="label" style="text-align: right">
					<ul>
						<li>Phone</li>
						<li>Location</li>
						<li>Bio</li>
						<li style="margin-top: 100px">Website</li>
						<li>Facebook</li>
						<li>LinkedIn</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Youtube</li>
					</ul>
				</div>

				<?php echo form_open('Account/edit_profile'); ?>

				<div id="info-div" class="col s7 m5" style="margin-left: 10px; margin-top: 17px">
					<input id="phone" name="phone" autocomplete="off" value="<?php echo $phone ?>">
					<input id="location" name="location" autocomplete="off" value="<?php echo $location ?>">
					<textarea rows="5" cols="10" id="bio" name="bio" style="resize: none; font-size: .8em; height: 110px; margin-top:10px;  max-width:300px;"><?php echo $bio ?></textarea>
					<input id="website" name="website" autocomplete="off" value="<?php echo $website ?>">
					<input id="facebook" name="facebook" autocomplete="off" value="<?php echo $facebook ?>">
					<input id="linkedin" name="linkedin" autocomplete="off" value="<?php echo $linkedin ?>">
					<input id="twitter" name="twitter" autocomplete="off" value="<?php echo $twitter ?>">
					<input id="instagram" name="instagram" autocomplete="off" value="<?php echo $instagram ?>">
					<input type="text" id="youtube" name="youtube" autocomplete="off" value="<?php echo $youtube ?>">
				</div>

				<div style="position: relative;">
		            <input style="margin-left: 20px; margin-top: 30px" class="col s4 m2 push-l3 btn waves-effect waves-light" type="submit" name="submit" value="Submit"></input>
		        </div>
		        <?php echo form_close(); ?>

			</div>
		</div>
	</div>
</body>

</html>
					