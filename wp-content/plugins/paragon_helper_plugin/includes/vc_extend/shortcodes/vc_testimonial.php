<?php


add_shortcode('vc_testimonial', 'vc_testimonial_function');

function vc_testimonial_function($atts, $content = null) {


	extract(shortcode_atts(array(
		'author_avatar' => '',
		'author' => 'Author Name',
		'testimonial_text' => 'Example text',
		'author_color' => '#00EBC0',
		'testimonial_text_color' => '#728080',
		'content_position' => 'center',
		'bg' => 'none',
		'border_radius' => '0',
		'm' => '0',
		'p' => '0',
		'extra_class' => ''
	), $atts));



	$output = '';

	$vc_class = 'vl-testimonial';



	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}

	$vc_class .= ' vl-text-' . $content_position;


	$image_done = wp_get_attachment_image_src($author_avatar, array(50, 50));


	$output .= '<div class="' . $vc_class . '" style="margin:'.$m.'; background-color: '.$bg.'; padding: '.$p.'; border-radius: '.$border_radius.';">';

	if($image_done):
		$output .= '<div class="vl-testimonial--avatar">';

			$output .= '<img src="' . $image_done[0] . '" alt="">';

		$output .= '</div>';
	endif;

	$output .= '<blockquote class="vl-testimonial--text" style="color:'.$testimonial_text_color.';">'.$testimonial_text.'</blockquote>';

	$output .= '<cite class="vl-testimonial--author" style="color:'.$author_color.';">'.$author.'</cite>';


	$output .= '</div>';


	return $output;

}



add_action('vc_before_init', 'vc_testimonial_shortcode');
function vc_testimonial_shortcode()
{
	vc_map(array(
		'name' => esc_html__('Testimonial', 'vlthemes'),
		'base' => 'vc_testimonial',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Content Position', 'vlthemes'),
				'param_name' => 'content_position',
				'value' => array(
					esc_attr__('Align Center', 'vlthemes') => 'center',
					esc_attr__('Align Left', 'vlthemes') => 'left',
					esc_attr__('Align Right', 'vlthemes') => 'right'
				),
				'group' => 'General'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'img',
				'class' => 'vc-preview-image',
				'heading' => esc_html__('Author Avatar', 'vlthemes'),
				'param_name' => 'author_avatar',
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Author', 'vlthemes'),
				'param_name' => 'author',
				'value' => 'Author Name',
				'group' => 'General'
			),
			array(
				'type' => 'textarea',
				'admin_label' => true,
				'heading' => esc_html__('Testimonial Text', 'vlthemes'),
				'param_name' => 'testimonial_text',
				'value' => 'Example text',
				'group' => 'General'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'author_color',
				'heading' => esc_html__('Author Color', 'vlthemes'),
				'value' => '#00EBC0',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'testimonial_text_color',
				'heading' => esc_html__('Text Color', 'vlthemes'),
				'value' => '#728080',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'bg',
				'heading' => esc_html__('Background Color', 'vlthemes'),
				'value' => 'none',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'border_radius',
				'heading' => esc_html__('Border Radius (px)', 'vlthemes'),
				'value' => '0',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'p',
				'heading' => esc_html__('Padding (px)', 'vlthemes'),
				'value' => '0',
				'group' => 'Padding'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'm',
				'heading' => esc_html__('Margin (px)', 'vlthemes'),
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
