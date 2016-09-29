<?php

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- search form
        <form action="#" method="post" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo BASE_URL; ?>">
                    <i class="fa fa-home"></i> <span>Home</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-plus-circle"></i>
                    <span>Quick Add</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo BASE_URL . "controllers/edit_boops.php?boop_or_beep=boop&location=outside"; ?>">
                            <span class="badge bg-green"><span class="margin"><i class="fa fa-plus"></i></span><span> Booped</span></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL . "controllers/edit_boops.php?boop_or_beep=beep&location=outside"; ?>">
                            <span class="badge bg-green"><span class="margin"><i class="fa fa-plus"></i></span><span> Beeped</span></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL . "controllers/edit_boops.php?boop_or_beep=both&location=outside"; ?>">
                            <span class="badge bg-green"><span class="margin"><i class="fa fa-plus"></i></span><span> Bothed</span></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL . "controllers/edit_boops.php?boop_or_beep=boop&location=inside"; ?>">
                            <span class="badge bg-red"><span class="margin"><i class="fa fa-plus"></i></span><span> Booped</span></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL . "controllers/edit_boops.php?boop_or_beep=beep&location=inside"; ?>">
                            <span class="badge bg-red"><span class="margin"><i class="fa fa-plus"></i></span><span> Beeped</span></span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo BASE_URL . "controllers/edit_boops.php?boop_or_beep=both&location=inside"; ?>">
                            <span class="badge bg-red"><span class="margin"><i class="fa fa-plus"></i></span><span> Bothed</span></span>
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>