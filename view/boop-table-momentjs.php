<div class="box">
    <div class="box-header">
        <h3 class="box-title" style="text-align:left;">
        	Boops & Beeps

        	<?php if (!isset($_GET['v'])){ ?>
        	<a href="<?php echo BASE_URL . 'index.php?v=all'; ?>">
        		<button type="submit" class="btn btn-default btn-xs btn-inline pull-right">View All</button>
        	</a>
        	<?php }else{ ?>
        	<a href="<?php echo BASE_URL; ?>">
        		<button type="submit" class="btn btn-default btn-xs btn-inline pull-right">View Week</button>
        	</a>
        	<?php } ?>

        </h3>
        <!-- <div class="box-tools">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div> -->
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table" style="text-align: center;" id="booptable">

			<?php

				$view_date = date("l n/j", strtotime("1988-04-08")); 

				foreach($allactions as $boop){ 

					if (!isset($_GET['v'])){
						$date1 = new DateTime("now");
						$date2 = new DateTime($boop['ts']);
						$diff = $date2->diff($date1)->d;
					}

				if (!isset($diff) OR $diff < 8){

					if (date("l n/j", strtotime($boop['ts'])) != $view_date) {

						$date1 = new DateTime("now");
						$date2 = new DateTime($boop['ts']);
						$diff = $date2->diff($date1)->d;

						$today = date("l n/j");
						$yesterday = date("l n/j", strtotime( '-1 days'));

						if ($diff < 8){

							if (date("l n/j", strtotime($boop['ts'])) == $today){
								$display_date = "Today";
							} else {

								if (date("l n/j", strtotime($boop['ts'])) == $yesterday){
									$display_date = "Yesterday";
								} else {

									$display_date = date("l", strtotime($boop['ts']));
								}
							}
						} else {

							$display_date = date("D n/j", strtotime($boop['ts']));

						}

						$view_date = date("l n/j", strtotime($boop['ts']))

						?>

						<tr class="active text-muted">
							<td colspan="4" style="text-transform: uppercase;">
								<?php echo "<small>" . $display_date . "</small>"; ?>
							</td>
						</tr>

					<?php } ?>

					<tr>
						<td>
							<?php echo $boop["boop_or_beep"] . "ed"; ?>
						</td>
						<td>
							
							<?php echo date("g:i a", strtotime($boop['ts'])); ?>

						</td>
						<?php echo '<td>';
							if($boop["location"] == "outside"){
							echo '<span class="badge bg-green">';
							} else{
							echo '<span class="badge bg-red">';
							}
							echo $boop["location"]; ?>
						</span></td>


						<td style="width: 15px;">
							<form class="form-inline" role="form" method="post" action="<?php echo BASE_URL . 'controllers/edit_boops.php'; ?>">
								<button class="btn btn-default btn-xs" name = "remove" VALUE = "<?php echo $boop['id']; ?>">
									<span class="glyphicon glyphicon-remove"></span>
								</button>
							</form>
						</td>


					</tr>
			
			<?php } } ?>

        </table>
    </div><!-- /.box-body -->
</div><!-- /.box --> 