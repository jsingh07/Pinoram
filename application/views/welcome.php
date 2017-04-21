<?php
$username = $this->session->userdata('username');
?>
	<div class="row" style="position: relative; margin-top: 2%; max-width: 300px; height: 300px;">
          <div class="card blue-grey darken-1 center">
            <div class="card-content white-text">
              <span class="card-title">WELCOME</span>
              <p><?php echo "Welcome, ".$username." to Pinoram!";?></p>
            </div>
          
        </div>
    </div>
