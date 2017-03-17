<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<html>

<?php
	if (isset($this->session->userdata['logged_in'])) {
	header("location: http://pyaici.com");
	}
?>

<body>
	<div class="row" id="user-registration">
		<div class="card darken-1 z-depth-5 col s12" >
			<div class="error_msg" style="position: relative; color: red; text-align: center">
				<?php echo validation_errors();?>
			</div>
			<?php echo $msg ?>

	        <div class="card-content white-text">
	        	<span class="card-title">Registration Form</span>
	        	<hr/>
	        	<?php echo form_open('User_Authentication/new_user_registration'); ?>
	        	<div class="row" style="margin-top: 5%">
			        <div class="row">
			        	<div class="input-field col s6">
			            	<input type="text" id="first_name" name="first_name" class="validate"
			            			value="<?php echo set_value('first_name'); ?>">
			            	<label for="first_name">First Name</label>
			        	</div>
				        <div class="input-field col s6">
				        	<input type="text" id="last_name" name="last_name" class="validate"
			            			value="<?php echo set_value('last_name'); ?>">
				            <label for="last_name">Last Name</label>
				        </div>
			      	</div>
			      	<div class="row">
			        	<div class="input-field col s12">
			          		<input type="text" id="username" name="username" class="validate"
			            			value="<?php echo set_value('username'); ?>">
			          		<label for="username">Username</label>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="input-field col s12">
			          		<input type="email" id="email" name="email" class="validate"
			            			value="<?php echo set_value('email'); ?>">
			          		<label for="email">Email</label>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="input-field col s12">
			          		<input type="password" id="password" name="password" class="validate">
			          		<label for="password">Password</label>
			        	</div>
			      	</div>
			      	<div class="row">
				      	<div class="input-field col s12">
			                <input type="password" id="passwordconf" name="passwordconf">
			                <label style="width: 100%" for="passwordconf" data-error="Password does not match" data-success="Password Match">Password (Confirm)</label>
			            </div>
			        </div>
				</div>
				<div class="card-action">
	              <input class="btn waves-effect waves-light" type="submit" name="submit">Register</input>
	            </div>
	        	<?php echo form_close(); ?>
			</div> 
		</div>
	</div>
</body>
<script>
	$("#password").on("focusout", function (e) {
	    if ($(this).val() != $("#passwordconf").val()) {
	        $("#passwordconf").removeClass("valid").addClass("invalid");
	    } else {
	        $("#passwordconf").removeClass("invalid").addClass("valid");
	    }
	});

	$("#passwordconf").on("keyup", function (e) 
	{
	    if ($("#password").val() != $(this).val()) {
	        $(this).removeClass("valid").addClass("invalid");
	    } else {
	        $(this).removeClass("invalid").addClass("valid");
	    }
	});
</script>

</html>