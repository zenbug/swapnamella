<?php


add_shortcode('vc_pricing_table_features', 'vc_pricing_table_features_function');

function vc_pricing_table_features_function($atts, $content = null) {

	
	extract(shortcode_atts(array(
		'plan_features' => '',
		'features_color' => '#373a3c',
		'mb' => '0px',
		'extra_class' => ''
	), $atts));
	

	
	$output = '';
	

	$vc_class = 'vl-price-body';
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	$plan_features = array_filter(explode(PHP_EOL, $plan_features));
	
	$output .= '<div class="' . $vc_class . '" style="color:'.$features_color.'; margin-bottom:'.$mb.';">';
	
	
	foreach ($plan_features as $feature):
		$output .= '<div>' . preg_replace("~\*([^*]+)\*~", "<strong>$1</strong>", $feature) . '</div>';
	endforeach;
	
	$output .= '</div>';
	
	return $output;
	
}



add_action('vc_before_init', 'vc_pricing_table_features_shortcode');
function vc_pricing_table_features_shortcode()
{
	vc_map(array(
		'name' => esc_html__('Plan Features', 'vlthemes'),
		'base' => 'vc_pricing_table_features',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'as_child' => array(
			'only' => 'vc_pricing_table_parent'
		),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textarea',
				'admin_label' => true,
				'heading' => esc_html__('Plan Features', 'vlthemes'),
				'param_name' => 'plan_features',
				'description' => esc_html__('Enter plan features splitted in rows by new lines. HTML markup is allowed.', 'vlthemes'),
				'group' => 'General'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'features_color',
				'heading' => esc_html__('Text Color', 'vlthemes'),
				'value' => '#373a3c',
				'group' => 'Style'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Margin Bottom (px)', 'vlthemes'),
				'param_name' => 'mb',
				'value' => '0px',
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