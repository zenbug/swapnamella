<?php

add_shortcode('vc_share_post', 'vc_share_post_function');

function vc_share_post_function($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'm' => '0',
		'extra_class' => ''
	), $atts));
	

	$output = '';

	$vc_class = 'vl-share-post';
	
	
	if ( !empty( $extra_class ) ) {
		$vc_class .= ' ' . $extra_class;
	}

	global $post;
	

	$output .= '<div class="' . $vc_class . '" style="margin-bottom:'.$m.';">';
	
	$output .= paragon_post_share_buttons($post->ID);

	$output .= '</div>';
	
	return $output;
	
}

add_action('vc_before_init', 'vc_share_post_shortcode');

function vc_share_post_shortcode() {
	
	vc_map(array(
		'name' => esc_html__('Share Post', 'vlthemes'),
		'base' => 'vc_share_post',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin (px)', 'vlthemes'),
				'param_name' => 'mb',
				'value' => '0',
				'group' => 'Margin'
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