<html>
<body>


    <div>
        <img id="demo-basic" src="/files/images/6.jpg"/>
            <button id="submitbutton" class="waves-effect waves-light btn-large">Submit</button>
        </div>
        <div id="test" class="circle">
            
    </div>

    <div class="row" id="user-profile" style=" position: relative; margin-top: 3%; max-width: 800px; width: 100%; height: 450px;">
        <div class="card z-depth-5 col s12" style="height: 450px;">
            <div class="vertical-menu left hide-on-small-and-down" style="margin-left:-20px; position: relative; display:inline-block; z-index:100;">
                <a href="" class="active" style="padding-left: 40px;">Account</a>
                <!--<a href="<?php echo site_url();?>Account/profile" style="padding-left: 40px;">Edit Profile</a>-->
                <a href="<?php echo site_url();?>Login/password_recovery" style="padding-left: 40px;">Change Password</a>
                <a href="<?php echo site_url();?>Account/delete_account" style="padding-left: 40px;">Delete Account</a>
            </div>

            <div class="row hide-on-med-and-up">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a target="_self" class="active" href="">Account</a></li>
                        <!--<li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/profile">Edit<br>Profile</a></li>-->
                        <li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Login/password_recovery">Change<br>Password</a></li>
                        <li class="tab col s3"><a style="line-height:15px; padding-top: 10px" target="_self" href="<?php echo site_url();?>Account/delete_account">Delete<br>Account</a></li>
                    </ul>
                </div>
            </div>

</body>



</html>