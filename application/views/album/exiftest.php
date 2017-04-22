<body>

    <a href="#pictureModal" class="btn">Open</a>

    <div id="pictureModal" class="modal modal-fixed-footer" style="width: 100%;max-width: 1000px; height: 300px; overflow: visible;" >

        <div id="picture-info" class="modal-content row" style="padding: 0">

                <img src="/files/static_images/home.jpg" style="width: 700px; height:auto; display:block; margin:0; padding:0; float:left">
            <div id="picture-info-div" style="width: 300px; margin-top:10px; height: 300px;float:right;overflow-y:scroll">
                

                <div style="position: relative; margin-top: 20px; width:100%;">
                    <div class="input-field col s6" style="margin-top:-10px">
                        <strong>Latitude</strong>
                        <input type="text" id="Latitude" name="Latitude" class="validate">
                    </div>

                    <div class="input-field col s6" style="margin-top:-10px">
                        <strong>Longitude</strong>
                        <input type="text" id="Longitude" name="Longitude" class="validate">
                    </div>

                    <div class="input-field col s12" style="margin-top:-10px">
                        <a id="locate" class="btn-flat blue" style="width: 100%; color: white; text-align: center">Locate</a>
                    </div>

                    <div class="input-field col s12">
                        <strong>Address</strong>
                        <input type="text" id="Address" name="Address" class="validate">
                    </div>

                    <div class="input-field col s12" style="margin-top:-10px">
                        <strong>Description</strong>
                        <textarea id="picture_description" name="picture_description" data-length="500" style="min-height: 80px;" class="materialize-textarea active"></textarea>
                    </div>
                </div>
            </div>

        </div>

        <div id="picture-modal-footer" class="modal-footer" align="right">
            <button style="color:green;font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center"  type="submit" name="Submit" value="Submit" class="modal-action modal-close waves-effect waves-green btn-flat ">Submit</button>
        <?php echo form_close(); ?>
            <a style="font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center; color:black" class="modal-action modal-close waves-effect waves-gray btn-flat">Cancel</a>

        <?php echo form_open('Album/deletePicture'); ?>
            <input type="hidden" id="delete_pic" name="delete_pic"></input>
            <button style="color:red; font-size: 1em; max-width: 100px; min-width: 70px; padding:0; text-align: center"  type="submit" name="Submit" value="Delete" class="modal-action modal-close waves-effect waves-red btn-flat ">Delete</button>
        <?php echo form_close(); ?>

        </div>

    </div>

</body>
        
<script>

 $(document).ready(function(){
    $('.modal').modal();
  });

</script>