<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shimmy Support
 */

get_header(); ?>

<div class="howtodossearchgraphic">
	<div class="container">
    	<div class="topbox">
        	<h1>How To Dos</h1>
        	<p>Learn how to make a costume, learn some basic moves, and so much more. Find a variety of how to do's on belly dance.</p>
    	</div><!-- topbox -->
	</div><!-- container -->
</div><!-- teachersearchgraphic -->

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
        			<div class="searchresults" style="margin-top:40px;">
            			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            			<h2><?php echo get_the_term_list( $post->ID, 'howtodo-type', '', ', ', '' ); ?></h2>
        			</div>
				<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</main><!-- main -->
	</div><!-- primary -->

	<div id="secondary">
		<div class="sidebartaglist">

			<?php
			function get_custom_terms($taxonomies, $args){
			$args = array('orderby'=>'asc','hide_empty'=>true);
			$custom_terms = get_terms(array($taxonomies), $args);
			foreach($custom_terms as $term){
    			echo '<a href="' . get_tag_link ($term) . '" rel="tag">' . $term->name . ' (' . $term->count . ') </a><br>';
			}
			}?>

			<h1>How To Do Types</h1>
			<?php get_custom_terms('howtodo-type'); ?>

		</div><!-- sidebartaglist -->
	</div><!-- secondary -->

</div><!-- container -->

<?php get_footer(); ?>
