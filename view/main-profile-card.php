<?php ?>

<div class="row">
	<div class="col-lg-12">
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-lg-4 col-sm-4 col-xs-12 text-center">
						
						<?php require(ROOT_PATH . "view/pic_and_name.php"); ?>
						
					</div>
					<div class="col-lg-8 col-sm-8 col-xs-12 text-center">
						<div class="callout <?php echo callout_hours_increase_danger($allboops, 5, 8); ?>">
							<h4> 
								Last Booped <?php last_action_display($allboops); ?>
							</h4>
						</div>
						<div class="callout <?php echo callout_hours_increase_danger($allbeeps, 5, 8); ?>">
							<h4> 
								Last Beeped <?php last_action_display($allbeeps); ?>
							</h4>
						</div>
						<div class="callout <?php echo callout_days_increase_success($allinside, 2, 4); ?>">
							<h4> 
								Last Accident <?php last_action_display($allinside); ?>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>