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

        			<div class="bookimage">
        				<?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
        				<?php echo do_shortcode('[gmw_single_location]'); ?>
        			</div>

        			
        				<div class="bookcontent">
            			<?php the_title( sprintf( '<h1><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            			<h5>Type: <?php echo get_the_term_list( $post->ID, 'type', ' ', ', ', '' ); ?>
            			<br>Style: <?php echo get_the_term_list( $post->ID, 'style', ' ', ', ', '' ); ?>
            			<br>Location: <?php the_field('zip_code'); ?>
            			<br>Skill Levels Taught:<?php echo get_the_term_list( $post->ID, 'skill-level', ' ', ', ', '' ); ?>
            			<br>Days of the Week Teaching:<?php echo get_the_term_list( $post->ID, 'day-of-the-week', ' ', ', ', '' ); ?>
            			<br>Times of Day Teaching:<?php echo get_the_term_list( $post->ID, 'time-of-day', ' ', ', ', '' ); ?>
            			<br>Price Range of Class:<?php echo get_the_term_list( $post->ID, 'cost', ' ', ', ', '' ); ?>
            			<br><?php
$temp_post = get_post($post_id);
$user_id = $temp_post->post_author;
$author_bp_profile = bp_core_get_user_domain( $user_id );
?><a href="<?php echo $author_bp_profile;?>">View the author's profile</a></h5>
            		
            			<p class="teacherbio"><?php
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'shimmysupport' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );
							?>
						</p>
						
						<?php

						$args = array(
        						'post_type'      => array(TribeEvents::POSTTYPE), // use post_type IN () to avoid old tribe queries
        						'posts_per_page' => -1,
        						'order' => 'ASC',
        						'author' => get_the_author_meta('ID')
      						);

      						$events = new WP_Query( $args );
      
      						if($events->have_posts()) : while ( $events->have_posts() ) : $events->the_post();
      						?>

      					<div class="eventsteacher"></div>
      					<h3>Events and Classes by this Teacher</h3>
						<!-- Event Title -->
						<h2 class="tribe-events-list-event-title entry-title summary">
							<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
								<?php the_title() ?>
							</a>
						</h2>
						<?php do_action( 'tribe_events_after_the_event_title' ) ?>

						<!-- Event Meta -->
						<?php do_action( 'tribe_events_before_the_meta' ) ?>
						<div class="tribe-events-event-meta vcard">
							<div class="author <?php echo $has_venue_address; ?>">

								<!-- Schedule & Recurrence Details -->
								<div class="updated published time-details">
									<?php echo tribe_events_event_schedule_details() ?>
								</div>

							</div>
						</div><!-- .tribe-events-event-meta -->
						<?php do_action( 'tribe_events_after_the_meta' ) ?>

						<!-- Event Content -->
						<?php do_action( 'tribe_events_before_the_content' ) ?>
						<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
							<?php the_excerpt() ?>
						</div><!-- .tribe-events-list-event-description -->
						<?php do_action( 'tribe_events_after_the_content' ) ?>

    						<?php endwhile; endif; wp_reset_query(); ?> 

        									</div>

									<?php endwhile; ?>

									<?php the_posts_navigation(); ?>

								<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>
						<div class="clearfix2"></div>
					</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	
<?php get_footer(); ?>
