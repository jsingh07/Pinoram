<!DOCTYPE html>
<html>  
<body >

<style>
.collapsible {
  border-top: 0px solid #ddd;
  border-right: 0px solid #ddd;
  border-left: 0px solid #ddd;
  margin: 0;
}
</style>

<!-- Profile header -->

    <div id ="hidden-album-id" data-id= "<?php echo $user_id; ?>" >
    </div>

    <div class="row" style="margin-top: 20px">
        <div class="col s12 m8 offset-m2 l6 offset-l3" >
            <div class="card-content" style="border: none; margin: auto">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <?php if(file_exists('files/profile_images/'.$user_id.'.jpg')) {?>
                        <img src="/files/profile_images/<?php echo $user_id; ?>.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php }else{ ?>
                        <img src="/files/static_images/default_profile.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php } ?>

                    </div>
                    <div class="col s8" >
                        <h3 style="font-weight: bold"><?php echo $username; ?></h3>
                        <!--<div id="bio">
                            <h5><?php echo $bio; ?></h5>
                        </div>-->
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>


<!-- Album Cards -->
<div id="album-container" class="row " style="max-width: 80%; margin-top: 20px;">
    <input type = "hidden" id = "csrf" name = "<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
    <div id= "col1" class="col s12 l4" >

    </div>

    <div id= "col2" class="col s12 l4" >
        
    </div>

    <div id= "col3" class="col s12 l4" >
        
    </div>
</div>



</body>
    <script type="text/javascript" src="/assets/js/public_album.js"> 
    </script>

</html>