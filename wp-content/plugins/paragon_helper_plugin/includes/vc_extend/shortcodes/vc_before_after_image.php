<?php



add_shortcode('vc_before_after_image', 'vc_before_after_image_function');


function vc_before_after_image_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'before_img' => '',
		'after_img' => '',
		'm' => '0',
		'extra_class' => ''
	), $atts));



	$output = '';



	$vc_class = 'vl-twenty-twenty';



	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}

	$vc_init = uniqid('el_');

	$vc_class .= ' vl-twenty-twenty' . $vc_init;



	$image_before_src = wp_get_attachment_image_src($before_img, 'full');
	$image_after_src = wp_get_attachment_image_src($after_img, 'full');


	$output .= '<div class="' . $vc_class . '" style="margin:' . $m . ';">';


	$output .= '<img src="'.$image_before_src[0].'" alt="'.esc_html__('Before', 'vlthemes').'">';
	$output .= '<img src="'.$image_after_src[0].'" alt="'.esc_html__('After', 'vlthemes').'">';

	$output .= '</div>';
	
	$output .= '
		<script type="text/javascript">
		jQuery.noConflict()(function($){
			$(".vl-twenty-twenty'.$vc_init.'").twentytwenty();
		});
		</script>';
	return $output;
}


add_action('vc_before_init', 'vc_before_after_image_shortcode');

function vc_before_after_image_shortcode() {
	vc_map(array(
		'name' => esc_html__('Before/After Image', 'vlthemes'),
		'base' => 'vc_before_after_image',
		 'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Before Image', 'vlthemes'),
				'param_name' => 'before_img',
				'holder' => 'img',
				'class' => 'vc-preview-image',
				'value' => '',
			),
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('After Image', 'vlthemes'),
				'param_name' => 'after_img',
				'holder' => 'img',
				'class' => 'vc-preview-image',
				'value' => '',
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
