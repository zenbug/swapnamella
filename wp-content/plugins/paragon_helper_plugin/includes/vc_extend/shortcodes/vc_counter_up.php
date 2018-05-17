<?php


add_shortcode('vc_counter_up', 'vc_counter_up_function');


function vc_counter_up_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'align' => 'center',
		'description' => 'Theme Releases',
		'number' => '95',
		'number_color' => '#3E3E3E',
		'description_color' => '#bdbdbd',
		'm' => '0',
		'icon_color' => '#00EBC0',
		'icon_font_size' => '34px',
		'icon_mb' => '10px',
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
	

	$vc_class = 'vl-counter-up';
	
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	
	$output .= '<div class="' . $vc_class . ' vl-text-'.$align.'" style="margin: '.$m.';">';
	
	if ($icon_type != 'none') {
		$output .= '<div class="vl-counter-icon" style="margin-bottom: '.$icon_mb.';">';
		$output .= '<i class="' . $icon . '" style="color:' . $icon_color . '; font-size: '.$icon_font_size.'; line-height: '.$icon_font_size.';" ></i>';
		$output .= '</div>';
	}
	
	$output .= '<div class="vl-counter-number h2" style="color:' . $number_color . ';">' . $number . '</div>';

	
	$output .= '<h5 class="vl-counter-description" style="color:' . $description_color . ';">' . $description . '</h5>';
	

	$output .= '</div>';
	
	return $output;
	
}


add_action('vc_before_init', 'vc_counter_up_shortcode');

function vc_counter_up_shortcode() {

	vc_map(array(
		'name' => esc_html__('Count To', 'vlthemes'),
		'base' => 'vc_counter_up',
		'icon' => plugins_url('vc_shortcode.png', __FILE__), 
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Count To', 'vlthemes'),
				'param_name' => 'number',
				'admin_label' => true,
				'value' => '95',
				'group' => 'General'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Description', 'vlthemes'),
				'param_name' => 'description',
				'admin_label' => true,
				'value' => 'Counter Title',
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Counter Align', 'vlthemes'),
				'param_name' => 'align',
				'value' => array(
					esc_attr__('Align Center', 'vlthemes') => 'center',
					esc_attr__('Align Left', 'vlthemes') => 'left',
					esc_attr__('Align Right', 'vlthemes') => 'right'
				),
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'number_color',
				'heading' => esc_html__('Number Color', 'vlthemes'),
				'value' => '#3E3E3E',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'description_color',
				'heading' => esc_html__('Description Color', 'vlthemes'),
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
				'type' => 'textfield',
				'param_name' => 'icon_font_size',
				'heading' => esc_html__('Icon Font Size (px)', 'vlthemes'),
				'value' => '34px',
				'group' => 'Icon'
			),   
			array(
				'type' => 'textfield',
				'param_name' => 'icon_mb',
				'heading' => esc_html__('Icon Margin Bottom (px)', 'vlthemes'),
				'value' => '10px',
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
		)
	));
}