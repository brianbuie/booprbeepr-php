<?php

include('../../config.php')
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ImageSelect - Upload/Webcam Snapshot & Crop</title>
	
	<!-- CSS -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<link rel="stylesheet" href="assets/css/buttons.css">
	<link rel="stylesheet" href="assets/css/imgSelect.css">
	<link rel="stylesheet" href="assets/css/font-awesome.css">
	
	<!-- JavaScript -->
	<script src="assets/js/jquery-1.11.0.min.js"></script>
	<script src="assets/js/jquery.Jcrop.min.js"></script>
	<script src="assets/js/imgSelect.js"></script>

</head>
<body>
	<div class="demo-container clearfix">

		<div style="margin: 10px 0 15px 0;"><a href="<?php echo BASE_URL . $_SESSION["referal"]; ?>"> <- Go Back </a></div>	


		<!-- <img src="assets/img/pic.jpg" class="avatar"> -->
		<h2>Change Profile Picture</h2>

		<!-- imgSelect Container -->
        <div id="imgselect_container">
            <!-- Upload & Webcam buttons -->
            <div class="btn btn-primary imgs-upload">Upload</div> <!-- .imgs-upload -->
	        <button type="button" class="btn btn-success imgs-webcam">Webcam</button> <!-- .imgs-webcam -->
			
			<!-- Webcam & Crop containers -->
			<div class="imgs-webcam-container"></div> <!-- .imgs-webcam-container -->
			<div class="imgs-crop-container"></div> <!-- .imgs-crop-container -->
			
			<!-- Action buttons -->
			<div>
				<button type="button" class="btn btn-primary imgs-save">Save Image</button> <!-- .imgs-save -->
				<button type="button" class="btn btn-primary imgs-newsnap">New Snapshot</button> <!-- .imgs-newsnap -->
				<button type="button" class="btn btn-primary imgs-capture">Capture</button> <!-- .imgs-capture -->
				<button type="button" class="btn btn-default imgs-cancel">Cancel</button> <!-- .imgs-cancel -->
			</div>

			<div class="imgs-alert alert"></div> <!-- .imgs-alert -->
        </div>
	
        <script>
        	// Call imgSelect with the container selector
			new ImgSelect( $('#imgselect_container'), {
				// See the documentation for all the options

				url: 'server/upload.php',
				
				crop: {
		            aspectRatio: 1
		        },
				
				// Upload complete callback: image properties: name, type, url, size, width, height
				uploadComplete: function(image) {
					// Calculate the default selection for the cropper
					var select = (image.width > image.height) ? 
							[(image.width-image.height)/2, 0, image.height, image.height] : 
							[0, (image.height-image.width)/2, image.width, image.width];

					this.crop.setSelect = select;
				},

				// Crop complete callback: image properties: name, type, url, width, height
				cropComplete: function(image) {
					// Fix image caching by appending the timestamp
					var timestamp = '?'+new Date().getTime();

					window.location.href  = '<?php echo BASE_URL . $_SESSION["referal"]; ?>'; 
					
					// Set the new src
					$('.avatar').attr('src', image.url + timestamp);
				},
				
				/*
				// Send custom data
				data: {
					post_id: 12,
					custom_var: 'Hello'
				}
				*/
			});
		</script>
	</div>

</body>
</html>