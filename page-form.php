<?php
/*
Template Name: Edit Form
*/

get_header(); ?>

	<div id="fullprimary" class="content-area">
		<main id="main" class="site-main" role="main">

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <?php if(get_the_author_meta('ID') == get_current_user_id()): ?>
        <h1>Edit Teacher</h1>
        <?php $terms = wp_get_post_terms($post->ID, 'teacher'); ?>
        <?php $form_args = array(
            'post_id'       => get_the_ID(),
            'post_title'    => true,
            'post_content'  => true,
            'field_groups' => array(407),
            'submit_value'  => 'Update Teacher Profile'
            );
    
        	acf_form($form_args); ?>
       
        <?php endif; ?>
        
    <?php endwhile; ?>
    
<?php else: ?>
    <?php get_template_part('notfound'); ?>
    
<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
