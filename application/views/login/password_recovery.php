<body>
		<div class="row" id="user-registration">
			<div class="card col s12">
				<div style="position: relative; margin-top: 10px; color: black; text-align:center;">
					<?php echo $msg ?>
				</div>
		        <div class="card-content">
		        	<span class="card-title">Password Recovery</span>
		        	<hr/>
		        	<?php echo form_open('Login/password_recovery_email'); ?>
		        	<div class="row" style="margin-top: 5%;">
				      	<div class="row">
				        	<div class="input-field col s12">
				          		<input type="email" id="email" name="email" class="validate"
				            			value="<?php echo set_value('email'); ?>">
				          		<label for="email">Email</label>
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