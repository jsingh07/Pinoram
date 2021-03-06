<html>
<style>
#user-registration {
  transform: scale(0.9, 0.9);
  -ms-transform: scale(0.9, 0.9); /* IE 9 */
  -webkit-transform: scale(0.9, 0.9); /* Safari and Chrome */
  -o-transform: scale(0.9, 0.9); /* Opera */
  -moz-transform: scale(0.9, 0.9); /* Firefox */
}
</style>
	<body style="background-color: #eeeeee">
		<div class="row" id="user-registration">
			<div class="card z-depth-5 col s12">
				<div class="error_msg" style="position: relative; color: red; text-align: center">
					<?php echo validation_errors();?>
				</div>
				<div style="position: relative; margin-top: 10px; color: red; text-align:center;">
					<?php echo $msg ?>
				</div>
		        <div class="card-content">
		        	<span class="card-title">Login</span>
		        	<hr/>
		        	<?php echo form_open('Login'); ?>
		        	<div class="row" style="margin-top: 5%;">
				      	<div class="row">
				        	<div class="input-field col s12">
				          		<input type="text" id="username" name="username" class="validate"
				            			value="<?php echo set_value('username'); ?>">
				          		<label for="username">Username or Email</label>
				        	</div>
				        </div>
				      	<div class="row">
				        	<div class="input-field col s12">
				          		<input type="password" id="password" name="password" class="validate">
				          		<label for="password">Password</label>
				          		<div style="margin-top: 5px;">
				          		<a href="<?php echo base_url() ?>Login/password_recovery">Forgot Password</a>
		           				<a href="<?php echo base_url() ?>" class="right">Create an Account</a>
		           				</div>
				        	</div>
				      	</div>
					</div>
					<div style="margin-top: -20px; width: 100%; position: relative;" >
		              <button style="width:80%; margin-left:10%;" class="btn waves-effect waves-light" type="submit" name="submit">Sign In</button>
		            </div>
		        	<?php echo form_close(); ?>
				</div> 
			</div>
		</div>
	</body>
</html>