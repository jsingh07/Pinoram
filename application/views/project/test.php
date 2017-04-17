<!DOCTYPE html>
<html>  
    <body>
    <!--<div>
        <img id="demo-basic" src="/files/images/6.jpg"/>
            <button id="submitbutton" class="waves-effect waves-light btn-large">Submit</button>
        </div>
        <div id="test" class="circle">
            
    </div>-->

    <div class="row" style="margin-top: 20px">
        <div class="col s12 m8 offset-m2 l6 offset-l3" >
            <div class="card-content" style="border: none; margin: auto">
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <img src="/files/profile_images/2.jpg" class="circle responsive-img" style="margin-top: 20px">        
                    </div>
                    <div class="col s8" >
                        <h3 style="font-weight: bold"><?php echo $this->session->userdata('username')?></h3>
                        <div id="bio">
                        </div>
                    </div>
                    </div>
                
                </div>
                <div class="fixed-action-btn">
                     <a class="btn-floating waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div> 
            </div>
        </div>
    </div>


    <div class="row " style="max-width: 80%; margin-top: 20px;">
        <div class="col s12 l4" >
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/1.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/4.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>

                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/1.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>

                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
        </div>
        <div class="col s12 l4" >
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/3.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
            
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/6.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/1.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
        </div>



        <div class="col s12 l4" >
            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/4.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
     
            

            <div class="card" >
                <div class="card-image">
                    
                    <a href="<?php echo base_url();?>/Project/picture"><img src="/files/images/5.jpg"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
                </div>
                <div class="card-action">
                      <a href="<?php echo base_url();?>/Project/picture">Album</a>
                </div>
            </div>
        </div>
    </div>


  </body>
    <script type="text/javascript">
    $(document).ready(function(){
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


  </script>
</html>