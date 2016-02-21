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
            			<?php the_title( sprintf( '<h1>', esc_url( get_permalink() ) ), '</h1>' ); ?>
            			<h2><?php echo get_the_term_list( $post->ID, 'bellydancer', '', ', ', ' | ' ); ?><?php echo get_the_term_list( $post->ID, 'podcast-type', '', ', ', '' ); ?></h2>
            			<h4><?php the_field('podcast_name'); ?> | <a href="<?php the_field('podcast_link'); ?>" target="_blank">View <?php the_field('podcast_name'); ?> Site</a></h4>
            			<p><?php
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shimmysupport' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
							?>
						</p>

        			<?php
					if(get_field('link_or_download') == "link")
						{
							?><iframe style="height:30px;width:100%;" src="<?php the_field('embed_podcast_link')?>" frameborder="0" allowfullscreen></iframe>
					<?php		
						}
					?>

					<?php
						if(get_field('link_or_download') == "download")
							{
								?><p><a href="<?php the_field('download_page_url')?>">Download Podcast</a></p>
					<?php			
							}
					?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
