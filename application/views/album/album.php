<!DOCTYPE html>
<html>  
    <body>

<!-- FAB button -->
<div class="fixed-action-btn">
    <a id="create_Album" class="btn-floating waves-effect waves-light red"><i class="material-icons">add</i></a>
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
    <script type="text/javascript">
    $(document).ready(function(){


        $("#create-Album-modal").modal();
        $("#create_Album").click(function(){
            $("#create-Album-modal").modal('open');
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
        url:"/Album/get_Album",
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
                temp5.innerText = "You have no albums. Please use the add button to create an album.";

                temp0.appendChild(temp1);
                temp1.appendChild(temp2);
                temp2.appendChild(temp3);
                temp3.appendChild(temp4);
                temp4.appendChild(temp5);
            }else{
                var col_num = 1;
                var count = 0;

                $.each(data, function(){

                    $.each(this, function(){
                        //Creating Div cards to hold image
                        var col = document.getElementById("col"+col_num);
                        var divcard = document.createElement("div");
                        var divImgCard = document.createElement("div");
                        var img = document.createElement("img");
                        var divalbum = document.createElement("div");
                        var a_album = document.createElement("a");
                        //Check if Album has any pictures
                        var srcPic;
                        if(this['pictures'].length > 0){
                            srcPic = "/files/images/"+this['pictures'][0].picture_id+".jpg";
                        }else{
                            srcPic = "/files/static_images/no-image-icon.png";
                        }
                        

                        var album_pic_path = "/Album/picture/";
                        divcard.setAttribute("class","card"); 
                        divalbum.setAttribute("class", "card-action");
                        divImgCard.setAttribute("class", "card-image");
                        var href = "/Album/picture/?album_id="+this.album_id;
                        a_album.setAttribute("href", href);
                        var album_name_link = "album_name_link"+count;
                        a_album.setAttribute("id", album_name_link);
                        a_album.setAttribute("class", "album_pic_link");
                        
                        var a_href = document.createElement("a");
                        a_href.setAttribute("href", href);
                     
                        
                        img.setAttribute("src", srcPic);
                        var album = document.createTextNode(this.album_name);
                        a_album.appendChild(album);
                        col.appendChild(divcard);
                        divcard.appendChild(divImgCard);
                        
                        divImgCard.appendChild(a_href);
                        a_href.appendChild(img);
                        divcard.appendChild(divalbum);
                        divalbum.appendChild(a_album);

                        //Creating Forms for each album 
                        /*var form = document.createElement("form");
                        form.setAttribute("method", "post");
                        var album_form ="album_form"+count;
                        form.setAttribute("id", album_form);
                        form.setAttribute("action", "/Album/picture");
                        var input = document.createElement("input");
                        input.setAttribute("name", "album_id");
                        input.setAttribute("value", this.album_id);
                        input.setAttribute("type", "hidden");
                        form.appendChild(input);
                        
                        divalbum.appendChild(form);

                        //grabbing csrf name and value from element creataed in album-container input
                        var input_hash = document.getElementById("csrf");
                        var hash_name = input_hash.getAttribute("name");
                        var hash_value = input_hash.getAttribute("value");
                        
                        //alert(hash_name);
                        var csrf_input = document.createElement("input");
                        csrf_input.setAttribute("type", "hidden");
                        csrf_input.setAttribute("name", hash_name);
                        csrf_input.setAttribute("value", hash_value);
                        form.appendChild(csrf_input);*/

                        count += 1;
                        if(col_num == 3){
                            col_num = 1;
                        }else{
                            col_num += 1;
                        }
                    });
                });
                
                /*$('.album_pic_link').click(function(){
                    //alert("button");

                    var id = this.id;
                    var count_album = id.substring(15);
                    var form_id = "album_form"+count_album;
                    document.getElementById(form_id).submit();

                });*/
            }  
        }
    });


  </script>
</html>
