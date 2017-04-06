<html>
<style>
#home-background {
	background: url("<?php echo $this->config->item('base_url'); ?>/files/images/home.jpg");

	background-size: 100% 100%;
	height: 100%;
	background-repeat: no-repeat;
}

.carousel img{
	height: 80%;
}
</style>
	<body id="home-background">
		<div class="row" id="project_pictures" style="max-width: 800px; margin-top:20px">
			<div class="card z-depth-5 col s12">

		        <div class="card-content">
		        	<span class="card-title">Select Pictures</span>
		        	<hr/>

		        	<div class="carousel">
		        		<?php echo'
		        		<a class="carousel-item" href="#one!"><img src="https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-497846.jpg"></a>'
    					?>
					</div>

		        	<?php echo form_open_multipart('Project/upload_picture'); ?>
		        		<input type="hidden" name="project_id" id="project_id" value="<?php $project_id ?>" />
					    <div class="file-field input-field">
					      <div class="btn">
					        <span>Upload</span>
					        <input type="file" multiple name="picture_upload">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text" placeholder="Upload one or more Pictures" style="max-width: 550px;">
					      </div>
					      <input class="btn right" type="submit" value="submit">
					    </div>
					<?php echo form_close(); ?>
		        	
				</div> 
			</div>
		</div>
	</body>
	<script>
	 $(document).ready(function(){
      $('.carousel').carousel();
    });
	</script>
</html>