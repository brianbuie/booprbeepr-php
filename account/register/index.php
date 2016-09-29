<?php 

require("../../config.php");

?>

<!DOCTYPE html>
<html style="background: url('<?php echo BASE_URL; ?>img/background-1800.jpg') no-repeat center center fixed;">
    <head>
        <meta charset="UTF-8">
        <title>BooprBeepr | Register</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo BASE_URL . 'css/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo BASE_URL . 'css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo BASE_URL . 'css/AdminLTE.css'; ?>" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body style="background: none;">

    <div class="form-box" id="login-box">

        <div class="header">Register</div>

        <form action="<?php echo BASE_URL . 'account/register.php';?>" method="post">
            <div class="body bg-gray">

                <?php if(isset($_SESSION['error_message'])){ ?>

                    <div class="callout callout-danger">
                        <p><?php echo $_SESSION['error_message']; ?></p>
                    </div>

                <?php unset($_SESSION['error_message']); } ?>
                <div class="form-group">
                    <input type="text" class="form-control" id="usn" name="username" placeholder="Username" required="" autofocus="" <?php if(isset($_SESSION['username'])){echo 'value="' . $_SESSION['username'] . '"';}?> />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="passwd" name="password" placeholder="Password" required=""/>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="conpasswd" name="conpassword" placeholder="Retype Password" required=""/>
                </div>
            </div>
            <div class="footer">                    

                <button type="submit" class="btn bg-olive btn-block" name="register" value="Register">Register</button>

                <p>Already have an account? <a href="<?php echo BASE_URL . 'account/login';?>">Login</a></p>
            </div>
        </form>
    </div>


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo BASE_URL . 'js/bootstrap.min.js';?>" type="text/javascript"></script>

    </body>
</html>