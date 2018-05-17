<?php


add_shortcode('vc_pricing_table_parent', 'vc_pricing_table_parent_function');


function vc_pricing_table_parent_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'name' => 'Starter',
		'price' => '$29',
		'period' => '/Month',
		'background_color' => '#ffffff',
		'title_color' => '#3e3e3e',
		'price_color' => '#3e3e3e',
		'period_color' => '#bdbdbd',
		'icon_color' => '#00EBC0',
		'featured' => '',
		'm' => '0',
		'icon_type' => 'none',
		'icon_fontawesome' => '',
		'icon_openiconic' => '',
		'icon_typicons' => '',
		'icon_entypo' => '',
		'icon_linecons' => '',
		'icon_elusive' => '',
		'icon_etline' => '',
		'icon_iconmoon' => '',
		'icon_linearicons' => '',
		'icon_iconsmind' => '',
		'extra_class' => ''
	), $atts));
	

 
	switch ($icon_type) {
		case 'fontawesome':
			$icon = $atts['icon_fontawesome'];
			break;
		case 'openiconic':
			$icon = $atts['icon_openiconic'];
			break;
		case 'typicons':
			$icon = $atts['icon_typicons'];
			break;
		case 'entypo':
			$icon = $atts['icon_entypo'];
			break;
		case 'linecons':
			$icon = $atts['icon_linecons'];
			break;
		case 'elusive':
			$icon = $atts['icon_elusive'];
			break;
		case 'etline':
			$icon = $atts['icon_etline'];
			break;
		case 'iconmoon':
			$icon = $atts['icon_iconmoon'];
			break;
		case 'linearicons':
			$icon = $atts['icon_linearicons'];
			break;
		case 'iconsmind':
			$icon = $atts['icon_iconsmind'];
			break;
	}
	
	vc_icon_element_fonts_enqueue($icon_type);


	
	$output = '';
	

	$vc_class = 'vl-pricing-table';
	
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	


	
	$output .= '<div class="' . $vc_class . '" style="background-color: ' . $background_color . '; margin: '.$m.';">';
   
	if($featured){
		$output .= '<i class="featured-flag ion ion-android-star"></i>';
	}
	$output .= '<div class="vl-price-header">';

	if ($icon_type != 'none') {
		$output .= '<div class="vl-price-icon">';
		$output .= '<i class="' . $icon . '" style="color:' . $icon_color . ';"></i>';
		$output .= '</div>';
	}

	$output .= '<h5 class="vl-price-name" style="color:' . $title_color . ';">' . $name . '</h5>';
	
	$output .= '<div class="vl-price h2" style="color:' . $price_color . ';">' . $price .  '</div>';
	$output .= '<div class="vl-period" style="color:' . $period_color . ';">' . $period . '</div>';
	$output .= '</div>';
	
	
	$output .= do_shortcode($content);
   
	$output .= '</div>';
	
	return $output;
	
}


add_action('vc_before_init', 'vc_pricing_table_parent_shortcode');

function vc_pricing_table_parent_shortcode() {
	
	vc_map(array(
		'name' => esc_html__('Pricing Table', 'vlthemes'),
		'base' => 'vc_pricing_table_parent',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'as_parent' => array(
			'only' => 'vc_pricing_table_features, vc_buttons'
		),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'checkbox',
				'param_name' => 'featured',
				'heading' => esc_html__('Featured Plan', 'vlthemes'),
				'value' => '',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'param_name' => 'name',
				'heading' => esc_html__('Name', 'vlthemes'),
				'value' => 'Starter',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'param_name' => 'price',
				'heading' => esc_html__('Price', 'vlthemes'),
				'value' => '$29',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'param_name' => 'period',
				'heading' => esc_html__('Period', 'vlthemes'),
				'value' => '/Month',
				'group' => 'General'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'background_color',
				'heading' => esc_html__('Background Color', 'vlthemes'),
				'value' => '#ffffff',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'title_color',
				'heading' => esc_html__('Title Color', 'vlthemes'),
				'value' => '#3e3e3e',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'price_color',
				'heading' => esc_html__('Price Color', 'vlthemes'),
				'value' => '#3e3e3e',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'period_color',
				'heading' => esc_html__('Period Color', 'vlthemes'),
				'value' => '#bdbdbd',
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
				'type' => 'colorpicker',
				'param_name' => 'icon_color',
				'heading' => esc_html__('Icon Color', 'vlthemes'),
				'value' => '#00EBC0',
				'group' => 'Icon'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Icon library', 'vlthemes'),
				'value' => array(
					esc_attr__('None', 'vlthemes') => 'none',
					esc_attr__('Font Awesome', 'vlthemes') => 'fontawesome',
					esc_attr__('Open Iconic', 'vlthemes') => 'openiconic',
					esc_attr__('Typicons', 'vlthemes') => 'typicons',
					esc_attr__('Entypo', 'vlthemes') => 'entypo',
					esc_attr__('Linecons', 'vlthemes') => 'linecons',
					esc_attr__('Elusive', 'vlthemes') => 'elusive',
					esc_attr__('Etline', 'vlthemes') => 'etline',
					esc_attr__('Iconmoon', 'vlthemes') => 'iconmoon',
					esc_attr__('Linearicons', 'vlthemes') => 'linearicons',
					esc_attr__('Iconsmind', 'vlthemes') => 'iconsmind',
				),
				'param_name' => 'icon_type',
				'admin_label' => true,
				'description' => esc_html__('Select icon library', 'vlthemes'),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_fontawesome',
				'settings' => array(
					'emptyIcon' => false,
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'fontawesome'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'openiconic',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'openiconic'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_typicons',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'typicons',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'typicons'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_entypo',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'entypo',
					'iconsPerPage' => 300
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'entypo'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_linecons',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'linecons',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linecons'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_elusive',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'elusive',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'elusive'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_etline',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'etline',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'etline'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_iconmoon',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'iconmoon',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'iconmoon'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_linearicons',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'linearicons',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'linearicons'
				),
				'group' => 'Icon'
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__('Icon', 'vlthemes'),
                'admin_label' => true,
				'param_name' => 'icon_iconsmind',
				'settings' => array(
					'emptyIcon' => false,
					'type' => 'iconsmind',
					'iconsPerPage' => 1000
				),
				'dependency' => array(
					'element' => 'icon_type',
					'value' => 'iconsmind'
				),
				'group' => 'Icon'
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
		),
		'js_view' => 'VcColumnView'
	));
	
	
}