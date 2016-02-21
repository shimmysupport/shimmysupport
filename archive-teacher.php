<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shimmy Support
 */

get_header(); ?>

<div class="teachersearchgraphic">
<div class="container">
    <div class="topbox">
        <h1>Belly Dance Teachers</h1>
        <p>Regardless if you are new to the art of belly dance or just a new area, we can help you find a belly dance teacher.  You can search for a belly dance teacher by type and style of belly dance, class skill level, mile radius, day of the week, time of day, and cost.  Not only will this search show you belly dance teachers available, but also a profile with their certification and background in belly dance, as well as all the classes they teach.</p>
    </div>
</div>
</div>

<div class="container">
<?php get_sidebar(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

        			<div class="searchresults" style="margin-top:40px;">
            			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

            			<h2><?php echo get_the_term_list( $post->ID, 'style', '', ', ', '' ); ?>
            			<p><?php echo get_excerpt(); ?>
						</p>
        			</div>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>
