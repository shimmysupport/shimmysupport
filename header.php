<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Shimmy Support
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title>Shimmy Support</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
<link href='http://fonts.googleapis.com/css?family=Muli:400,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Signika' rel='stylesheet' type='text/css'>
<meta name="p:domain_verify" content="ea940d5128d7b53526f179378f16c844"/>

<!-- mightySlider basic stylesheet with skins imported -->
<link rel="stylesheet" type="text/css" href="/wp-content/themes/shimmysupport/mightyslider/src/css/mightyslider.css"/>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62738841-1', 'auto');
  ga('send', 'pageview');

</script>
   
<?php wp_head(); ?>
</head>

<body>
<div id="header">
	<div class="container">
    	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="/wp-content/themes/shimmysupport/img/logo.jpg" alt="Shimmy Support Logo" class="headerlogo"/></a>
        <div id="rightheader">
        	<div id="login">
            	<div id="button">
                    <?php if ( is_user_logged_in() ) { ?>
            		   <a href="<?php echo wp_logout_url(); ?>" class="login">Logout</a>
                	   <a href="/userdashboard/" class="create">Dashboard</a>
                    <?php } else { ?>
                        <a href="/login/" class="login">Login</a>
                        <a href="/register/" class="create">Create Profile</a>
                    <?php } ?> 
                </div><!-- button -->
            </div><!-- login -->

    		<div id="menu">
				<nav>
					<a href="#" id="menu-icon"></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- navigation -->
			</div><!-- menu -->
        </div><!-- rightheader -->
    </div><!-- container-->
</div><!-- header -->

	<div id="content" class="site-content">
