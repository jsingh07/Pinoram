<!DOCTYPE html>
<html>
  <body>

    <script>
        /*function reqListener () {
        console.log(this.responseText);
        }

        var oReq = new XMLHttpRequest(); //New request object
        oReq.onload = function() {
            //This is where you handle what to do with the response.
            //The actual data is found on this.responseText
            var data = (this.responseText); 
            /*for(var i = 0; i < data.length; i++) {
                var obj = data[i];

                alert(obj.id);
            }
            alert (data);
        };
        oReq.open("get", "http://pyaici.com/Project/test_post", true);
        //                               ^ Don't block the rest of the execution.
        //                                 Don't wait until the request finishes to 
        //                                 continue.
        oReq.send();*/
        $.ajax({
            url: "/project/test_post", 
            dataType: 'json',
            success: function(result)
            {
                console.log(result[0].address);
            }
        });

    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdDu8izbxISEkID8QNUqH3zUnmfU-jRys&libraries=places">
    </script>

  </body>
</html>