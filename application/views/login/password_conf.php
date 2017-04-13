
<html>

<body >
	<div class="row" id="user-profile" style=" position: relative; margin-top: 3%; max-width: 800px; height: 450px;">
		<div class="card z-depth-5 col s12" style="height: 450px;">
			<div class="vertical-menu left hide-on-small-and-down" style="margin-left:-11px; position: relative; display:inline-block; z-index:100;">
				<a href="<?php echo site_url();?>Account" style="padding-left: 40px;">Account</a>
				<a href="<?php echo site_url();?>Account/profile" style="padding-left: 40px;">Edit Profile</a>
			 	<a href="" class="active" style="padding-left: 40px;">Change Password</a>
			  	<a href="<?php echo site_url();?>Account/delete_account" style="padding-left: 40px;">Delete Account</a>
			</div>

			<div class="row hide-on-med-and-up">
	    		<div class="col s12">
					<ul class="tabs">
		        		<li class="tab col s3"><a target="_self" href="<?php echo site_url();?>Account">Account</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/profile">Edit<br>Profile</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" class="active" target="_self" href="">Change<br>Password</a></li>
		        		<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/delete_account">Delete<br>Account</a></li>
		      		</ul>
	      		</div>
      		</div>

			<div class="row" id="profile">
				<div class="card z-depth-5 col s10 m7" style="max-width: 450px; margin-left: 5%; margin-top: 5%">
					<div style="position: relative; margin-top: 10px; color: red; text-align:center;">
						<?php echo $msg ?>
					</div>
			        <div class="card-content">
			        	<span class="card-title">Change Password</span>
			        	<hr/>
			        	<span>Please enter your current password.</span>
			        	<?php echo form_open($link); ?>
			        	<div class="row" style="margin-top: 5%;">
			        		<div class="row">
					        	<div class="input-field col s12">
					          		<input type="password" id="password" name="password" class="validate"
					            			value="">
					          		<label for="password">Current Password</label>
					        	</div>
					        </div>
						</div>
						<div style="margin-top: -20px; width: 100%; position: relative;" >
			              <input style="width:80%; margin-left:10%;" class="btn waves-effect waves-light" type="submit" name="submit" value="Submit"></input>
			            </div>
			        	<?php echo form_close(); ?>
					</div> 
				</div>
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