
 <link href="/assets/css/croppie.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<script type="text/javascript" src="/assets/js/croppie.js"></script>

<a id="modalButton" href="#testModal" ><button>Open</button></a>


<div class="modal" id="testModal" style="height: 600px; width: 600px">
    <div>
        <img id="demo-basic"/>
        <button id="submitbutton" class="waves-effect waves-light btn-large">Submit</button>
        <button id="rotatebutton" class="waves-effect waves-light btn-large">Rotate</button>
    </div>

</div>

<img id="demo-exif" src="/files/images/exiftest1.jpg" style="width: 300px; height: 300px"/>
<pre>Exif Test: <span id="exifTest"></span></div>

Upload a local file to read Exif data.
<br/>
<input id="file-input" type="file" />
<br/><br/>

<div id="test" style="max-width: 600px; max-height: 600px">
    <image id="testcanvas" style="width: 200, height: auto"></image>
</div>

<script>
$(document).ready(function(){
   /* var image = new Image();
    image.src = "/files/images/16.jpg";
    image.onload = function() 
    {
        imgwidth = this.width;
        imglength = this.height;*/
    
document.getElementById("file-input").onchange = function(e) {
    EXIF.getData(e.target.files[0], function() {
        alert(EXIF.pretty(this));
    });
}

document.getElementById("demo-exif").onclick = function() {
    EXIF.getData(this, function() {
            var lat = EXIF.getTag(this, "GPSLatitude"),
            lng = EXIF.getTag(this, "GPSLongitude");
            var lattoDecimal = toDecimal(lat);
           var longtoDecimal = toDecimal(lng);
        alert("I was taken by a " + lattoDecimal + " " + longtoDecimal);
    });
}
    function toDecimal(number) {
       return number[0].numerator + number[1].numerator /
           (60 * number[1].denominator) + number[2].numerator / (3600 * number[2].denominator);
    };


        var uploadCrop = $('#demo-basic').croppie({
            enableExif: true,
            viewport: {
                width: 400,
                height: 400,
                type: 'square'
            },
            boundary: {
                width: 400,
                height: 400
            }
        });


        $('#submitbutton').click(function(){

            uploadCrop.croppie('result', {
                    type: 'base64',
                    size: 'original'
                }).then(function(html) {
                    //popupResult({src: html});
                    var mydiv = document.getElementById("testcanvas");
                    mydiv.setAttribute("src", html);
                    //$('#testcanvas').attr('src', html);
                
            });
            //uploadCrop.croppie('rotate', 90);
        });

        $('#rotatebutton').click(function(){

            uploadCrop.croppie('rotate', 90);
     
        });

        $('#testModal').modal();

        $('#modalButton').click(function(){
            uploadCrop.croppie('bind', {
                url: "/files/images/exiftest.jpg",
                points: [0,0]
            });

            var img1 = document.getElementById("demo-exif");
            EXIF.getData(img1, function() {
                var make = EXIF.getTag(this, "Orientation");
                var model = EXIF.getTag(this, "Model");
                var makeAndModel = document.getElementById("exifTest");
                makeAndModel.innerHTML = `${make} ${model}`;
            });
            

        });

   // }

});

</script>