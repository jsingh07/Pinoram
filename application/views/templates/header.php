<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
   <head>
   <!-- LOGO : TITLE -->
      <title>Pinoram</title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>


      <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/assets/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/assets/css/vertical.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script> 
      <script type="text/javascript" src="/assets/js/materialize.min.js"></script>

      <?php $username = $this->session->userdata('username');?>

      <?php if($this->session->userdata('logged_in') == TRUE) {?>
         <div class="navbar-fixed z-depth-5">   
            <nav >
               <div class="nav-wrapper">
                  <div class="row">
                     <div class="col s3 push-s1">
                        <a href="<?php echo base_url();?>" class="brand-logo">Pinoram</a>
                     </div>
                     <div class="col s7 push-s1">
                     
                        <ul id="nav-mobile" class="right hide-on-small-and-down">
                           <li><a href="<?php echo site_url();?>Account"><?php echo $username?></a></li>
                           <li><a href="<?php echo site_url();?>Map">Map</a></li>
                           <?php if(($this->session->userdata('role') == 'admin') or ($this->session->userdata('role') == 'super-user')) {?>
                           <li><a href="<?php echo site_url();?>Setupdb">Database</a></li>
                           <?php } ?>
                           <li data-activates="slide-out" class="button-collapse" style="margin: auto; cursor: pointer; cursor:hand;"><a>About</a></li>
                           <li><a href="<?php echo site_url();?>User_Authentication/user_logout">Logout</a></li>
                        </ul>

                        <ul id="nav-mobile" class="right hide-on-med-and-up">
                           <li><a style="position: relative" class="dropdown-button" href="" data-activates="dropdown1"><i class="material-icons right">menu</i></a></li>
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
                        <a href="<?php echo base_url();?>" class="brand-logo">Pinoram</a>
                     </div>
                     <div class="col s7 push-s1 pull-s1">
                        <ul id="nav-mobile" class="right hide-on-small-and-down">
                           <li data-activates="slide-out" class="button-collapse" style="margin: auto; cursor: pointer; cursor:hand;"><a>About</a></li>
                           <li><a href="<?php echo site_url();?>User_Authentication">Login</a></li>
                           <li><a href="<?php echo site_url();?>User_Authentication/user_registration">Sign Up</a></li>
			               </ul>
                        <ul id="nav-mobile" class="right hide-on-med-and-up">
                           <li><a style="position: relative" class="dropdown-button" href="" data-activates="dropdown2"><i class="material-icons right">menu</i></a></li>
                        </ul>
                     </div>
                  </div>   
               </div>
            </nav>
         </div>
      <?php }?>
                     
      <div>
      <ul id="slide-out" class="side-nav">
         <div class="userView">
            <h4 class="center">
               Pinoram
            </h4><hr/>
            <p>
               Pinoram is a web application that allows users to upload pictures and videos to be displayed on a map where the content is taken at. It is intended to provide users with a visual of where they have been and what memory is associated with the location. The application is currently under development.
            </p><hr/>
               <h5 style="margin-top: 50px; margin-bottom: 20px;"">Ron (Pyai) Hein</h5>
               <img style="box-shadow: 8px 8px 10px #aaa;" src="<?php echo base_url();?>/files/images/3.jpg" height="200" width="250">
               <p>
                  I am a graduate from UC Davis with a Bachelor's Degree in Computer Science. I am creating this site as a way to teach myself Web Development from setting up a domain and a server to design and implementation on both front-end and backend structures.<br><br><hr/>
                  Email: pyai.hein@gmail.com<br>
                  Location: San Jose, California<br>
                  LinkedIn: "https://www.linkedin.com/in/ron-hein-015012111/"<br>
               </p>
            
         </div>
      </ul>
      </div>

      <?php if($this->session->userdata('logged_in') == TRUE) {?>
         <ul id="dropdown1" class="dropdown-content">
            <li><a href="<?php echo site_url();?>Account"><?php echo $username?></a></li>
            <li><a href="<?php echo site_url();?>Map">Map</a></li>
            <?php if(($this->session->userdata('role') == 'admin') or ($this->session->userdata('role') == 'super-user')) {?>
            <li><a href="<?php echo site_url();?>Setupdb">Set up Database</a></li>
            <?php } ?>
            <li data-activates="slide-out" class="button-collapse" style="margin: auto; cursor: pointer; cursor:hand;"><a>About</a></li>
            <li><a href="<?php echo site_url();?>User_Authentication/user_logout">Logout</a></li>
         </ul>
      <?php } 

      else{ ?>
         <ul id="dropdown2" class="dropdown-content">
            <li style="position: relative; margin: auto;"data-activates="slide-out" class="button-collapse" style="cursor: pointer; cursor:hand;"><a>About</a></li>
            <li><a href="<?php echo site_url();?>User_Authentication">Login</a></li>
            <li><a href="<?php echo site_url();?>User_Authentication/user_registration">Sign Up</a></li>
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
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );

   /*$(function(){

      $("#closetab").on('click', function()
      //{ $("#slide0out").sideNav('hide')});
      /*{
         $.get('getview', function(data) {
            $('.userView').html(data);
         });
      });
   
   });*/

  </script>


   </head>
</html>
