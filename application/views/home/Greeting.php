<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<body>

		<!--<div class="row"">
			<nav>
				<div class="nav-wrapper" style="background-color: white;">
                    <ul>
						<li class="col s3"><a href="<?php echo base_url()?>Album/Album" style="text-align: center">Album</a></li>
						<li class="col s3"><a href="#create-Album-modal" style="text-align: center; line-height:20px; padding-top:12px; padding-bottom: 12px">Create<br>Album</a></li>
						<li class="col s3"><a href="<?php echo base_url()?>Album/Picture" style="text-align: center">Pictures</a></li>
						<li class="col s3"><a href="<?php echo base_url()?>Album/test" style="text-align: center">Test</a></li>
					</ul>
				</div>
			</nav>
		</div>-->
      		<!--<div class="row hide-on-medium-and-up" id="map" style="position: fixed;width:50%; height:50%"></div>-->
		

		<div class="row" style="max-width: 550px; position: relative;">
		        <div class="col s12 m12" style="margin-top: 100px;">
		          <div class="card z-depth-5" >
		            <div class="card-content black-text">
		              <span class="card-title"><h4>Welcome to Pinoram!</h4> <br>The website is still under development. Please feel free to use the available functions from the menu.</span>
		          </div>
		        </div>
		    </div>

		<div id="create-Album-modal" class="modal modal-fixed-footer" style="min-height:500px;">

			<?php echo form_open('Album/create_Album'); ?>
		    <div class="modal-content row">
				<h4 style="text-align: center">Create a New Album</h4>
				<hr/>
				<div style="margin-top: 20px; margin-left: 10px;">
					<div class="input-field col s12">
		          		<input type="text" id="Album_title" name="Album_title" class="validate"
		            			value="">
		          		<label for="Album_title"><strong>Title</strong></label>
		        	</div>
		        	<div class="input-field col s12">
			          	<textarea id="Album_description" name="Album_description" data-length="500" style="min-height: 120px;" class="materialize-textarea"></textarea>
			          	<label for="Album_description"><strong>Description</strong></label>
			        </div>
			        <div class="switch">
					    <label>
					      	Private 
					      	<input id="Album_access" name="Album_access" type="checkbox">
					      	<span class="lever" for="Album_access"></span>
					      	Public
					    </label>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<btn><input type="submit" name="Create" value="Create" class="modal-action modal-close waves-effect waves-green btn-flat "></input></btn>
		      	<btn class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</btn>
		    </div>
		    <?php echo form_close(); ?>

		</div>

		<?php if(isset($success))
		{
			echo $success;
		}	?>

    </body>


	<script>
		$(document).ready(function(){
		    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
		    $('.modal').modal();
		  });
	</script>


</html>
