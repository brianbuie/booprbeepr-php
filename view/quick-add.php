<form class="navbar-form navbar-left" role="form" method="post" action="<?php echo BASE_URL . 'controllers/edit_boops.php'; ?>">
          <div class="form-group">
            <?php display_select("quick-add",array("just booped", "just beeped", "just did both")) ?>
          </div>
          <div class="form-group">
            <?php display_select("location",array("outside", "inside")) ?>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
        </form>