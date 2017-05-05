
<html>

<body >
	<div class="row" id="user-profile">
		<div class="card col s12" style="height: 450px;">
			<div class="vertical-menu left hide-on-small-and-down" style="margin-left:-11px; position: relative; display:inline-block; z-index:100;">
				<a href="<?php echo site_url();?>Account" style="padding-left: 40px;">Account</a>
				<!--<a href="<?php echo site_url();?>Account/profile" style="padding-left: 40px;">Edit Profile</a>-->
			 	<a href="<?php echo site_url();?>Login/password_recovery" style="padding-left: 40px;">Change Password</a>
			  	<a href="" class="active" style="padding-left: 40px;">Delete Account</a>
			</div>

			<div class="row hide-on-med-and-up">
	    		<div class="col s12">
					<ul class="tabs">
		        		<li class="tab col s3"><a target="_self" href="<?php echo site_url();?>Account">Account</a></li>
		        		<!--<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/profile">Edit<br>Profile</a></li>-->
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Login/password_recovery">Change<br>Password</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" class="active" href="">Delete<br>Account</a></li>
		      		</ul>
	      		</div>
      		</div>

			<div class="row center col s12 m8 l9" id="profile" style="display: inline-block;">
					<div style="position: relative; margin-top: 10px; color: red; text-align:center;">
						<?php echo $msg ?>
					</div>
			        	<span class="card-title">Delete Account</span>
			        	<hr/>
			        	<span>Please enter your current password.</span>
			        	<?php echo form_open($link); ?>
			        	<div class="row" style="margin-top: 5%; height: 100px">
			        		<div class="row">
					        	<div class="input-field col s12">
					          		<input type="password" id="password" name="password" class="validate"
					            			value="">
					          		<label for="password">Current Password</label>
					        	</div>
					        </div>
						</div>
						<div class="row" style="margin-top: -20px; width: 100%; position: relative;" >
			              <button style="width:80%; margin-left:10%;" class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
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