<?php

class DashboardVlthemes{

    const DASHBOARD_DIRECTORY_URI = '/framework/dashboard/';
    const DASHBOARD_DIRECTORY = '/framework/dashboard/';


    public function __construct(){
        $this->dashboard_init_data();
        $this->dashboard_init_action();
        $this->dashboard_init_menu_action();
        $this->dashboard_demo_install();
    }

    public function dashboard_init_data(){

        $this->dashboard_dir = get_template_directory() . self::DASHBOARD_DIRECTORY;
        $this->dashboard_dir_uri = get_template_directory_uri() . self::DASHBOARD_DIRECTORY_URI;


        $theme_info = wp_get_theme();
        $theme_parent = $theme_info->parent();

        if(!empty($theme_parent)) {
            $theme_info = $theme_parent;
        }

        $this->theme_slug = $theme_info->get_stylesheet();
        $this->dashboard_slug = 'theme-dashboard';
        $this->demoimportslug = 'theme-demo-import';
        $this->tgmslug = 'theme-plugin-install';
        $this->theme_name = $theme_info['Name'];
        $this->theme_version = $theme_info['Version'];
        $this->theme_is_child = !empty($theme_parent);
        $this->changelog = wp_remote_get( 'http://vlthemes.com/changelog/' . $this->theme_slug .'-lite.html' );

        $this->strings = array(
            'dashboard_title' => esc_html__('Getting started with %1$s v%2$s', 'paragon'),
            'dashboard_subtitle' => esc_html__('Thanks for purchasing %1$s. We really appreciate your choice. If you like our theme and support, please rate it 5 stars. More information can be found below.', 'paragon'),
            'footer_thank_you' => esc_html__('Thank you for choosing %s, Cheers!', 'paragon'),
            'subscribe_text' => esc_html__('Subscribe Us', 'paragon'),
            'support_text' => esc_html__('Get Help', 'paragon'),
            'documentation_text' => esc_html__('Documentation', 'paragon'),
            'subscribe_link' => esc_url('http://eepurl.com/cAIc41'),
            'support_link' => esc_url('http://vlthemes.ticksy.com'),
            'documentation_link' => esc_url('http://vlthemes.com/documentation/' . $this->theme_slug . '.html'),
            'widget_support_title' => esc_html__('Get Help', 'paragon'),
            'widget_support_text1' => esc_html__('If you still have questions after reading the documentation, you can create a ticket. We will contact you ASAP.', 'paragon'),
            'widget_support_text2' => esc_html__('We love to hear your feedback - if you find any bugs or have suggestions for improvements please get in touch. Nearly all of the time we follow your advice and issue a rapid update to %s.', 'paragon'),
            'widget_changelog_title' => esc_html__('Changelog', 'paragon'),
            'widget_changelog_badge_text' =>esc_html__('Current v%s', 'paragon' ),
            'widget_bad_request_text' => esc_html__('There seems to be a temporary problem retrieving the latest updates for this theme. You can always view your latest updates on the Themeforest.', 'paragon'),
            'widget_requirements_title' => esc_html__('Requirements', 'paragon'),
            'widget_requirements_problems' => esc_html__('Some Problems', 'paragon'),
            'widget_requirements_noproblems' => esc_html__('No Problems', 'paragon'),
            'widget_more_info_text' => esc_html__('More Info', 'paragon'),
            'widget_demoimport_title' => esc_html__('Import Demo', 'paragon'),
            'widget_demoimport_btn' => esc_html__('Import Demo', 'paragon'),
            'widget_demoimport_text' => esc_html__('Before you begin, make sure all the required plugins are activated.', 'paragon'),
            'widget_demoimport_install_plugins' => esc_html__('Install Plugins', 'paragon'),
        );


    }

    public function dashboard_init_action(){
        if (is_admin()){
            add_action('admin_print_styles', array($this, 'dashboard_print_styles'));
        }
    }

    public function dashboard_print_styles(){
        wp_enqueue_style('dashboard_drop_css', $this->dashboard_dir_uri . 'css/drop-theme-twipsy.min.css', array(), $this->theme_version);
        wp_enqueue_script('dashboard_tether', $this->dashboard_dir_uri . 'script/tether.min.js', array('jquery'), $this->theme_version, true);
        wp_enqueue_script('dashboard_drop_js', $this->dashboard_dir_uri . 'script/drop.min.js', array('jquery'), $this->theme_version, true);
        wp_enqueue_script('dashboard_script', $this->dashboard_dir_uri . 'script/scripts.js', array('jquery'), $this->theme_version, true);
        wp_enqueue_style('dashboard_css', $this->dashboard_dir_uri . 'css/style.css', array(), $this->theme_version);
    }



    public function dashboard_init_menu_action(){
        add_action('admin_menu', array($this, 'dashboard_admin_menu'));
        add_action('admin_bar_menu', array($this, 'dashboard_admin_bar_menu'), 80);
    }

    public function dashboard_admin_menu(){
        call_user_func('add_menu_page', $this->theme_name, $this->theme_name, 'edit_theme_options', $this->dashboard_slug, array($this, 'dashboard_print_welcome'), 'dashicons-dashboard-icon', 3);
        // call_user_func('add_theme_page', $this->theme_name, $this->theme_name, 'edit_theme_options', $this->dashboard_slug, array($this, 'dashboard_print_welcome'), 'dashicons-admin-theme', '3');
    }

    public function dashboard_admin_bar_menu($wp_admin_bar){

        if ( ! is_object( $wp_admin_bar ) ) {
            global $wp_admin_bar;
        }
        $wp_admin_bar->add_menu(array(
            'id' => 'dashboard-admin-bar', 
            'title' => '<i class="dashboard-icon"></i>' . $this->theme_name, 
            'href' => admin_url('admin.php?page=' . vld()->dashboard_slug),
            'meta' => array( 'class' => 'vld-adminbar-link' ),
        ));

    }




    public function dashboard_print_welcome(){
        require_once $this->dashboard_dir . 'welcome.php';
    }

    public function dashboard_widgets(){
        return array(
            'requirements',
            'changelog',
            'demoimport',
            'support',
        );
    }


    public function dashboard_demo_install(){
        require_once $this->dashboard_dir . 'demo-import/demo-import.php';
    }


};

if(!function_exists('vld')){
    function vld(){
        return new DashboardVlthemes();
    }
}

vld();

global $pagenow;

if (is_admin() && 'themes.php' == $pagenow && isset($_GET['activated'])) {
	wp_redirect(admin_url('admin.php?page=' . vld()->dashboard_slug));
}

