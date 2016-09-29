<?php
//error_reporting(0);

// header('Access-Control-Allow-Origin: yourwebsite.com');
// header('Access-Control-Allow-Origin: www.yourwebsite.com');

// session_start();

require_once('../../../config.php');

require_once('ImgSelect.php');

$options = array(

	// Upload directory
	'upload_dir' => '../../../img/user/', 

	// Accepted file types
	'accept_file_types' => 'png|jpg|jpeg|gif',
	
	// Directory mode
	'mkdir_mode' => 0777,
	
	// File max/min size in bytes
	'max_file_size' => null,
    'min_file_size' => 1,
    
    // Image size validation
    'max_width'  => null,
    'max_height' => null,
    'min_width'  => 1,
    'min_height' => 1,

	// If the image size < crop size then force the resize
    'force_crop' => true,
    // Crop max width
    'crop_max_width' => 150,
    // Crop max height
    'crop_max_height' => 150,

	/**
	 *	Before upload callback
	 *
	 *  @param 	stdClass  		$image 		Properties: name, type size
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'before_upload' => function($image, $instance) {
		// Set image name. By default the image will have the original name but 
		// with a number at the end if already exits
		// You can set the name to the userID or something like that 
		//$image->name = "my_image.".$image->type;

		$user_id = $_SESSION['userID'];

		$image->name = $user_id . "_" . date('Ymd-His') . "." . $image->type;
	},

	/**
	 *	Upload complete callback
	 *
	 *  @param 	stdClass  		$image 		Properties: name, type, size, path, url, width, height
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'upload_complete' => function($image, $instance) {
		// Here you can save the image to database
		// using $image->name to get the image name 
	},

	/**
	 *	Before crop callback
	 *
	 *  @param 	stdClass  		$crop 		Properties: file_name, file_type, src_path, dst_path, src_h, src_w, src_y, src_x, dst_w, dst_h
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'before_crop' => function($crop, $instance) {
		// You can set the crop destionaton path so the original file will be keept
		//$filename = "my_image_cropped.".$crop->file_type;
		//$crop->dst_path = $instance->getUploadPath($filename);
	},

	/**
	 *	Crop complete callback
	 *
	 *  @param 	stdClass  		$image 		Properties: name, type, path, url, width, height
	 * 	@param  ImgSelect 		$instance 	ImgSelect instance
	 *
	 *  Use $_POST['data'] to get the custom data
	 */
	'crop_complete' => function($image, $instance) {
		// Here you can save the image to database
		// using $image->name to get the image name

		$userID = $_SESSION['userID'];

		$image_name = $image->name;

		$db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,DB_USER,DB_PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		try {
        $results = $db->prepare("UPDATE users SET profilePic = ? WHERE userID = ? LIMIT 1");

        $results->bindParam(1,$image_name);
        $results->bindParam(2,$userID);
        $results->execute();

	    } catch (Exception $e) {
	        $_SESSION['error_message'] = "There was a problem connecting to the database.";
	    }

	    if (!isset($_SESSION['error_message'])){

	    	$_SESSION['profilePic'] = $image_name;
	    
	    }

	}
);

new ImgSelect($options);

// $error_messages - array of error messages to be used instead of the default ones
// See ImgSelect.php
// new ImgSelect($options, $error_messages);

?>