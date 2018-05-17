<?php


add_shortcode('vc_single_icon', 'vc_single_icon_function');

function vc_single_icon_function($atts, $content = null)
{
	
	extract(shortcode_atts(array(
		'url' => '#',
		'target' => '_self',
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
		'extra_class' => '',
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
	

	
	$vc_class = 'vl-single-icon';
	
  
	
	if ( !empty( $extra_class ) ) {
		$vc_class .= ' ' . $extra_class;
	}
	
	
	$vc_single_icon_output = '';

	if ($icon_type != 'none') {
		$vc_single_icon_output .= '<i class="' . $icon . '"></i>';
	}


	$output .= '<a class="' . $vc_class . '" href="' . $url . '" target="' . $target . '">';
	$output .= $vc_single_icon_output;
	$output .= '</a>';
	
	return $output;
	
}



add_action('vc_before_init', 'vc_single_icon_shortcode');

function vc_single_icon_shortcode() {

	vc_map(array(
		'name' => esc_html__('Single Icon', 'vlthemes'),
		'base' => 'vc_single_icon',
		'icon' => plugins_url('vc_shortcode.png', __FILE__),  
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textfield',
				'admin_label' => true,
				'param_name' => 'url',
				'heading' => esc_html__('URL', 'vlthemes'),
				'value' => '#',
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Target', 'vlthemes'),
				'param_name' => 'target',
				'value' => array(
					esc_attr__('This Site', 'vlthemes') => '_self',
					esc_attr__('New Page', 'vlthemes') => '_blank',
				),
				'group' => 'General'
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