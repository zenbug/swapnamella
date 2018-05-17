<?php


add_shortcode('vc_collage', 'vc_collage_function');


function vc_collage_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'images' => '',
		'lightbox' => 'enable',
		'gallery' => 'enable',
		'gutter' => '15px',
		'height' => '340',
		'extra_class' => ''
	), $atts));
	
	$output = '';
	

	$vc_class = 'vl-collage-wrapper';
	
	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	$vc_init = uniqid('el_');


	$output .= '<div class="' . $vc_class . '">';
	$output .= '<div class="vl-collage-list" data-target-height="'.$height.'" style="padding: '.$gutter.'; margin: -'.$gutter.';">';
	
	$images_done = explode(',', $images);

	$gallery_init = '';

	if($gallery == 'enable'){
		$gallery_init .= 'data-rel=lightcase:'.$vc_init.'';
	}

	foreach ($images_done as $image) {

		$url = wp_get_attachment_image_src($image, 'full');

		$output .= '<div class="vl-collage-image">';

		if($lightbox == 'enable'){
			$output .= '<a class="is-popup" href="' . $url[0] . '" '.$gallery_init.'></a>';
		}

		$output .= '<img src="' . $url[0] . '" alt="">';


		$output .= '</div>';


	}

	
	$output .= '</div>';
	$output .= '</div>';
	



	return $output;
	
}


add_action('vc_before_init', 'vc_collage_shortcode');

function vc_collage_shortcode() {

	vc_map(array(
		'name' => esc_html__('Collage', 'vlthemes'),
		'base' => 'vc_collage',
		'icon' => plugins_url('vc_shortcode.png', __FILE__), 
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'attach_images',
				'heading' => esc_html__('Images', 'vlthemes'),
				'param_name' => 'images',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Image Height', 'vlthemes'),
				'param_name' => 'height',
				'admin_label' => true,
				'value' => '340',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Gutter (px)', 'vlthemes'),
				'param_name' => 'gutter',
				'admin_label' => true,
				'value' => '15px',
				'group' => 'General'
			),		
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Lightbox', 'vlthemes'),
				'param_name' => 'lightbox',
				'value' => array(
					esc_attr__('Enable', 'vlthemes') => 'enable',
					esc_attr__('Disable', 'vlthemes') => 'disable',
				),
				'group' => 'Lightbox'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Gallery', 'vlthemes'),
				'param_name' => 'gallery',
				'value' => array(
					esc_attr__('Enable', 'vlthemes') => 'enable',
					esc_attr__('Disable', 'vlthemes') => 'disable',
				),
				'group' => 'Lightbox'
			),
			array(
				'save_always' => true,
				'type' => 'textfield',
				'holder' => false,
				'heading' => esc_html__('Extra class', 'vlthemes'),
				'param_name' => 'extra_class',
				'value' => '',
				'admin_label' => true,
				'group' => 'Extras'
			)
		)
	));
}




