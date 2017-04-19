<!DOCTYPE html>
<html>  
    <body>
    <!--<div>
        <img id="demo-basic" src="/files/images/6.jpg"/>
            <button id="submitbutton" class="waves-effect waves-light btn-large">Submit</button>
        </div>
        <div id="test" class="circle">
            
    </div>-->
<!-- FAB button -->
<div class="fixed-action-btn">
    <a id="create_project" class="btn-floating waves-effect waves-light red"><i class="material-icons">add</i></a>
</div>


<!-- Profile header -->

    <div class="row" style="margin-top: 20px">
        <div class="col s12 m8 offset-m2 l6 offset-l3" >
            <div class="card-content" style="border: none; margin: auto">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <?php if(file_exists('files/profile_images/'.$this->session->userdata('user_id').'.jpg')) {?>
                        <img src="/files/profile_images/<?php echo $this->session->userdata('user_id')?>.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php }else{ ?>
                        <img src="/files/profile_images/default.jpg" class="circle responsive-img" style="margin-top: 20px">   
                        <?php } ?>

                    </div>
                    <div class="col s8" >
                        <h3 style="font-weight: bold"><?php echo $this->session->userdata('username')?></h3>
                        <div id="bio">
                        </div>
                    </div>
                    </div>
                
                </div>
                
            </div>
        </div>
    </div>


<!-- Album Cards -->
<div id="album-container" class="row " style="max-width: 80%; margin-top: 20px;">
    <div id= "col1" class="col s12 l4" >

    </div>

    <div id= "col2" class="col s12 l4" >
        
    </div>

    <div id= "col3" class="col s12 l4" >
        
    </div>
    <!--<div class="row " style="max-width: 80%; margin-top: 20px;">
        <div class="col s12 l4" >
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/1.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/4.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>

                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/1.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>

                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
        </div>
        <div class="col s12 l4" >
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/3.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
            
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/6.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/1.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
        </div>



        <div class="col s12 l4" >
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/4.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
     
            

            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/5.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
        </div>
    </div>-->
<!--CREAT ALBUM MODAL-->    
<div id="create-project-modal" class="modal modal-fixed-footer" style="min-height:500px;">

            <?php echo form_open('project/create_project'); ?>
            <div class="modal-content row">
                <h4 style="text-align: center">Create a New Project</h4>
                <hr/>
                <div style="margin-top: 20px; margin-left: 10px;">
                    <div class="input-field col s12">
                        <input type="text" id="project_title" name="project_title" class="validate"
                                value="">
                        <label for="project_title"><strong>Title</strong></label>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="project_description" name="project_description" data-length="500" style="min-height: 120px;" class="materialize-textarea"></textarea>
                        <label for="project_description"><strong>Description</strong></label>
                    </div>
                    <div class="switch">
                        <label>
                            Private 
                            <input id="project_access" name="project_access" type="checkbox">
                            <span class="lever" for="project_access"></span>
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
    <script type="text/javascript">
    $(document).ready(function(){


        $("#create-project-modal").modal();
        $("#create_project").click(function(){
            $("#create-project-modal").modal('open');
        });
        $.ajax({
            url:"/Account/getBio",
            dataType: 'json',
            success: function(data)
            {
            
                $div = document.getElementById('bio');
                $bio = document.createElement("H5")
                $bio.appendChild(document.createTextNode(data[0].bio));
                $div.appendChild($bio);
            }
        });
    });

    $.ajax({
        url:"get_project",
        dataType: 'json',
        success: function(data)
        {       

            if(data.length == 0){
                var temp0 = document.getElementById("album-container");
                var temp1 = document.createElement("div");
                var temp2 = document.createElement("div");
                var temp3 = document.createElement("div");
                var temp4 = document.createElement("div");
                var temp5 = document.createElement("span");

                temp1.setAttribute("class","row");  
                temp1.setAttribute("style","max-width: 400px; position: relative;");    
                temp2.setAttribute("class","col s12 m12");  
                temp2.setAttribute("style","margin-top: 100px;");   
                temp3.setAttribute("class","card z-depth-5");   
                temp4.setAttribute("class","card-content black-text");
                temp5.setAttribute("class","card-title");
                temp5.innerText = "You have no Albums. Please use the add button to create an album.";

                temp0.appendChild(temp1);
                temp1.appendChild(temp2);
                temp2.appendChild(temp3);
                temp3.appendChild(temp4);
                temp4.appendChild(temp5);
            }else{
                var col_num = 1;
                $.each(data, function(){
                    var col = document.getElementById("col"+col_num);
                    var divcard = document.createElement("div");
                    var divImgCard = document.createElement("div");
                    var img = document.createElement("img");
                    var divalbum = document.createElement("div");
                    var a_album = document.createElement("a");
                    var srcPic = "/files/static_images/no-image-icon.png";
                        //elementdiv.setAttribute("id","picture-card");
                    divcard.setAttribute("class","card"); 
                    divalbum.setAttribute("class", "card-action");
                    divImgCard.setAttribute("class", "card-image");

                    img.setAttribute("src", srcPic);
                    var album = document.createTextNode(this.project_name);
                    a_album.appendChild(album);
                    col.appendChild(divcard);
                    divcard.appendChild(divImgCard);
                    divImgCard.appendChild(img);
                    divcard.appendChild(divalbum);
                    divalbum.appendChild(a_album);
                    if(col_num ==3){
                        col_num = 1;
                    }else{
                        col_num += 1;
                    }
                });
            }  
        }
    });


  </script>
</html>
