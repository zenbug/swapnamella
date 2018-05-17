<?php


add_shortcode('vc_partner', 'vc_partner_function');

function vc_partner_function($atts, $content = null)
{
	
	extract(shortcode_atts(array(
		'image' => '',
		'url' => '',
		'target' => '_blank',
		'height_parent' => '50px',
		'height_child' => '30px',
		'align' => 'center',
		'm' => '0',
		'extra_class' => ''
	), $atts));
	
	
	
	$output = '';
	

	$vc_class = 'vl-partner-item';
	
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	
	$image_done = wp_get_attachment_image_src($image, 'full');
	
	$output .= '<div class="' . $vc_class . '" style="height:' . $height_parent . '; margin: '.$m.';">';

	$output .= '<div class="vl-partner-item--inner vl-text-'.$align.'">';
	
	if ( $url != '' ) {
		$output .= '<a class="clearfix" href="' . $url . '" target="'.$target.'">';
	}
	
	$output .= '<img src="' . $image_done[0] . '" style="max-height:' . $height_child . ';" alt="">';
	
	if ( $url != '' ) {
		$output .= '</a>';
	}

	$output .= '</div>';
	$output .= '</div>';
	
	return $output;
}



add_action('vc_before_init', 'vc_partner_shortcode');

function vc_partner_shortcode() {
	
	vc_map(array(
		'name' => esc_html__('Partner / Client', 'vlthemes'),
		'base' => 'vc_partner',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'img',
				'class' => 'vc-preview-image',
				'heading' => esc_html__('Logo', 'vlthemes'),
				'param_name' => 'image',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('URL', 'vlthemes'),
				'param_name' => 'url',
				'value' => '',
				'group' => 'Link'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Target', 'vlthemes'),
				'param_name' => 'target',
				'value' => array(
					esc_attr__('New Page', 'vlthemes') => '_blank',
					esc_attr__('This Site', 'vlthemes') => '_self',
				),
				'group' => 'Link'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Logo Align', 'vlthemes'),
				'param_name' => 'align',
				'value' => array(
					esc_attr__('Align Center', 'vlthemes') => 'center',
					esc_attr__('Align Left', 'vlthemes') => 'left',
					esc_attr__('Align Right', 'vlthemes') => 'right',
				),
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Outer Height (px)', 'vlthemes'),
				'param_name' => 'height_parent',
				'value' => '50px',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Inner Height (px)', 'vlthemes'),
				'param_name' => 'height_child',
				'value' => '30px',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin (px)', 'vlthemes'),
				'param_name' => 'm',
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