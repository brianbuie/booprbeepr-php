<?php if(isset($_SESSION['error_message'])){ ?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger alert-dismissable">
		        <i class="fa fa-exclamation-circle"></i>
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <?php echo $_SESSION['error_message']; ?>
		    </div>
		</div>
	</div>

<?php unset($_SESSION['error_message']); } ?>

<?php if(isset($_SESSION['success_message'])){ ?>

	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissable">
		        <i class="fa  fa-thumbs-o-up"></i>
		        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <?php echo $_SESSION['success_message']; ?>
		    </div>
		</div>
	</div>

<?php unset($_SESSION['success_message']); } ?>