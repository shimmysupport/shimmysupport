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
        				<div class="bookimage"><?php the_post_thumbnail(); ?></div>
        				<div class="bookcontent">
            			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

        			<?php
					if(get_field('dvd_book') == "dvd")
						{
							?>
							<h2><?php echo get_the_term_list( $post->ID, 'includedbellydancer', '', ', ', ' | ' ); ?><?php echo get_the_term_list( $post->ID, 'dvd-type', '', ', ', '' ); ?></h2>
            				<h4><?php the_field('dvd_book'); ?> | <a href="<?php the_field('purchase_link'); ?>" target="_blank">Purchase <?php the_field('dvd_book'); ?></a></h4>
            					<p><?php
									/* translators: %s: Name of current post */
									the_content( sprintf(
										__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shimmysupport' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );
									?>
								</p>
								<iframe width="560" height="315" src="<?php the_field('dvd_sample_video')?>" frameborder="0" allowfullscreen></iframe>
							</div>
					<?php		
						}
					?>

					<?php
						if(get_field('dvd_book') == "book")
							{
								?>
								<h2>By: <?php the_field('book_author'); ?></h2>
								<h2><?php echo get_the_term_list( $post->ID, 'includedbellydancer', '', ', ', ' | ' ); ?><?php echo get_the_term_list( $post->ID, 'book-type', '', ', ', '' ); ?></h2>
            					<h4><?php the_field('dvd_book'); ?> | <a href="<?php the_field('purchase_link'); ?>" target="_blank">Purchase <?php the_field('dvd_book'); ?></a></h4>
            					<p><?php
									/* translators: %s: Name of current post */
									the_content( sprintf(
										__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shimmysupport' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									) );
									?>
								</p>
								</div>		
					<?php			
							}
					?>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		<div class="clearfix2"></div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
