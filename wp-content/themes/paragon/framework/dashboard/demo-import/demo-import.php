<?php

function paragon_demo_import(){
	$data_url = get_template_directory() . DashboardVlthemes::DASHBOARD_DIRECTORY . 'demo-import/';
	$img_url = get_template_directory_uri() . DashboardVlthemes::DASHBOARD_DIRECTORY_URI . 'demo-import/';

	return array(
		array(
			'import_file_name' => esc_html__('Demo Default', 'paragon'),
			'local_import_file' => $data_url . 'demo-content.xml',
			'local_import_widget_file' => $data_url . 'widgets.json',
			'local_import_customizer_file' => $data_url . 'customizer1.dat',
		)
	);

}
add_filter('pt-ocdi/import_files', 'paragon_demo_import');

function paragon_demo_after_import(){

	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary-menu' => $main_menu->term_id,
	));


	$front_page_id = get_page_by_title('Portfolio Masonry 3 Col');
	update_option('show_on_front', 'page');
	update_option('page_on_front', $front_page_id->ID);
	
}
add_action('pt-ocdi/after_import', 'paragon_demo_after_import');



function paragon_demo_setup( $default_settings ){
    $default_settings['page_title'] = esc_html__( 'One Click Demo Import' , 'paragon' );
    $default_settings['menu_title'] = esc_html__( 'Import Demo' , 'paragon' );
    $default_settings['menu_slug'] = vld()->demoimportslug;

    return $default_settings;
}
add_filter('pt-ocdi/plugin_page_setup', 'paragon_demo_setup');

add_filter('pt-ocdi/disable_pt_branding', '__return_true');
