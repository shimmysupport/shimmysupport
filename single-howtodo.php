<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shimmy Support
 */

get_header(); ?>

<div id="fullprimary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

        			<div class="searchresults">
            			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            			<h2>By <?php the_field('how_to_do_author'); ?></h2>
            			<h4><?php echo get_the_term_list( $post->ID, 'howtodo-type', '', ', ', ' | ' ); ?><a href="<?php the_field('how_to_do_link'); ?>" target="_blank">View the Site</a></h4>
            			<p><?php
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shimmysupport' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
							?>
						</p>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
