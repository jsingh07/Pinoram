<html>

<body >
	<div class="row" id="user-profile" style=" position: relative; margin-top: 3%; max-width: 800px; width: 100%; height: 450px;">
		<div class="card z-depth-5 col s12" style="height: 450px;">
			<div class="vertical-menu left hide-on-small-and-down" style="margin-left:-20px; position: relative; display:inline-block; z-index:100;">
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
				<div class="col s4 m3" id="account-label" style="text-align: right">
					<ul>
						<li>Username</li>
						<li>First Name</li>
						<li>Last Name</li>
						<li>Email</li>
					</ul>
				</div>

				<?php echo form_open('Account/edit_account'); ?>

				<div class="col s7 m5" style="margin-left: 10px; margin-top: 19px">
						<input id="username" name="username" autocomplete="off" value="<?php echo $this->session->userdata('username') ?>">
						<input id="first_name" name="first_name" autocomplete="off" value="<?php echo $this->session->userdata('first_name') ?>">
						<input id="last_name" name="last_name" autocomplete="off" value="<?php echo $this->session->userdata('last_name') ?>">
						<input id="email" name="email" autocomplete="off" value="<?php echo $this->session->userdata('email') ?>">
				</div>

				<div style="position: relative;">
		              	<input style="margin-left: 20px; margin-top: 40px" class="col s4 m2 push-l3 btn waves-effect waves-light" type="submit" name="submit" value="Submit"></input>
		        </div>
		        <?php echo form_close(); ?>

			</div>
		</div>
	</div>
</body>

<script>
	 $(document).ready(function(){
    $('ul.tabs').tabs();
  });
      
</script>

</html>