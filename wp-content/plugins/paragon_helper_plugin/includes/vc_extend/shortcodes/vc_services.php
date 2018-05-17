<?php



add_shortcode('vc_services', 'vc_services_function');

function vc_services_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'style' => 'style1',
		'title' => 'Service Title',
		'title_color' => '#3E3E3E',
		'title_mb' => '10px',
		'text_color' => '#728080',
		'text' => 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus.',
		'icon_position' => 'left',
		'icon_color' => '#00EBC0',
		'icon_font_size' => '30px',
		'icon_mb' => '15px',
		'content_position' => 'center',
		'hover_effect' => 'false',
		'bg' => 'none',
		'border_radius' => '0',
		'm' => '0',
		'p' => '0',
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
	
 
	$vc_class = 'vl-services';
	
	

	
	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}


	if($hover_effect == 'true'){
		$vc_class .= ' hover-effect';
	}

	if($style == 'style1'){

		$vc_class .= ' vl-services-01';
		$vc_class .= ' vl-icon-position-' . $icon_position;

		$output .= '<div class="' . $vc_class . '" style="margin:'.$m.'; background-color: '.$bg.'; padding: '.$p.'; border-radius: '.$border_radius.';">';

		if ($icon_type != 'none') {
			$output .= '<div class="vl-services--icon">';
			$output .= '<i class="' . $icon . '" style="color:' . $icon_color . '; font-size: '.$icon_font_size.'; line-height: '.$icon_font_size.';" ></i>';
			$output .= '</div>';
		}

		$output .= '<div class="vl-services--content">';
		$output .= '<h5 class="vl-services--title" style="color:'.$title_color.'; margin-bottom:'.$title_mb.';">' . $title . '</h5>';
		$output .= '<p class="vl-services--description" style="color:'.$text_color.';">' . $text . '</p>';
		$output .= '</div>';

		$output .= '</div>';

	} else {

		$vc_class .= ' vl-services-02';
		$vc_class .= ' vl-text-' . $content_position;

		$output .= '<div class="' . $vc_class . '" style="margin:'.$m.'; background-color: '.$bg.'; padding: '.$p.'; border-radius: '.$border_radius.';">';

		if ($icon_type != 'none') {
			$output .= '<div class="vl-services--icon" style="margin-bottom: '.$icon_mb.';">';
			$output .= '<i class="' . $icon . '" style="color:' . $icon_color . '; font-size: '.$icon_font_size.'; line-height: '.$icon_font_size.';" ></i>';
			$output .= '</div>';
		}

		$output .= '<div class="vl-services--content">';
		$output .= '<h5 class="vl-services--title" style="color:'.$title_color.'; margin-bottom:'.$title_mb.';">' . $title . '</h5>';
		$output .= '<p class="vl-services--description" style="color:'.$text_color.';">' . $text . '</p>';
		$output .= '</div>';

		$output .= '</div>';


	}

	return $output;
	
}


add_action('vc_before_init', 'vc_services_shortcode');

function vc_services_shortcode() {

	vc_map(array(
		'name' => esc_html__('Services', 'vlthemes'),
		'base' => 'vc_services',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Service Style', 'vlthemes'),
				'param_name' => 'style',
				'value' => array(
					esc_attr__('Style One', 'vlthemes') => 'style1',
					esc_attr__('Style Two', 'vlthemes') => 'style2',
				),
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Content Position', 'vlthemes'),
				'param_name' => 'content_position',
				'value' => array(
					esc_attr__('Align Center', 'vlthemes') => 'center',
					esc_attr__('Align Left', 'vlthemes') => 'left',
					esc_attr__('Align Right', 'vlthemes') => 'right'
				),
				'group' => 'General',
				'dependency' => array(
					'element' => 'style',
					'value' => 'style2'
				),
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Icon Position', 'vlthemes'),
				'param_name' => 'icon_position',
				'value' => array(
					esc_attr__('Align Left', 'vlthemes') => 'left',
					esc_attr__('Align Right', 'vlthemes') => 'right',
				),
				'group' => 'General',
				'dependency' => array(
					'element' => 'style',
					'value' => 'style1'
				),
			),
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'heading' => esc_html__('Title', 'vlthemes'),
				'param_name' => 'title',
				'value' => 'Service Title',
				'group' => 'Content'
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Service Text', 'vlthemes'),
				'param_name' => 'text',
				'value' => 'Praesent faucibus nisl sit amet nulla sollicitudin pretium a sed purus.',
				'group' => 'Content'
			),  
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Hover Effect', 'vlthemes'),
				'param_name' => 'hover_effect',
				'value' => array(
					esc_attr__('Disable', 'vlthemes') => 'false',
					esc_attr__('Enable', 'vlthemes') => 'true',
				),
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'title_color',
				'heading' => esc_html__('Title Color', 'vlthemes'),
				'value' => '#3E3E3E',
				'group' => 'Style'
			),
			array(
				'type' => 'textarea',
				'heading' => esc_html__('Title Margin Bottom (px)', 'vlthemes'),
				'param_name' => 'title_mb',
				'value' => '10px',
				'group' => 'Style'
			),
			array(
				'type' => 'colorpicker',
				'param_name' => 'text_color',
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
				'value' => '30px',
				'group' => 'Icon'
			),   
			array(
				'type' => 'textfield',
				'param_name' => 'icon_mb',
				'heading' => esc_html__('Icon Margin Bottom (px)', 'vlthemes'),
				'value' => '15px',
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