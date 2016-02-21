<?php
/*
Template Name: Events
*/

get_header(); ?>

<div class="resourcesearchgraphic">
<div class="container">
    <div class="topbox">
        <h1>Events</h1>
        <p>Find all the events around you. Workshops, shows, festivals, crafting events, and more. You can find all belly dance events around you here.</p>
    </div>
</div>
</div>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
