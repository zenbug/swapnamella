<?php



add_shortcode('vc_hero_header', 'vc_hero_header_function');

function vc_hero_header_function($atts, $content = null) {
	
	extract(shortcode_atts(array(
		'title' => 'Page Title',
		'subtitle' => 'Page Subtitle',
		'extra_class' => ''
	), $atts));
	

	
	$output = '';



	$vc_class = '';
	
	
	if ( !empty( $extra_class ) ) {
		$vc_class .= ' ' . $extra_class;
	}




	$output .= '<div class="vl-page-header">';
		$output .= '<div class="row">';
			$output .= '<div class="col-md-8">';
				$output .= '<div class="vl-page-header--inner">';
				
					if(!empty($title)):
						$output .= '<h1 class="vl-page-header--title">'.$title.'</h1>';
					endif;

					if(!empty($subtitle)):
						$output .= '<p class="vl-page-header--subtitle">'.$subtitle.'</p>';
					endif;

				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
	
}

add_action('vc_before_init', 'vc_hero_header_shortcode');

function vc_hero_header_shortcode() {
	
	vc_map(array(
		'name' => esc_html__('Hero Header', 'vlthemes'),
		'base' => 'vc_hero_header',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'param_name' => 'title',
				'heading' => esc_html__('Title', 'vlthemes'),
				'value' => 'Page Title',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'param_name' => 'subtitle',
				'heading' => esc_html__('Subtitle', 'vlthemes'),
				'value' => 'Page Subtitle',
				'group' => 'General'
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