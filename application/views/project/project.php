<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<html>

<style>
#map{
    width: 100%;
    height: 100%;
}
</style>

<body>
    <div class="row" style="height: 80%">
        <nav>
            <div class="nav-wrapper" style="background-color: white;">
                <ul>
                    <li class="col s3"><a href="" style="text-align: center">Projects</a></li>
                    <li class="col s3"><a href="#create-project-modal" style="text-align: center; line-height:20px; padding-top:12px; padding-bottom: 12px">Create<br>Project</a></li>
                    <li class="col s3"><a href="<?php echo base_url()?>Project/Picture" style="text-align: center">Pictures</a></li>
                    <li class="col s3"><a href="" style="text-align: center">Videos</a></li>
                </ul>
            </div>
        </nav>

        <!--<div class="row hide-on-medium-and-up" id="map" style="position: fixed;width:50%; height:50%"></div>-->
        <div class="row" id="map" style=""></div>
    </div>


</body>

    <script src="/assets/js/map.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwSlh06K-yZ0b04O8eg67mzaaaqH4JLJI&callback=initMap">
    </script>

</html>
