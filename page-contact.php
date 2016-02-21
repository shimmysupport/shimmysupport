<?php
/*
Template Name: Contact Us
*/

get_header(); ?>

<div class="contactsearchgraphic">
<div class="container">
    <div class="topbox">
    	<h1>Contact Us</h1>
        <?php get_template_part( 'content', 'page' ); ?>
    </div>
</div>
</div>

	<div id="fullprimary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php echo do_shortcode('[gravityform id="1" title="true" description="true"]'); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
