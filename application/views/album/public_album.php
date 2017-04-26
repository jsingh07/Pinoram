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

<script type="text/javascript">
    $(document).ready(function(){
   
    $.ajax({
        url:"/Album/get_user_public",
        data: { 
            user_id: "<?php echo $user_id ?>", 
          },
        dataType: 'json',
        success: function(data)
        {       
            //alert("hello");

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
                        var a_map = document.createElement("a");
                        var map_button = document.createElement("i");
                        var location_icon = document.createTextNode("location_on");
                        var album_pic_path = "/Album/picture/";
                        var href = "/Album/picture/?album_id="+this.album_id;
                        var map_href = "/Album/map/?album_id="+this.album_id;
                        var a_href = document.createElement("a");
                        var album_name_link = "album_name_link"+count;
                        var album = document.createTextNode(this.album_name);
                        //Check if Album has any pictures
                        var srcPic;
                        if(this['pictures'].length > 0){
                            srcPic = "/files/images/"+this['pictures'][0].picture_id+".jpg";
                        }else{
                            srcPic = "/files/static_images/default_album.jpg";
                        }

                        divcard.setAttribute("class","card"); 
                        divalbum.setAttribute("class", "card-action collapsible");
                        divImgCard.setAttribute("class", "card-image");
                        
                        a_album.setAttribute("href", href);
                        a_album.setAttribute("id", album_name_link);
                        a_album.setAttribute("class", "album_pic_link");
                        a_album.setAttribute("style", "font-size: 1.2em; margin-left:-20px");

                        a_map.setAttribute("href", map_href);

                        map_button.setAttribute("class", "material-icons right");
                        
                        a_href.setAttribute("href", href);

                        img.setAttribute("src", srcPic);

                       
                        a_album.appendChild(album);
                        a_map.appendChild(map_button)
                        divalbum.appendChild(a_map);
                        map_button.appendChild(location_icon);
                        col.appendChild(divcard);
                        divcard.appendChild(divImgCard);
                        divImgCard.appendChild(a_href);
                        a_href.appendChild(img);
                        divcard.appendChild(divalbum);
                        divalbum.appendChild(a_album);

                        count += 1;
                        if(col_num == 3){
                            col_num = 1;
                        }else{
                            col_num += 1;
                        }
                    });
                });
                
            } 
        }
    });

    });


  </script>
</html>