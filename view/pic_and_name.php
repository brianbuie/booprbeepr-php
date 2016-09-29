<img src="<?php echo $profilePic;?>" class="img-circle" />

<?php if ($_SESSION['profilePic'] == "00_default.png"){ ?>
	<a href="<?php echo BASE_URL . 'account/change-profile-picture'; ?>">
        <div class="change-picture-button">
            <button type="submit" class="btn btn-default btn-sm" name="changePic" value="changePic">Change Picture</button>
        </div>
	</a>
<?php }

	if ($dogName == null){ ?>

	<form action="<?php echo BASE_URL . 'account/changeDogName.php'; ?>" method="post">

            <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>" />

        <div class="input-group">
            <input type="text" class="form-control" id="dogName" name="dogName" placeholder="Dog's Name" required=""/> 

            <span class="input-group-btn">
                <button type="submit" class="btn bg-blue" name="changeDogName" value="changeDogName">Add</button>
            </span>

        </div>

    </form>


	<?php } else { echo '<h2>' . $dogName . '</h2>'; } ?>