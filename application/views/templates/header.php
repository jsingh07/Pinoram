<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

   <head>
   <!-- LOGO : TITLE -->
      <title>Pinoram</title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

      <link href="/assets/css/croppie.css" type="text/css" rel="stylesheet"/>
      <link href="/assets/css/packery-docs.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/assets/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/assets/css/vertical.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script> 
      <script type="text/javascript" src="/assets/js/materialize.min.js"></script>
      <script src="/assets/js/packery-docs.min.js"></script>
      <script src="/assets/js/croppie.js"></script>
      <script type="text/javascript" src="/assets/js/exif.js"></script>


      <?php $username = $this->session->userdata('username');?>

      <?php if($this->session->userdata('logged_in') == TRUE) {?>
         <div class="navbar-fixed z-depth-5">   
            <nav >
               <div class="nav-wrapper">
                  <div class="row">
                     <div class="col s3 push-s1">
                        <a href="<?php echo base_url();?>" class="brand-logo left"><h4>Pinoram</h4></a>
                     </div>
                     <div class="col s7 push-s1">
                     
                        <ul id="nav-mobile" class="right hide-on-small-and-down" style="margin-right: -30px">
                           <li><a href="<?php echo site_url();?>Account"><?php echo $username?></a></li>
                           <li><a href="<?php echo base_url()?>Album">Album</a></li>
                           <li><a href="<?php echo base_url()?>Album/map">Map</a></li>
                           <?php if(($this->session->userdata('role') == 'admin') or ($this->session->userdata('role') == 'super-user')) {?>
                           <li><a href="<?php echo site_url();?>Setupdb">Database</a></li>
                           <?php } ?>
                           <li><a href="<?php echo site_url();?>Welcome/about_us">About</a></li>
                           <li><a href="<?php echo site_url();?>Login/user_logout">Logout</a></li>
                        </ul>

                        <ul id="nav-mobile" class="right hide-on-med-and-up">
                           <li><a style="position: relative; margin-right: -20px" class="dropdown-button" data-activates="dropdown1"><i class="material-icons right">menu</i></a></li>
                        </ul>
                     </div>
                  </div>   
               </div>
            </nav>
         </div>
      <?php } 

      else{ ?>
         <div class="navbar-fixed">   
            <nav>
               <div class="nav-wrapper">
                  <div class="row">
                     <div class="col s3 push-s1">
                        <a href="<?php echo base_url();?>" class="brand-logo left"><h4>Pinoram</h4></a>
                     </div>
                     <div class="col s7 push-s1 pull-s1">
                        <ul id="nav-mobile" class="right hide-on-small-and-down" style="margin-right: -20px">
                           <li style="margin: auto; cursor: pointer; cursor:hand;"><a href="<?php echo site_url();?>Welcome/about_us">About</a></li>
                           <li><a href="<?php echo site_url();?>Login">Login</a></li>
			               </ul>
                        <ul id="nav-mobile" class="right hide-on-med-and-up">
                           <li><a style="position: relative; margin-right: -20px" class="dropdown-button" data-activates="dropdown2"><i class="material-icons right">menu</i></a></li>
                        </ul>
                     </div>
                  </div>   
               </div>
            </nav>
         </div>
      <?php }?>
                     

      <?php if($this->session->userdata('logged_in') == TRUE) {?>
         <ul id="dropdown1" class="dropdown-content">
            <li><a href="<?php echo site_url();?>Account"><?php echo $username?></a></li>
            <li><a href="<?php echo base_url()?>Album">Album</a></li>
            <li><a href="<?php echo base_url()?>Album/Album">Map</a></li>
            <?php if(($this->session->userdata('role') == 'admin') or ($this->session->userdata('role') == 'super-user')) {?>
            <li><a href="<?php echo site_url();?>Setupdb">Set up Database</a></li>
            <?php } ?>
            <li style="margin: auto; cursor: pointer; cursor:hand;"><a href="<?php echo site_url();?>Welcome/about_us">About</a></li>
            <li><a href="<?php echo site_url();?>Login/user_logout">Logout</a></li>
         </ul>
      <?php } 

      else{ ?>
         <ul id="dropdown2" class="dropdown-content">
            <li style="position: relative; margin: auto;" style="cursor: pointer; cursor:hand;"><a href="<?php echo site_url();?>Welcome/about_us">About</a></li>
            <li><a href="<?php echo site_url();?>Login">Login</a></li>
         </ul>
      <?php } ?> 

   <script>

   $(function(){

      $(".button-collapse").sideNav();
   });

   $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'right', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );

  </script>


   </head>
</html>
