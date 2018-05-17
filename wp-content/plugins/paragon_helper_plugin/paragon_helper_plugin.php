<?php

/**
 * Plugin Name: Paragon Helper Plugin
 * Plugin URI: http://themeforest.net/user/vlthemes
 * Description: Paragon Helper Plugin
 * Version: 1.1
 * Author: VLThemes
 * Author URI: http://themeforest.net/user/vlthemes
 * License:
 */

if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

class VLThemesHelperPluign {

    function __construct() {

        $current_theme = wp_get_theme();

        $plugin_inc = array(
          'includes/portfolio.php',
          'includes/theme_function.php',
          'includes/vc_extend/vc.php',
          'includes/vc_extend/vc_icon.php',
          'includes/widgets/class-widget-about-me.php',
          'includes/widgets/class-widget-social-icons.php',
          'includes/widgets/class-widget-popular-posts.php',
          'includes/widgets/class-widget-recent-posts.php',
          'includes/vc_extend/custom-rows.php',
        );

        foreach ( $plugin_inc as $file ) {
            $filepath = plugin_dir_path( __FILE__ ) . $file;
            if ( ! file_exists( $filepath ) ) :
                trigger_error( sprintf( esc_html__( 'Error locating %s for inclusion', 'vlthemes' ), $file ), E_USER_ERROR );
            endif;
            require_once $filepath;
        }
        unset( $file, $filepath );



        add_action( 'init', array( &$this, 'init' ) );

    }

    function init() {

    }

}

new VLThemesHelperPluign();
