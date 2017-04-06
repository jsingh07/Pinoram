<html>
	<style>
		#home-background {
			background: url("<?php echo $this->config->item('base_url'); ?>/files/images/home.jpg");

			background-size: 100% 100%;
			height: 100%;
			background-repeat: no-repeat;
		}
	</style>

	<body>
		<div id="home-background" >
			<!--<img src="http://pyaici.com/files/images/home.jpg" />-->
			<!--<div class="row" style="width: 400px; position: relative;">
		        <div class="col s12 m12" style="margin-top: 100px;">
		          <div class="card z-depth-5" >
		            <div class="card-content black-text">
		              <span class="card-title">The site is under construction. Please come back later.</span>
		          </div>
		        </div>
		    </div>-->
		    <div >
		    <?php
		    if($this->session->userdata('logged_in') == TRUE)
		    {
		    	$this->view('project/map.php');
		    }
		    else
		    {
		    	$data['msg'] = "";
		    	$this->view('user_authentication/registration_form.php', $data);
		    }
		    ?>
		    </div>

		</div>


	</body>

			

</html>