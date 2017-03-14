<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <html>
    <body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="/assets/js/materialize.min.js"></script>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Install Tables</span>
              <p>Which tables would you like to install?</p>
            </div>
            <div class="card-action">
              <a class="btn" onclick="Materialize.toast('Installed All Tables', 4000)"
                  href="<?php echo base_url();?>Setupdb/installAll">All</a>
              <a class="btn" onclick="Materialize.toast('Installed User Table', 4000)"
                  href="<?php echo base_url();?>Setupdb/installUser">User</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Drop Tables</span>
              <p>Which tables would you like to drop?</p>
            </div>
            <div class="card-action">
              <a class="btn" onclick="Materialize.toast('Dropped All Tables', 4000)"
                  href="<?php echo site_url();?>Setupdb/dropAll">All</a>
              <a class="btn" onclick="Materialize.toast('Dropped User Table', 4000)"
                  href="<?php echo base_url();?>Setupdb/dropUser">User</a>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>