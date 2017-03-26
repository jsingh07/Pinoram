<html>

<style>
.vertical-menu {
    width: 200px; /* Set a width if you like */
    border-right: 1px solid #e0e0e0;
    height: 700px;
}

.vertical-menu a {
    background-color: #fffff; /* Grey background color */
    color: black; /* Black text color */
    display: block; /* Make the links appear below each other */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
    background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
    background-color: #ccc; /* Add a green color to the "active/current" link */
    color: white;
}

#profile li{
	margin-top: 20px;
}

#profile #label li{
	font-weight: bold;
	font-size: 1.1em;
	margin-top: 30px;
}

#profile input{
	margin-bottom: 8px;
}

.tabs .tab a {
	color: #4db6ac;
}

.tabs .tab a:hover, .tabs .tab a.active {
	color: #4db6ac;
}

.tabs.tabs-transparent .tab a,
.tabs.tabs-transparent .tab.disabled a,
.tabs.tabs-transparent .tab.disabled a:hover {
	color: #4db6ac;
}

.tabs .indicator {
    background-color: #4db6ac;
}

</style>


<body>
	<div class="row" id="user-profile" style=" position: relative; margin-top: 3%; max-width: 800px; height: 700px;">
		<div class="card z-depth-5 col s12" style="height: 700px;">
			<div class="vertical-menu left hide-on-small-and-down" style="margin-left:-11px; position: relative; display:inline-block; z-index:100;">
				<a href="<?php echo site_url();?>Account" style="padding-left: 40px;">Account</a>
				<a href="" class="active" style="padding-left: 40px;">Edit Profile</a>
			 	<a href="<?php echo site_url();?>User_Authentication/password_recovery" style="padding-left: 40px;">Change Password</a>
			  	<a href="" style="padding-left: 40px;">Friends</a>
			  	<a href="" style="padding-left: 40px;">Delete Account</a>
			</div>

			<div class="row hide-on-med-and-up">
	    		<div class="col s12">
					<ul class="tabs" style="">
		        		<li class="tab col s3"><a target="_self" href="<?php echo site_url();?>Account">Account</a></li>
		        		<li class="tab col s3"><a style="line-height:25px;" target="_self" class="active" href="">Edit<br>Profile</a></li>
		        		<li class="tab col s3"><a style="line-height:25px;" target="_self" href="<?php echo site_url();?>User_Authentication/password_recovery">Change<br>Password</a></li>
		        		<li class="tab col s3"><a style="line-height:25px;" target="_self" href="">Delete<br>Account</a></li>
		      		</ul>
	      		</div>
      		</div>

			<div class="row" id="profile" style="margin-top: 20px; height:650px; position: relative;" >
				<div class="col s3" id="label" style="text-align: right">
					<ul>
						<li>Phone</li>
						<li>Location</li>
						<li>Bio</li>
						<li style="margin-top:110px;">Website</li>
						<li>Facebook</li>
						<li>LinkedIn</li>
						<li>Twitter</li>
						<li>Instagram</li>
						<li>Youtube</li>
					</ul>
				</div>

				<?php echo form_open('Account/edit_profile'); ?>

				<div class="col s7 m5" style="margin-left: 10px; margin-top: 19px">
					<input id="phone" name="phone" autocomplete="off" value="<?php echo $phone ?>">
					<input id="location" name="location" autocomplete="off" value="<?php echo $location ?>">
					<textarea rows="5" cols="10" id="bio"  name="bio" style="height: 100%; margin-top:10px;  max-width:300px;"><?php echo $bio ?></textarea>
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
					