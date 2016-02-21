<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shimmy Support
 */

get_header(); ?>

<div class="musicsearchgraphic">
<div class="container">
    <div class="topbox">
        <h1>Belly Dance Music</h1>
        <p>Find all your Belly Dance Music needs. You can find a variety of artists, songs for different styles of belly dance, and locations to purchase them.  In addition users with profile are able to submit music to Shimmy Support.</p>
    </div>
</div>
</div>

<div class="container">

<div id="secondary">
	<?php
       if(is_active_sidebar('footer-sidebar-2')){
       dynamic_sidebar('footer-sidebar-2');
       }
    ?>
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

        			<div class="searchresults2" style="margin-top:40px;">
 						<?php echo get_the_post_thumbnail(); ?> 

            			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            			<h2><?php echo get_the_term_list( $post->ID, 'musician', 'By: ', ', ', '' ); ?></h2>
            			<h4><?php echo get_the_term_list( $post->ID, 'music-type', 'Music Types: ', ', ', '' ); ?></h4>
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
