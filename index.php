<?php

require("config.php");

// GLOBAL MODEL CODE //

require(ROOT_PATH . "model/global_load.php");


// PAGE SPECIFIC MODEL CODE //

require(ROOT_PATH . "model/get_boops.php");

$pageTitle = "Home";

$_SESSION['referal'] = " ";

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
	"plugins/moment/moment",
);

$bodyClass = "skin-blue";


// DOCUMENT START //


require(ROOT_PATH . "view/doc-head.php");


// TOP OF PAGE DEBUG AREA //



if ($number_of_all == 0){

// if no boops have been logged

	require(ROOT_PATH . "view/no-boops.php");

} else {

// standard dashboard

?>

<div class="col-lg-8 col-lg-offset-2 text-center">

	<?php require(ROOT_PATH . "view/notifications.php"); ?>

	<?php require(ROOT_PATH . "view/main-profile-card.php"); ?>

	<div class="row">

		<div class="col-lg-4 col-md-12">

			<?php require(ROOT_PATH . "view/boop-form.php"); ?>

		</div>

		<div class="col-lg-8 col-md-12">

			<?php require(ROOT_PATH . "view/boop-table-momentjs.php"); ?>

		</div>

	</div>

	<div class="row">

		<div class="col-lg-12">

			<div class="box">

				<div class="box-header">

					<h3 class="box-title">Totals</h3>

				</div>

				<div class="box-body">

			<?php

			small_stat_box_display($number_of_boops,"boops","blue");

			small_stat_box_display($number_of_beeps,"beeps","blue");

			small_stat_box_display($success_percentage . "<sup style='font-size:60%;'>%</sup>","outside!","green");

			?>

				</div>

			</div>

		</div>

	</div>

</div>




<?php }

require(ROOT_PATH . "view/footer.php"); ?>