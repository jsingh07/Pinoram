<body>
	<div class="row" id="user-registration">
		<div class="card z-depth-5 col s12">
			<div class="error_msg" style="position: relative; color: red; text-align: center">
				<?php echo validation_errors();?>
			</div>
			<div style="position: relative; margin-top: 10px; color: black; text-align:center;">
				<?php echo $msg ?>
			</div>
	        <div class="card-content">
	        	<span class="card-title">Reset Password</span>
	        	<hr/>
	        	<?php echo form_open('User_Authentication/new_password'); ?>
	        	<div class="row" style="margin-top: 5%;">
			      	<div class="row">
			        	<div class="input-field col s12">
			          		<input type="password" id="password" name="new_password" class="validate"
			            			value="">
			          		<label for="password">New Password</label>
			        	</div>
			        	<div class="input-field col s12">
			          		<input type="password" id="password_conf" name="new_password_conf" class="validate"
			            			value="">
			          		<label for="password_conf">New Password Confirmation</label>
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
</body>