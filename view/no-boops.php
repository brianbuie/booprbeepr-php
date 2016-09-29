<?php ?>

<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 text-center">

	<?php require(ROOT_PATH . "view/notifications.php"); ?>

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-solid">
				<div class="box-body">
					<?php require(ROOT_PATH . "view/pic_and_name.php"); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">

			<div class="callout callout-info">
				<h4> 
					Get started by adding a boop or beep below!
				</h4>
			</div>

			<?php require(ROOT_PATH . "view/boop-form.php"); ?>

		</div>
	</div>

</div>