<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>
	<body>

		<div class="row white-text" style="height: 100%; padding-top: 20%; max-width: 1000px; position: relative; background: transparent;">
              <h4 class="center z-depth-5" style="font-size: 5em; font-weight: 900">MEMORIES ON A MAP</h4> <br>
              <h5 class="center z-depth-5" style="font-size: 3em; font-weight: 750">Create an album and upload your pictures to get started. Check out the public albums below!</h5>
		</div>

		<!-- Album Cards -->
		<div id="album-container" class="row " style="max-width: 80%;">
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
