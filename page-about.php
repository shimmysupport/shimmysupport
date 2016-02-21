<?php
/*
Template Name: About Us
*/

get_header(); ?>

<div class="aboutsearchgraphic">
<div class="container">
    <div class="topbox">
        <h1><?php the_field('content_title'); ?></h1>
        <p><?php the_field('block_content'); ?></p>
    </div>
</div>
</div>

	<div id="fullprimary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
