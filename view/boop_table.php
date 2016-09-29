<div class="box">
    <div class="box-header">
        <h3 class="box-title">Boops & Beeps</h3>
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
        <table class="table" style="text-align: center;">
    
            <?php foreach ($array_of_dates as $date){ ?>

				<tr class="active text-muted">
					<td colspan="4" style="text-transform: uppercase;">
						<?php echo "<small>" . relative_day($date) . "</small>"; ?>
					</td>
				</tr>

				<?php foreach($boops[$date] as $boop){ ?>

					<tr>
						<td>
							<?php echo date('g:i a', strtotime($boop["boop_time"])); ?>
						</td>
						<td>
							<?php echo $boop["boop_or_beep"]; ?>
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
			
			<?php }} ?>

        </table>
    </div><!-- /.box-body -->
</div><!-- /.box --> 

