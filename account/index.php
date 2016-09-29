<?php

require("../config.php");

// GLOBAL MODEL CODE //

require(ROOT_PATH . "model/global_load.php");


// PAGE SPECIFIC MODEL CODE //

$pageTitle = "Account";

$_SESSION['referal'] = "account";

$stylesheets = array(
    "bootstrap.min",
    "font-awesome.min",
    "ionicons.min",
    "AdminLTE",
    "main",
);

$scripts = array(
    "bootstrap.min",
    "AdminLTE/app",
);

$bodyClass = "skin-blue";

// DOCUMENT START //


require(ROOT_PATH . "view/doc-head.php");


// TOP OF PAGE DEBUG AREA //


?>


<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 text-center">

    <?php require(ROOT_PATH . "view/notifications.php"); ?>

    <div class="box box-solid box-primary">

        <div class="box-header bg-blue">

            <h3 class="box-title">
                Profile
            </h3>
            
        </div>

            <div class="box-body clearfix">

                <div class="col-sm-10 col-sm-offset-1">
                    <a href="<?php echo BASE_URL . 'account/change-profile-picture'; ?>">

                   
                            <img src="<?php echo $profilePic;?>" class="img-circle" />

                            <div class="change-picture-button">

                                <button type="submit" class="btn btn-default btn-sm" name="changePic" value="changePic">Change Picture</button>

                            </div>

                    </a>

                    <h3> 

                        <?php if (isset($_SESSION['dogName'])){ echo $_SESSION['dogName']; }?>

                    </h3>

                    <form action="<?php echo BASE_URL . 'account/changeDogName.php'; ?>" method="post">

                            <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>" />

                        <div class="input-group">
                            <input type="text" class="form-control" id="dogName" name="dogName" placeholder="Dog's Name" required=""/> 

                            <span class="input-group-btn">
                                <button type="submit" class="btn bg-blue" name="changeDogName" value="changeDogName">Change</button>
                            </span>

                        </div>

                    </form>

                    
                </div>

            </div>

    </div>

    <div class="box box-solid box-info">

        <div class="box-header bg-olive">

            <h3 class="box-title">
                Change Password
            </h3>
            
        </div>

        <form action="<?php echo BASE_URL . 'account/changepass.php'; ?>" method="post">
          
            <div class="box-body clearfix">

                <div class="col-sm-10 col-sm-offset-1"> 

                        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" />

                    <div class="form-group">
                        <input type="password" class="form-control" id="passwd" name="password" placeholder="Old Password" required=""/>
                    </div> 

                    <div class="form-group">
                        <input type="password" class="form-control" id="passwd" name="newPass" placeholder="New Password" required=""/>
                    </div> 

                    <div class="form-group">
                        <input type="password" class="form-control" id="conpasswd" name="conpassword" placeholder="Confirm Password" required=""/>
                    </div> 

                    <div class="form-group">
                        <button type="submit" class="btn bg-olive btn-block" name="changePass" value="changePass">Change Password</button>
                    </div>

                </div>

            </div>

        </form>
    </div>

</div>

<?php require(ROOT_PATH . "view/footer.php"); ?>