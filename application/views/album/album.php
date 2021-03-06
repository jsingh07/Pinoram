<!DOCTYPE html>
<html>  
<body >

<!-- FAB button -->
<div class="fixed-action-btn">
    <a id="create_Album" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
</div>


<!-- Profile header -->

    <div class="row" style="margin-top: 20px">
        <div class="col s12 m8 offset-m2 l6 offset-l3" >
            <div class="card-content" style="border: none; margin: auto">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <?php if(file_exists('files/profile_images/'.$this->session->userdata('profile_pic').'.jpg')) {?>
                        <img src="/files/profile_images/<?php echo $this->session->userdata('profile_pic')?>.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php }else{ ?>
                        <img src="/files/static_images/default_profile.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php } ?>

                    </div>
                    <div class="col s7" >
                        <h3 style="font-weight: bold"><?php echo $this->session->userdata('username')?></h3>
                            <div id="bio">
                                <?php echo $this->session->userdata('bio'); ?>
                            </div>
                            
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>


<!-- Album Cards -->
<div id="album-container" class="row ">
    <input type = "hidden" id = "csrf" name = "<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
    <div id= "col1" class="col s12 l4" >

    </div>

    <div id= "col2" class="col s12 l4" >
        
    </div>

    <div id= "col3" class="col s12 l4" >
        
    </div>
</div>

<!--CREAT ALBUM MODAL-->    
<div id="create-Album-modal" class="modal modal-fixed-footer" style="min-height:500px;">

            <?php echo form_open('Album/create_Album'); ?>
            <div class="modal-content row">
                <h4 style="text-align: center">Create a New Album</h4>
                <hr/>
                <div style="margin-top: 20px; margin-left: 10px;">
                    <div class="input-field col s12">
                        <input type="text" id="Album_title" name="Album_title" class="validate"
                                value="">
                        <label for="Album_title"><strong>Title</strong></label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="Album_description" name="Album_description" data-length="500" style="min-height: 120px;" class="materialize-textarea"></textarea>
                        <label for="Album_description"><strong>Description</strong></label>
                    </div>
                    <div class="switch">
                        <label>
                            Private 
                            <input id="Album_access" name="Album_access" type="checkbox">
                            <span class="lever" for="Album_access"></span>
                            Public
                        </label>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <btn><input type="submit" name="Create" value="Create" class="modal-action modal-close waves-effect waves-green btn-flat "></input></btn>
                <btn class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</btn>
            </div>
            <?php echo form_close(); ?>

        </div>


</body>

    <script type="text/javascript" src="/assets/js/album.js"> 
    </script>
    
</html>
