<html>
	<style>
		#home-background {
			background: url("<?php echo $this->config->item('base_url'); ?>/files/static_images/home.jpg");

			background-size: 100% 100%;
			height: 100%;
			background-repeat: no-repeat;
		}
	</style>

	<body>
		<div <?php if($this->session->userdata('logged_in') != TRUE){ ?> 
						id="home-background" <?php } ?> >
			<?php echo $load ?>;

		</div>


	</body>

			

</html>
