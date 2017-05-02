<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<body>

		<!--<div class="row" style="max-width: 550px; position: relative;">
		        <div class="col s12 m12" style="margin-top: 100px;">
		          <div class="card z-depth-5" >
		            <div class="card-content black-text">
		              <span class="card-title"><h4>Welcome to Pinoram!</h4> <br>The website is still under development. Please feel free to use the available functions from the menu.</span>
		          </div>
		        </div>
		    </div>
		</div>-->

		<!-- Album Cards -->
		<div id="album-container" class="row " style="max-width: 80%; margin-top: 20px;">
		    <div id= "col1" class="col s12 l4" >

		    </div>

		    <div id= "col2" class="col s12 l4" >
		        
		    </div>

		    <div id= "col3" class="col s12 l4" >
		        
		    </div>
		</div>


		<?php if(isset($success))
		{
			echo $success;
		}	?>

    </body>


	<script src="/assets/js/greeting.js">
	    
    </script>


</html>
