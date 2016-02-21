<?php
/**
 * The template for displaying all single posts.
 *
 * @package Shimmy Support
 */

get_header(); ?>

	<?php

/**
 * Archive Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div class="eventssearchgraphic">
<div class="container">
    <div class="topbox">
        <h1>Belly Dance Questions</h1>
        <p>Belly dance questions are a forum area that users can ask fellow Shimmy Support users any questions about belly dance.  Belly dance questions are broken down into 6 main categories: business, costumes, history, music, performances, and other.  Any registered Shimmy Support user is welcome to post in belly dance questions.</p>
    </div>
</div>
</div>

<div id="fullprimary" class="content-area">
<main id="main" class="site-main" role="main">

<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	<?php do_action( 'bbp_template_before_forums_index' ); ?>

	<?php if ( bbp_has_forums() ) : ?>

		<?php bbp_get_template_part( 'loop',     'forums'    ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'feedback', 'no-forums' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_forums_index' ); ?>

</div>

</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
