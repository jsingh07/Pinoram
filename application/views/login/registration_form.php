<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
#user-registration {
  transform: scale(0.8, 0.8);
  -ms-transform: scale(0.8, 0.8); /* IE 9 */
  -webkit-transform: scale(0.8, 0.8); /* Safari and Chrome */
  -o-transform: scale(0.8, 0.8); /* Opera */
  -moz-transform: scale(0.8, 0.8); /* Firefox */
}
</style>
<html>
	<div class="row" id="user-registration" style="margin-top: 0px; font-size: .9em">
		<div class="card z-depth-5 col s12">
			<div class="error_msg" style="position: relative; color: red; text-align: center">
				<?php echo validation_errors();?>
			</div>
			<div style="position: relative; margin-top: 10px; color: black; text-align:center;">
				<?php echo $msg ?>
			</div>
	        <div class="card-content">
	        	<span class="card-title">Registration Form</span>
	        	<hr/>
	        	<?php echo form_open('Login/new_user_registration'); ?>
	        	<div class="row" style="margin-top: 5%;">
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
			            <a href="<?php echo base_url() ?>Login" class="left">Have an Account? Log In</a>
			        </div>
				</div>
				<div class="card-action">
	              <button style="width:80%; margin-left:10%;" class="btn waves-effect waves-light" type="submit" name="submit">Sign Up</button>
	            </div>
	        	<?php echo form_close(); ?>
			</div> 
		</div>
	</div>
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