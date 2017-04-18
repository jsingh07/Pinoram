<body>

	<div>
		<img id="img1" src="/files/images/exiftest1.jpg">
		<div>
			<span>

			</span>
		</div>
	</div>

</body>

<script>

$.ajax({
  xhr: function() {
    var xhr = new window.XMLHttpRequest();

    xhr.upload.addEventListener("progress", function(evt) {
      if (evt.lengthComputable) {
        var percentComplete = evt.loaded / evt.total;
        percentComplete = parseInt(percentComplete * 100);
        console.log(percentComplete);

        if (percentComplete === 100) {

        }

      }
    }, false);

    return xhr;
  }
});

/*
document.getElementById("img1").onclick = function() {
    EXIF.getData(this, function() {
    	if(EXIF.getTag(this, "GPSLatitude") && EXIF.getTag(this, "GPSLongitude"))
    	{
		  	var lat = EXIF.getTag(this, "GPSLatitude"),
            lng = EXIF.getTag(this, "GPSLongitude"),
            latRef = EXIF.getTag(this, "GPSLatitudeRef"),
            lngRef = EXIF.getTag(this, "GPSLongitudeRef");
            mylat = toDecimal(lat[0], lat[1], lat[2], latRef);
            mylng = toDecimal(lng[0], lng[1], lat[2], lngRef);
        	alert("I was taken at " + mylat + " " + mylng);
		}else
		{
		  	alert("no data");
		}

    });
}

function toDecimal($deg, $min, $sec, $hem) 
{
    $d = $deg + ((($min/60) + ($sec/3600)/100));
    return ($hem=='S' || $hem=='W') ? $d*=-1 : $d;
}
*/
</script>