<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
   <head>
   <!-- LOGO : TITLE -->
      <title>Pinoram</title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>


      <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/assets/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>


      <div class="navbar-fixed">   
         <nav>
            <div class="nav-wrapper">
               <div class="row">
                  <div class="col s3 push-s1">
                     <a href="<?php echo base_url();?>" class="brand-logo">Pinoram</a>
                  </div>
                  <div class="col s7 push-s1 pull-s1">
                     <ul id="nav-mobile" class="right hide-on-xsmall-and-down">
                        <li><a href="<?php echo site_url();?>Setupdb">Set up Database</a></li>
                        <li><a href="<?php echo site_url();?>User_Authentication">Login</a></li>
                        <li><a href="<?php echo site_url();?>User_Authentication/user_registration">SignUp</a></li>
                     </ul>
                  </div>
               </div>   
            </div>
         </nav>

      </div>


   </head>
</html>