<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>

<style>
#map{
    width: 100%;
    height: 100%;
}

.gm-style-iw {
width: 350px !important;
   top: 0 !important;
   left: 0 !important;
   background-color: #fff;
   box-shadow: 0 1px 6px rgba(178, 178, 178, 0.6);
   border: 1px solid rgba(72, 181, 233, 0.6);
   border-radius: 2px 2px 0 0;
}
</style>

<body>
    <!--<div class="row" style="height: 80%">
        <nav>
            <div class="nav-wrapper" style="background-color: white;">
                <ul>
                    <li class="col s3"><a href="" style="text-align: center">Album</a></li>
                    <li class="col s3"><a href="#create-Album-modal" style="text-align: center; line-height:20px; padding-top:12px; padding-bottom: 12px">Create<br>Album</a></li>
                    <li class="col s3"><a href="<?php echo base_url()?>Album/Picture" style="text-align: center">Pictures</a></li>
                    <li class="col s3"><a href="<?php echo base_url()?>Album/test" style="text-align: center">Test</a></li>
                </ul>
            </div>
        </nav>
    </div>-->
        <!--<div class="row hide-on-medium-and-up" id="map" style="position: fixed;width:50%; height:50%"></div>-->
        <div class="row" id="map" style="height: 91%;"></div>

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
    <script>
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal').modal();
          });
    </script>

    <script src="/assets/js/map.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwSlh06K-yZ0b04O8eg67mzaaaqH4JLJI&callback=initMap&libraries=places">
    </script>

</html>
