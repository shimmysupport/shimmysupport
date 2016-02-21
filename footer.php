<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Shimmy Support
 */
?>

	</div><!-- #content -->

<div id="footer">
	<div class="container">
    	<div id="footermenu">
			<nav>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
			</nav><!-- navigation -->
		</div><!-- #footermenu -->

		<div id="footersocial">

            <div id="footer-sidebar1">
                <?php
                if(is_active_sidebar('footer-sidebar-1')){
                dynamic_sidebar('footer-sidebar-1');
                }
                ?>
            </div>
    	</div><!-- .container -->
	</div><!-- #footer -->
</div>
</body>
</html>

<?php wp_footer(); ?>

</body>
</html>
