<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
header("location: http://pyaici.com");
}
?>

<body>
	<div id="user-registration" class="card blue-grey darken-1 z-depth-5">
        <div class="card-content white-text">
        	<span class="card-title">Registration Form</span>
        	<hr/>
        	<div class="row" style="margin-top: 5%">
			    <form class="col s12">
			        <div class="row">
			        	<div class="input-field col s6">
			            	<input id="first_name" type="text" class="validate">
			            	<label for="first_name">First Name</label>
			        	</div>
				        <div class="input-field col s6">
				            <input id="last_name" type="text" class="validate">
				            <label for="last_name">Last Name</label>
				        </div>
			      	</div>
			      	<div class="row">
			        	<div class="input-field col s12">
			          		<input id="email" type="email" class="validate">
			          		<label for="email">Email</label>
			        	</div>
			      	</div>
			      	<div class="row">
			        	<div class="input-field col s12">
			          		<input id="password" type="password" class="validate">
			          		<label for="password">Password</label>
			        	</div>
			      	</div>
			    </form>
			</div>
			<button class="btn waves-effect waves-light" type="submit" name="action">Register</button>
		</div>
	</div>
</body>

</html>