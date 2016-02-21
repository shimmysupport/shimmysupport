<?php
/**
 * The template for displaying how to dos archive pages.
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
			
			<h1>How To Do Types</h1>
			<?php $terms = get_terms( 'howtodo-type' );
			foreach ( $terms as $term ) {
 
    			// The $term is an object, so we don't need to specify the $taxonomy.
    			$term_link = get_term_link( $term );
    
    			// If there was an error, continue to the next term.
    			if ( is_wp_error( $term_link ) ) {
        			continue;
    			}
 
    			// We successfully got a link. Print it out.
    			echo '<a href="' . esc_url( $term_link ) . '" rel="tag">' . $term->name . ' (' . $term->count . ') </a><br>';
			} ?>

		</div><!-- sidebartaglist -->
	</div><!-- secondary -->

</div><!-- container -->

<?php get_footer(); ?>
