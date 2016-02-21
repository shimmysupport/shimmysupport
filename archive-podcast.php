<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shimmy Support
 */

get_header(); ?>

<div class="podcastsearchgraphic">
	<div class="container">
    	<div class="topbox">
        	<h1>Podcasts</h1>
        	<p>From interviews with great dancers to hear about latest things happening in the belly dance community, you can find the podcast to fit your needs. Click on bellydancers in the podcast to find your favorite or pick podcast type.</p>
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
            			<h2><?php echo get_the_term_list( $post->ID, 'bellydancer', '', ', ', ' | ' ); ?><?php echo get_the_term_list( $post->ID, 'podcast-type', '', ', ', '' ); ?></h2>
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

			<h1>Bellydancers</h1>
			<?php get_custom_terms('bellydancer'); ?>

			<h1>Podcast Type</h1>
			<?php get_custom_terms('podcast-type'); ?>

		</div><!-- sidebartaglist -->
	</div><!-- secondary -->

</div><!-- container -->

<?php get_footer(); ?>
