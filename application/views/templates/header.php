<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
   <head>
   <!-- LOGO : TITLE -->
      <title>Pinoram</title>

      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>


      <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="/assets/css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script> 
      <script type="text/javascript" src="/assets/js/materialize.min.js"></script>

      <?php $username = $this->session->userdata('username');?>

      <?php if($this->session->userdata('logged_in') == TRUE) {?>
         <div class="navbar-fixed z-depth-5">   
            <nav>
               <div class="nav-wrapper">
                  <div class="row">
                     <div class="col s3 push-s1">
                        <a href="<?php echo base_url();?>" class="brand-logo">Pinoram</a>
                     </div>
                     <div class="col s7 push-s1 pull-s1">
                        <ul id="nav-mobile" class="right hide-on-small-and-down">
                           <li><a><?php echo $username?></a></li>
                           <?php if($this->session->userdata('role') == 'super-user') {?>
                           <li><a href="<?php echo site_url();?>Setupdb">Make Admin</a></li>
                           <?php } ?>
                           <?php if(($this->session->userdata('role') == 'admin') or ($this->session->userdata('role') == 'super-user')) {?>
                           <li><a href="<?php echo site_url();?>Setupdb">Set up Database</a></li>
                           <?php } ?>
                           <li data-activates="slide-out" class="button-collapse" style="cursor: pointer; cursor:hand;">About Us</li>
                           <li><a href="<?php echo site_url();?>User_Authentication/user_logout">Logout</a></li>
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
                           <li data-activates="slide-out" class="button-collapse" style="cursor: pointer; cursor:hand;">About Us</li>
                           <li><a href="<?php echo site_url();?>User_Authentication">Login</a></li>
                           <li><a href="<?php echo site_url();?>User_Authentication/user_registration">SignUp</a></li>
			</ul>
                     </div>
                  </div>   
               </div>
            </nav>
         </div>
      <?php }?>

        <ul id="slide-out" class="side-nav">
        <div>
        <li id="closetab" data-activates="slide-out" >Close</li>
        </div>
    <li><div class="userView">
      <div class="background">
        
      </div>
      <a href="#!name"><span class="white-text name">John Doe</span></a>
      <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
 
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>

   <script>

   $(function(){

      $(".button-collapse").sideNav();
   });

   $(function(){

      $("#closetab").on('click', function()
      //{ $("#slide0out").sideNav('hide')});
      {
         $.get('getview', function(data) {
            $('.userView').html(data);
         });
      });

   });

  </script>


   </head>
</html>
