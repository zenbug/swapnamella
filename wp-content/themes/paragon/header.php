<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>


	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="format-detection" content="telephone=no">

	<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('mobile_statusbar_color', '#21dca4')); ?>">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>


	<?php if(get_theme_mod('general_preloader', true)): ?>
	<div class="vl-preloader-outer"><div class="vl-preloader-inner"></div></div>
	<?php endif; ?>

	<?php if(get_theme_mod('general_back_to_top', true)): ?>
		<a href="#" class="vl-back-to-top vl-no-select is-hidden"><i class="ion ion-android-arrow-dropup-circle"></i></a>
	<?php endif; ?>


    <?php
        $general_fixed_sidebar = get_theme_mod('general_fixed_sidebar', false);
        $general_fixed_content_class = $general_fixed_sidebar ? ' vl-content-sticky' : '';
    ?>

	
	<div class="vl-site-outer clearfix">

	<?php get_template_part('templates/paragon', 'sidebar'); ?>


	<main class="vl-content-wrapper <?php echo paragon_sanitize_class($general_fixed_content_class); ?>">

        <?php if($general_fixed_sidebar) { echo '<div>'; } ?>



