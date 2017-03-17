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
		<div class = "row" style="width:100%; height:100%; margin-top:0px" id="main">
			<div class = "col s10" style="background-color: white; position:absolute; height: 25em; width:40%;left:50%;margin-left:-20%;margin-top:10%;"> 

				<h2>Login Form</h2>
				<?php echo form_open('user_authentication/user_login_process'); ?>
				<?php
					echo "<div class='error_msg'>";
					if (isset($error_message)) {
					echo $error_message;
					}
					echo validation_errors();
					echo "</div>";
				?>
				<div class="row" style="background-color: white;">
			        <div class="input-field col s6">
			          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
			          <label for="first_name">First Name</label>
			        </div>
			        <div class="input-field col s6">
			          <input id="last_name" type="text" class="validate">
			          <label for="last_name">Last Name</label>
			        </div>
			    </div>
				<input type="submit" value=" Login " name="submit"/><br />
				<a href="<?php echo base_url() ?>User_Authentication/user_registration">To SignUp Click Here</a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</body>
</html>