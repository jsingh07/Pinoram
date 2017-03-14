<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
  <html>
    <body>
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Install Tables</span>
              <p>Which tables would you like to install?</p>
            </div>
            <div class="card-action">
              <a href="<?php echo site_url();?>Setupdb/installAll">All</a>
              <a href="<?php echo base_url();?>Setupdb/installUser">User</a>
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
              <a href="<?php echo site_url();?>Setupdb/dropAll">All</a>
              <a href="<?php echo base_url();?>Setupdb/dropUser">User</a>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>