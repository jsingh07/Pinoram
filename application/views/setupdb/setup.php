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
              <a class="btn" onclick="PopToast('Installed All Tables','Setupdb/installAll')">All</a>
              <a class="btn" onclick="PopToast('Installed User Table','Setupdb/installUser')">User</a>
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
              <a class="btn" onclick="PopToast('Dropped All Tables','Setupdb/dropAll')">All</a>
              <a class="btn" onclick="PopToast('Dropped User Table','Setupdb/dropUser')">User</a>
            </div>
          </div>
        </div>
      </div>
      <script>
        function PopToast(txt,link)
        {
          Materialize.toast(txt, 3000,'', function(){window.location.href = "<?php echo base_url()?>"+link;});
        }
      </script>
      <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
      <script type="text/javascript" src="/assets/js/materialize.js"></script>
    </body>
  </html>