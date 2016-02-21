<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shimmy Support
 */

get_header(); ?>

<div class="bookssearchgraphic">
	<div class="container">
    	<div class="topbox">
        	<h1>Books and DVDs</h1>
        	<p>With so many belly dance books and dvds it is hard to find what you are looking for. Search through our listing to help you find exactly what you are looking for. You can filter by belly dancers included, dvd type, and book types.</p>
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
            			
            		<?php
					if(get_field('dvd_book') == "dvd")
						{
							?>
							<h2><?php the_field('dvd_book'); ?><?php echo get_the_term_list( $post->ID, 'includedbellydancer', ' | ', ', ', '' ); ?><?php echo get_the_term_list( $post->ID, 'dvd-type', ' | ', ', ', '' ); ?></h2>

					<?php		
						}
					?>

					<?php
						if(get_field('dvd_book') == "book")
							{
								?>
								<h2><?php the_field('dvd_book'); ?><?php echo get_the_term_list( $post->ID, 'includedbellydancer', ' | ', ', ', ' | ' ); ?><?php echo get_the_term_list( $post->ID, 'book-type', ' | ', ', ', '' ); ?></h2>	
					<?php			
							}
					?>

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

			<h1>Bellydancers</h1>
			<?php $terms = get_terms( 'includedbellydancer' );
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

			<h1>DVD Types</h1>
			<?php $terms = get_terms( 'dvd-type' );
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

			<h1>Book Types</h1>
			<?php $terms = get_terms( 'book-type' );
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
