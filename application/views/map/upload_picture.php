<html>
<style>
#picture-card {
	width: 300px;
	height: 400px;
	overflow: hidden;
	text-align: center;
}
#picture-card img{
	max-width: 300px;
	min-height: 300px;
	max-height: 300px;
	margin:0 -50%;
  	position: absolute;
}



</style>
	<div class="row"">
			<nav>
				<div class="nav-wrapper" style="background-color: white;">
                    <ul>
						<li class="col s3"><a href="" style="text-align: center">Projects</a></li>
						<li class="col s3"><a href="#create-project-modal" style="text-align: center; line-height:20px; padding-top:12px; padding-bottom: 12px">Create<br>Project</a></li>
						<li class="col s3 active"><a href="<?php echo base_url()?>Project/Picture" style="text-align: center">Pictures</a></li>
						<li class="col s3"><a href="" style="text-align: center">Videos</a></li>
					</ul>
				</div>
			</nav>
	</div>


		<div class="row" id="project_pictures" style="max-width: 800px; margin-top:20px">
			<div class="card z-depth-5 col s12">
				<?php echo form_open_multipart('Project/upload_picture'); ?>
					<div class="card-content" id="picture_card">
					<input type="hidden" name="project_id" id="project_id" value="<?php $project_id ?>" />
				    <div class="file-field input-field">
				      <div class="btn">
				        <span>Upload</span>
				        <input type="file" multiple name="picture_upload" accept="image/*" onchange="this.form.submit()" id="picture_upload" onchange="previewFile()">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text" placeholder="Select a picture to upload" style="max-width: 550px;">
				      </div>
				    </div>
				    </div>
				<?php echo form_close(); ?>
			</div>
		</div>

		<div class="row" style="max-width: 800px;">
		 	<div class="card z-depth-5 col s12" style="height: 600px">
		 		<span class="card-title"><h5>All</h5></span>
		 		<hr/>
		 		<div class="carousel" style="height: 500px;">
		        	<?php foreach ($files->result() as $files){ ?>
		        		<div id="picture-card" class="card z-depth-5 carousel-item row">
				        	<a href="#pictureModal" class="myImg col s12" data-id='["<?php echo $files->description; ?>","<?php echo $files->lat; ?>", "<?php echo $files->lng; ?>", "<?php echo $files->picture_id; ?>", "<?php echo base_url('files/images/'. $files->picture_id.'.jpg');?>"]'>
				        		<img src="<?php echo base_url('files/images/'. $files->picture_id.'.jpg');?>">
				        	</a>

				        	<div class="row" style="position: relative; margin-top: 290px; margin-left: 5px; margin-right: 5px;">
				        		<p class="left" style="text-align: left"><?php echo $files->description; ?><p>
				        	</div>
				        </div>
					<?php } ?>
				</div>
			</div>
	    </div>

   	</div>

    <div id="pictureModal" class="modal modal-fixed-footer modal-fixed-header" style="height:600px;">

		<?php echo form_open('project/edit_picture_info'); ?>

	    <div class="modal-content row">
	    	<input type="hidden" id="picture_id" name="picture_id"></input>

	    	<h4 style="text-align: center">Picture Information</h4>
			<hr/>

			<img class="modalPic center" id="modalPic" style="height:auto; width:100%">

			<div style="position: relative; margin-top: 20px; margin-left: 10px; height:300px">
				<div class="input-field col s6">
					<strong>Latitude</strong>
	          		<input type="text" id="Latitude" name="Latitude" class="validate">
	        	</div>

	        	<div class="input-field col s6">
	        		<strong>Longitude</strong>
	          		<input type="text" id="Longitude" name="Longitude" class="validate">
	        	</div>

	        	<div class="input-field col s12">
	        		<strong>Description</strong>
		          	<textarea id="picture_description" name="picture_description" data-length="500" style="min-height: 120px;" class="materialize-textarea active"></textarea>
		          	
		        </div>
			</div>
		</div>


		<div class="modal-footer">
			<btn><input type="submit" name="Submit" value="Submit" class="modal-action modal-close waves-effect waves-green btn-flat "></input></btn>
		<?php echo form_close(); ?>
	      	<btn class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</btn>

	    <?php echo form_open('project/deletePicture'); ?>
	    	<input type="hidden" id="delete_pic" name="delete_pic"></input>
	      	<btn><input style="color:red" type="submit" name="Submit" value="Delete" class="modal-action modal-close waves-effect waves-green btn-flat "></input></btn>
	    <?php echo form_close(); ?>

	    </div>


	</div>



  	<script>
  		$(document).ready(function(){
	      $('.carousel').carousel({noWrap: true});

	    });

	    $(document).ready(function(){
			$('.myImg').click(function() {
		        var picData = $(this).data('id');
		        var piclink = '<?php echo base_url('Project/deletePicture/1')?>';
		        var delbutton = document.getElementById('delete_pic');

		        $(".modal-content #picture_description").val( picData[0] );
		        $(".modal-content #Latitude").val( picData[1] );
		        $(".modal-content #Longitude").val( picData[2] );
		        $(".modal-content #picture_id").val( picData[3] );
		        $(".modal-footer #delete_pic").val( picData[3] );
		        $('.modalPic').attr('src', picData[4]);
		        delbutton.href = piclink;
		        $('.modal').modal();
		     });
		});



  	</script>

</html>