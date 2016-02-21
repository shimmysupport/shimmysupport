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
        				<div class="leftcontent"><?php echo get_the_post_thumbnail(); ?></div>

        				<div class="rightcontent">
        					<h1><?php the_title( ); ?></h1>
            				<h2><?php echo get_the_term_list( $post->ID, 'musician', 'By: ', ', ', '' ); ?></h2>
            				<h5><?php echo get_the_term_list( $post->ID, 'music-type', '', ', ', ' | ' ); ?><?php echo get_the_term_list( $post->ID, 'music-style', '', ', ', ' | ' ); ?><?php echo get_the_term_list( $post->ID, 'song-speed', '', ', ', '' ); ?></h5>
            			
            					<p>Avaliable on:</p>
								<?php if ( has_term( 'amazon', 'purchase-location', $post->ID ) ) { ?>

									<?php echo ' <a href="http://www.amazon.com/music-rock-classical-pop-jazz/b?node=5174" target="_blank" ><img src="/wp-content/uploads/2015/04/amazon.jpg" alt="Amazon" /></a> '; ?>

								<?php } ?>

								<?php if ( has_term( 'google-play', 'purchase-location', $post->ID ) ) { ?>

									<?php echo ' <a href="https://play.google.com/store/music?hl=en" target="_blank"><img src="/wp-content/uploads/2015/04/googleplay.jpg" alt="Google-Play" /></a> '; ?>

								<?php } ?>

								<?php if ( has_term( 'itunes', 'purchase-location', $post->ID ) ) { ?>

									<?php echo ' <a href="https://www.apple.com/itunes/music/" target="_blank"><img src="/wp-content/uploads/2015/04/itunes.jpg" alt="Itunes" /></a> '; ?>

								<?php } ?>

            			</div>

            			<div class="musiccontent">
            			<p><?php
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shimmysupport' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
							?>
						</p>
						</div>
        			</div>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
