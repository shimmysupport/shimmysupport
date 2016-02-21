<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>
<div class="eventssearchgraphic">
<div class="container">
    <div class="topbox">
        <h1>Belly Dance Events</h1>
        <p>Learn about all the local belly dance events in your area. You can search for workshops, shows, festivals, crafting, haflas, and any other belly dance events.  You can also filter by time of day, day of the week, and price.  Also add your own belly dance events to the site for other dancers to search and find. </p>
    </div>
</div>
</div>

<div
<?php do_action( 'tribe_events_before_template' ); ?>

	<!-- Tribe Bar -->
<?php tribe_get_template_part( 'modules/bar' ); ?>

	<!-- Main Events Content -->
<?php tribe_get_template_part( 'list/content' ); ?>

<?php do_action( 'tribe_events_after_template' ) ?>