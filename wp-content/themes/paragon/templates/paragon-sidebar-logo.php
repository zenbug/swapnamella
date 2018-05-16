<?php

	$logo_image = get_theme_mod('sidebar_logo_image', PARAGON_THEME_DIRECTORY . 'assets/img/logo.png');
	$logo_image_h = get_theme_mod('sidebar_logo_image_height', '70px');

	if(!empty($logo_image)){
		$output_logo = '<img src="'.$logo_image.'" alt="'.get_bloginfo('name').'" style="height:'.$logo_image_h.'; line-height:'.$logo_image_h.'; width: auto;">';
	} else {
		$output_logo = '<h1 class="vl-site-logo--text">'.get_bloginfo('name').'</h1>';

	}

?>

<a class="vl-site-logo" href="<?php echo esc_url(home_url('/')); ?>">
	<?php echo wp_kses($output_logo , array(
		'h1' => array(
			'class' => array(),
		),
		'img' => array(
			'src' => array(),
			'alt' => array(),
			'style' => array(),
		)
	));

	?>
</a>

<div class="clearfix"></div>

<?php if(get_bloginfo('description') && get_theme_mod('sidebar_show_subtitle', false)): ?>

<p class="vl-site-description"><?php echo get_bloginfo('description'); ?></p>

<?php endif; ?>