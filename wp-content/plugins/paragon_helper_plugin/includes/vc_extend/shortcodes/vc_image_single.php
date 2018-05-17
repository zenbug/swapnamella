<?php



add_shortcode('vc_image_single', 'vc_image_single_function');


function vc_image_single_function($atts, $content = null)
{
	extract(shortcode_atts(array(
		'image' => '',
		'description' => '',
		'position' => 'top-left',
		'lightbox' => 'disable',
		'm' => '0',
		'extra_class' => ''
	), $atts));



	$output = '';



	$vc_class = 'vl-image-with-caption';



	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}


	$image_done = wp_get_attachment_image_src($image, 'full');


	$output .= '<div class="' . $vc_class . '" style="margin: '.$m.';">';


	if($lightbox == 'enable'){
	  $output .= '<a class="is-popup" href="' . $image_done[0] . '">';
	}

	$output .= '<img src="' . $image_done[0] . '" alt="">';

	if($lightbox == 'enable'){
	  $output .= '</a>';
	}

	if ( !empty( $description ) ) {
		$output .= '<div class="vl-caption vl-caption-' . $position . '"><span>' . $description . '</span></div>';
	}


	$output .= '</div>';


	return $output;

}


add_action('vc_before_init', 'vc_image_single_schortcode');
function vc_image_single_schortcode()
{
	vc_map(array(
		'name' => esc_html__('Single Image', 'vlthemes'),
		'base' => 'vc_image_single',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'img',
				'class' => 'vc-preview-image',
				'heading' => esc_html__('Image', 'vlthemes'),
				'param_name' => 'image',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Lightbox', 'vlthemes'),
				'param_name' => 'lightbox',
				'value' => array(
					esc_attr__('Disable', 'vlthemes') => 'disable',
					esc_attr__('Enable', 'vlthemes') => 'enable',
				),
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Caption', 'vlthemes'),
				'param_name' => 'description',
				'admin_label' => true,
				'value' => '',
				'group' => 'Caption'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Caption Position', 'vlthemes'),
				'param_name' => 'position',
				'value' => array(
					esc_attr__('Top Left', 'vlthemes') => 'top-left',
					esc_attr__('Top Right', 'vlthemes') => 'top-right',
					esc_attr__('Bottom Right', 'vlthemes') => 'bottom-right',
					esc_attr__('Bottom Left', 'vlthemes') => 'bottom-left'
				),
				'group' => 'Caption',
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
