<?php
/*
Template Name: User Dashboard
*/

get_header(); ?>

<div class="userprofilesearchgraphic">
<div class="container">
    <div class="topbox">
    	<h1>Welcome</h1>
        <?php get_template_part( 'content', 'page' ); ?>
    </div>
</div>
</div>

	<div id="fullprimary2" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="leftdash">
				<h1>Search for Users</h1>
				<div class="searchform">
					<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div>
							<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
							<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
							<input type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
						</div>
					</form>
				</div>
								
				<h1>User Profile</h1>
				<div id="button"><a href="<?php echo bp_loggedin_user_domain(); ?>">My Profile</a></div>
				<div id="button"><a href="/groups/">Create Group / Troupe Profile</a></div>
				<div id="button"><a href="/events/community/add">Add Events</a></div>
				<div id="button"><a href="/events/community/add">Add Classes</a></div>
				<div id="button" class="communitybutton"><a href="/events/community/list">View your Events</a></div>
				<div id="button"><a href="/add-teacher-profile/">Add Teacher Listing</a></div>
			</div>
			<div class="rightdash">
				<h1>Submit Content</h1>
				<div id="button"><a href="/featured-video/">Submit Featured Video</a></div>
				<div id="button"><a href="/featured-content/">Submit Featured Content</a></div>
				<div id="button"><a href="/submit-music/">Submit Music</a></div>
				<div id="button"><a href="/submit-podcast/">Submit Podcast</a></div>
				<div id="button"><a href="/submit-shops/">Submit Shop</a></div>
				<div id="button"><a href="/submit-online-classes/">Submit Online Classes</a></div>
				<div id="button"><a href="/submit-blog/">Submit Blog</a></div>
				<div id="button"><a href="<?php echo wp_logout_url(); ?>">Logout</a></div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
