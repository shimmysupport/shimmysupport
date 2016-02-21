<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Shimmy Support
 */

get_header(); ?>

<div class="onlineclassessearchgraphic">
	<div class="container">
    	<div class="topbox">
        	<h1>Online Classes</h1>
        	<p>Want to get started or keep belly dancing but there are no teachers in your area? Have no fear, with this listing of online classes you will never miss another belly dance class.</p>
    	</div><!-- topbox -->
	</div><!-- container -->
</div><!-- teachersearchgraphic -->

<div class="container">
	<div class="content-area" id="fullprimary2">
		<main id="main" class="site-main" role="main">
			<?php $posts = query_posts($query_string . '&orderby=title&order=asc&posts_per_page=-1'); ?>
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
        			<div class="blogresults">
        				<a href="<?php the_field('online_classes_link'); ?>" target="_blank">
        				<div class="inner">
        					<div class="blogimage">
        						<img src="<?php echo the_field('online_class_image');?>" alt="<?php the_title(); ?>">
        					</div>
            				<h1><?php the_title(); ?></h1>
            			</div>
            			</a>
            		</div>
				<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</main><!-- main -->
	</div><!-- primary -->
</div><!-- container -->

<?php get_footer(); ?>
