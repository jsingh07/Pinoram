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
              <a class="btn" href="<?php echo base_url()?>Setupdb/installAll">All</a>
              <a class="btn" href="<?php echo base_url()?>Setupdb/installUser">User</a>
              <a class="btn" href="<?php echo base_url()?>Setupdb/installToken">Token</a>
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
              <a class="btn" href="<?php echo base_url()?>Setupdb/dropAll">All</a>
              <a class="btn" href="<?php echo base_url()?>Setupdb/dropUser">User</a>
              <a class="btn" href="<?php echo base_url()?>Setupdb/dropToken">Token</a>
              <!--<a class="btn" onclick="PopToast('Dropped All Tables','Setupdb/dropAll')">All</a>
              <a class="btn" onclick="PopToast('Dropped User Table','Setupdb/dropUser')">User</a>-->
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Show Content</span>
              <p>Which tables would you like to show content from?</p>
            </div>
            <div class="card-action">
              <a class="btn" href="<?php echo base_url()?>Setupdb/showUser">User</a>
              <a class="btn" href="<?php echo base_url()?>Setupdb/showToken">Token</a>
            </div>
          </div>
        </div>
        <div class="col s6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Make Admin</span>
              <p>Who would you like to promote to admin?</p>
            </div>
            <div class="card-action">
              <a class="btn" href="<?php echo base_url()?>Setupdb/showAdmin">User</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Add Content</span>
              <p>Which tables would you like to add content to?</p>
            </div>
            <div class="card-action">
              <a class="btn" href="<?php echo base_url()?>Setupdb/addContent_User">User</a>
              <a class="btn" href="<?php echo base_url()?>Setupdb/addContent_Token">Token</a>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Drop Content</span>
              <p>Which tables would you like to drop content from?</p>
            </div>
            <div class="card-action">
              <a class="btn" href="<?php echo base_url()?>Setupdb/dropContent_User">User</a>
              <a class="btn" href="<?php echo base_url()?>Setupdb/dropContent_Token">Token</a>
            </div>
          </div>
        </div>
      </div>

      <!--<script>
        function PopToast(txt,link)
        {
          Materialize.toast(txt, 3000,'', function(){window.location.href = "<?php echo base_url()?>"+link;});
        }
      </script>
      <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="/assets/js/materialize.js"></script>-->
    </body>
  </html>