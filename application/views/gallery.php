<html>

<div class = "row" id="testing" style="height: 100%; position: relative; margin-top: 2%; max-width: 800px;">
  <div class="grid" data-packery='{ "itemSelector": ".grid-image-item", "percentPosition": true, "gutter": 10 }'>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/contrail.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
    </div>
    <div class="grid-image-item">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/flight-formation.jpg" />
    </div>
  </div>
</div>


<script>
  
  // init Packery
var $grid = $('.grid').imagesLoaded( function() {
  // init Packery after all images have loaded
  $grid.packery({
    // options...
  });
});

</script>




</html>
