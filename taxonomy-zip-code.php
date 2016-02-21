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
        <h1>Teachers</h1>
        <p>New to the area, or looking to find a new teacher.  Find all your needs for a teacher by searching your area below.</p>

        <!--<form>
            <input type="text" name="signup">
        </form>

        <div id="button">
            <a class="SignUp" href="#">Search</a>
        </div>-->

    </div>
</div>
</div>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

        			<div class="searchresults" style="margin-top:40px;">
            			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

            			<h2><?php echo get_the_term_list( $post->ID, 'style', '', ', ', '' ); ?>  | <?php echo get_the_term_list( $post->ID, 'zip-code', '', ', ', '' ); ?></h2>
            			<p><?php
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shimmysupport' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
							?>
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

<?php get_sidebar(); ?>
<?php get_footer(); ?>
