<html>
	<body>
		<?php
			if (isset($logout_message)) {
			echo "<div class='message'>";
			echo $logout_message;
			echo "</div>";
			}
		?>
		<?php
			if (isset($message_display)) {
			echo "<div class='message'>";
			echo $message_display;
			echo "</div>";
		}
		?>
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
		        	<?php echo form_open('User_Authentication/user_login'); ?>
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
				        	</div>
				      	</div>
					</div>
					<div style="margin-top: -20px; width: 100%; position: relative;" >
		              <input style="width:80%; margin-left:10%;" class="btn waves-effect waves-light" type="submit" name="submit" value="SignIn"></input>
		            </div>
		            <div style="margin-top: 20px;">
		           		<a href="<?php echo base_url() ?>User_Authentication/user_registration">To SignUp Click Here</a>
		           	</div>
		        	<?php echo form_close(); ?>
				</div> 
			</div>
		</div>
	</body>
</html>