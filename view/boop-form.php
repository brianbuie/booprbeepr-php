
<div class="box">

    <div class="box-body">

        <form role="form" method="post" action="<?php echo BASE_URL . 'controllers/edit_boops.php'; ?>">

            <div class="form-group">
                <?php display_select( "boop_or_beep" , array("boop","beep","both") ); ?>
            </div>

            <div class="form-group">
                <?php display_select( "location" , array("outside","inside") ); ?>
            </div>

            <div class="form-group">
                <?php day_display_select(); ?>
            </div>

            <div class="form-group">
                <?php h_display_select(); ?>
            </div>

            <div class="form-group">
                <?php m_display_select(); ?>
            </div>

            <div class="form-group">
                <?php am_pm_display_select(); ?>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-plus-circle"></i> Add</button>

        </form>

    </div>

</div>
