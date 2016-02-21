<?php
/*
Template Name: Homepage
*/

get_header(); ?>

<div class="slider">
<div class="container">
<div class="featurette">
			<div class="mightyslider_carouselSimple_skin clearfix" id="simple">
				<ul class="mSPages">
				</ul>
				<div class="frame">
					<ul class="slide_element">
						<?php if( have_rows('carousel') ): ?>
							<?php while( have_rows('carousel') ): the_row(); 
								// vars
								$mediatype = get_sub_field('media_type');
								$youtube = get_sub_field('youtube');
								$vimeo = get_sub_field('vimeo_video');
								$image = get_sub_field('video_thumbnail_image');
								?>

							<?php if(get_sub_field('media_type') == "youtube") { ?>
								<li class="slide" data-mightyslider="cover:'<?php echo $image; ?>', video: '<?php echo $youtube; ?>'"></li>
							<?php } ?>

							<?php
								if(get_sub_field('media_type') == "vimeo")
									{
										echo '<p>' . get_field('vimeo_video') . '</p>';
									}
							?>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
    </div>
</div>
<div class="clearfix"></div>
<div class="content">
<div class="container"> 
	<div class="lefty">
		<div class="article">
    		<a href="<?php echo the_field('featured_article_link');?>">
    			<img src="<?php echo the_field('featured_article_image');?>" alt="Article Image"/>
        		<h1><?php echo the_field('featured_article_title');?></h1>
        		<p><?php echo custom_field_excerpt(); ?></p>
        	</a>
    	</div>
    </div>
    
    <div class="right">
        <div class="events">
            <a href="<?php echo the_field('featured_event_link');?>" target="_blank"><h1>Featured Event</h1></a>
            <h3><?php echo the_field('featured_event_title');?></h3>
            <h3><?php echo the_field('featured_event_date');?></h3>
            <h5><?php echo the_field('featured_event_location');?></h5>
            <p><?php echo the_field('featured_event_content');?></p>
        </div>
    </div>
    
    <div class="lefty">
    	<div id="quote"></div>
        <a href="<?php echo the_field('quote_profile_link');?>" target="_blank">
            <div id="quotecontent">
                <?php echo custom_field_2_excerpt(); ?>
            </div>
        </a>
    </div>
    
    <div class="right">
    	<div class="column1">
            <div class="articlecontent">
        	<a href="/beginner-belly-dance-guide/"><h1>How to start Belly Dancing</h1></a>
            <p>Welcome to the world of belly dance! Check out our beginner’s dancer guide to help you navigate the belly dance world.  We can help you find classes, teachers, tell you what to wear to class, and how to get started belly dancing.</p>
            <img src="/wp-content/themes/shimmysupport/img/Column1.jpg" alt="Column 1"/>
            </div>  
        </div>
        <div class="column2">
            <a href="<?php echo the_field('ad_profile_link');?>" target="_blank"><img src="<?php echo the_field('ad');?>" alt="Datura Ad" class="ad"/></a>
        </div>
    </div>
    
    <div class="lefty">
    	<div id="class2">
<ul>
  <?php $the_query = new WP_Query( 'showposts=1' ); ?>

  <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
  <li><h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1></li>

  <li><p><?php echo substr(strip_tags($post->post_content), 0, 150);?>...</p></li>
  <?php endwhile;?>
</ul>
        </div>
        <div id="class">
			<?php echo do_shortcode('[event_rocket_list limit="2"]');?> 
        </div>
        </a>
    </div>
    
    <div class="right">
    	<div id="bottom">
            <a href="/contact-us/"><h1>Want to be featured on the homepage? Have an idea for the site? Contact us to let us know.</h1></a>
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>
</div>


<!-- mightySlider requires jQuery 1.7+  -->
    <!-- If you already have jQuery on your page, you shouldn't include it second time. -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <!-- Uses the built in easing capabilities added In jQuery 1.1 to offer multiple easing options -->
    <script type="text/javascript" src="/wp-content/themes/shimmysupport/mightyslider/src/js/jquery.easing-1.3.pack.js"></script>
    <!-- Mobile touch events for jQuery -->
    <script type="text/javascript" src="http://mightyslider.com/assets/js/jquery.mobile.just-touch.js"></script>
    <!-- Main slider JS script file -->
    <script type="text/javascript" src="/wp-content/themes/shimmysupport/mightyslider/src/js/mightyslider.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function($){
        var $win = $(window),
            isTouch = !!('ontouchstart' in window),
            clickEvent = isTouch ? 'tap' : 'click';

        (function(){
            /**
             * Calculate the slides width in percent based on the parent's width.
             *
             * @return {String}
             */
            function calculator(width){
                var percent = '25%';

                if (width <= 480) {
                    percent = '100%';
                }
                else if (width <= 768) {
                    percent = '50%';
                }
                else if (width <= 980) {
                    percent = '33.33%';
                }

                return percent;
            };

            // Global slider's DOM elements
            var $carousel = $('#simple'),
                $pagesbar = $('.mSPages', $carousel),
                $frame = $('.frame', $carousel);

            // Calling new mightySlider class
            var slider = new mightySlider($frame, {
                speed: 1000,
                easing: 'easeOutExpo',
                viewport: 'fill',

                // Navigation options
                navigation: {
                    navigationType: 'basic',
                    slideSize: calculator($win.width())
                },

                // Commands options
                commands: {
                    buttons: 1
                },

                // Pages options
                pages: {
                    pagesBar:       $pagesbar[0],
                    activateOn:     clickEvent
                },

                // Dragging options
                dragging: {
                    mouseDragging: 0,
                    touchDragging: 0
                }
            }).init();

            // Register window :resize event callback
            $win.resize(function(){
                // Update slider options using 'set' method
                slider.set({
                    navigation: {
                        slideSize: calculator($win.width())
                    }
                });
            });
        })();
    });
</script>


<?php get_footer(); ?>
