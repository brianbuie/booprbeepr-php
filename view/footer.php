        		</section><!-- /.content -->
			</aside><!-- /.right-side -->

        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <?php foreach ($scripts as $script){

            echo '<script src="' . BASE_URL . 'js/' . $script . '.js" type="text/javascript"></script>';

        } ?>

        <script type="text/javascript">
	        jQuery(document).ready(function ($) {
	            $("time[data-momentjs]").each(function (idx, item) {
	                var $item = $(item),
	                    mdate = moment($item.text(), "YYYY-MM-DD hh:mm:ss");
	                $item.attr("title", mdate.format("ddd, MMM Do, YYYY hh:mm:ss")).text(mdate.fromNow());
	            });
	        });
    	</script>

    </body>
</html>