<body>
	<div class="row" id="user-registration">
		<div class="card z-depth-5 col s12">
			<div style="position: relative; margin-top: 10px; color: red; text-align:center;">
				<?php echo $msg ?>
			</div>
	        <div class="card-content">
	        	<span class="card-title">Please enter your current password.</span>
	        	<hr/>
	        	<?php echo form_open('User_Authentication/password_conf'); ?>
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
</body>