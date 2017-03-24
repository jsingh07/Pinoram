<html>

<style>
.vertical-menu {
    width: 200px; /* Set a width if you like */
    border-right: 1px solid #e0e0e0;
    height: 400px;
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

</style>


<body>
	<div class="row" id="user-profile" style=" position: relative; margin-top: 3%; max-width: 800px; height: 400px;">
		<div class="card z-depth-5 col s12" style="height: 400px;">
			<div class="vertical-menu left" style="margin-left:-11px; position: relative; display:inline-block; z-index:100;">
				<a href="" class="active" style="padding-left: 40px;">Account</a>
				<a href="<?php echo site_url();?>Account/profile" style="padding-left: 40px;">Edit Profile</a>
			 	<a href="<?php echo site_url();?>User_Authentication/password_recovery" style="padding-left: 40px;">Change Password</a>
			  	<a href="" style="padding-left: 40px;">Friends</a>
			  	<a href="" style="padding-left: 40px;">Delete Account</a>
			</div>
			<div class="row" id="profile" style="margin-top: 20px; height:350px; position: relative;" >
				<div class="col s3" id="label" style="text-align: right">
					<ul>
						<li>Username</li>
						<li>First Name</li>
						<li>Last Name</li>
						<li>Email Address</li>
					</ul>
				</div>

				<?php echo form_open('Account/edit_account'); ?>

				<div class="col s5" style="margin-left: 10px; margin-top: 19px">
						<input id="username" name="username" autocomplete="off" value="<?php echo $this->session->userdata('username') ?>">
						<input id="first_name" name="first_name" autocomplete="off" value="<?php echo $this->session->userdata('first_name') ?>">
						<input id="last_name" name="last_name" autocomplete="off" value="<?php echo $this->session->userdata('last_name') ?>">
						<input id="email" name="email" autocomplete="off" value="<?php echo $this->session->userdata('email') ?>">
				</div>

				<div style="position: relative;">
		              	<input style="margin-left: 20px; margin-top: 30px" class="col s2 push-s3 btn waves-effect waves-light" type="submit" name="submit" value="Submit"></input>
		        </div>
		        <?php echo form_close(); ?>

			</div>
		</div>
	</div>
</body>

</html>