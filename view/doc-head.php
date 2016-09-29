<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
        <title>BooprBeepr | <?php echo $pageTitle; ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <?php foreach($stylesheets as $stylesheet){

            echo '<link href="' . BASE_URL . 'css/' . $stylesheet . '.css" rel="stylesheet" type="text/css" />';
        
        }?>

        <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="<?php echo $bodyClass; ?>" style="background: url('<?php echo BASE_URL; ?>img/background-1800.jpg') no-repeat center center fixed;">

    <?php

        require(ROOT_PATH . "view/header-nav.php");

    ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">


        <?php

            require(ROOT_PATH . "view/left-sidebar.php");

        ?>

    <aside class="right-side">

        <section class="content">
            