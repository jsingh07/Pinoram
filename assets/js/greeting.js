$(document).ready(function(){

    var div_album_id = document.getElementById("hidden-album-id");


    $.ajax({
        url:"/Album/get_public_albums",
        dataType: 'json',
        success: function(data)
        {       
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
    });

});