<?php

get_header(); ?>

	<div id="fullprimary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<h1><?php echo get_the_title(); ?></h1>
				<h5>By <?php the_author(); ?> on <?php the_date(); ?></h5>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
