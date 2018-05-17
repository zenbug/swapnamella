<?php 

add_shortcode('vc_typed_text', 'vc_typed_text_function');


function vc_typed_text_function($atts, $content = null) {

	extract(shortcode_atts(array(
		'text_typed' => '',
		'cursor' => 'false',
		'type_speed' => '70',
		'back_delay' => '2000',
		'extra_class' => ''
	), $atts));



	$output = '';

	$vc_class = 'vl-typed-text';
	

	if (!empty($extra_class)) {
		$vc_class .= ' ' . $extra_class;
	}
	
	$vc_init = uniqid('el_');

	$output .= '<span class="'.$vc_class.'" id="vl-typed-text-'.$vc_init.'">';

	$text_typed = array_filter(explode(PHP_EOL, $text_typed));

	$output .= '<span id="typed-strings">';
	
		foreach ($text_typed as $text):
			$output .= '<span class="typed-string">'.$text.'</span>';
		endforeach;

	$output .= '</span>';

	$output .= '</span>';

	$output .= '
		<script type="text/javascript">
		jQuery.noConflict()(function($){
			$("#vl-typed-text-' . $vc_init . '").typed({
				stringsElement: $("#vl-typed-text-' . $vc_init . '").find("#typed-strings"),
	            typeSpeed: '.$type_speed.',
	            backDelay: '.$back_delay.',
	            showCursor: '.$cursor.',
	            startDelay: 0,
	            shuffle: false,
	            loop: true,
	            contentType: "html", // or text
	            loopCount: true,
			});
		});
		</script>';


	return $output;
};

add_action('vc_before_init', 'vc_typed_text_shortcode');

function vc_typed_text_shortcode() {
	vc_map(array(
		'name' => esc_html__('Typed Text', 'vlthemes'),
		'base' => 'vc_typed_text',
		 'icon' => plugins_url('vc_shortcode.png', __FILE__),
		'category' => esc_html__('VLThemes', 'vlthemes'),
		'params' => array(
			array(
				'type' => 'textarea',
				'admin_label' => true,
				'heading' => esc_html__('Typed Text', 'vlthemes'),
				'param_name' => 'text_typed',
				'description' => esc_html__('Enter text splitted in rows by new lines. HTML markup is allowed.', 'vlthemes'),
				'group' => 'General'
			),
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Show Cursor?', 'vlthemes'),
				'param_name' => 'cursor',
				'value' => array(
					esc_html__('Hide', 'vlthemes') => 'false',
					esc_html__('Show', 'vlthemes') => 'true',
				),
				'group' => 'Settings'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Type Speed (In ms)', 'vlthemes'),
				'param_name' => 'type_speed',
				'value' => '70',
				'group' => 'Settings'
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Back Delay (In ms)', 'vlthemes'),
				'param_name' => 'back_delay',
				'value' => '2000',
				'group' => 'Settings'
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
