<html>
	<style>
		#home-background {
			background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url("<?php echo $this->config->item('base_url'); ?>/files/static_images/home.jpg");

			background-size: 100% 100%;
			height: 100%;
			background-repeat: no-repeat;
			margin-top: -22px;
		}
	</style>

	<body>
		<div id="home-background"  >
			<?php echo $load ?>;

		</div>


	</body>

			

</html>
