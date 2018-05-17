<?php

$shortcodes_inc = array(


    'shortcodes/vc_alert_message.php', //a

    'shortcodes/vc_buttons.php', //b
    'shortcodes/vc_before_after_image.php', //b


    'shortcodes/vc_collage.php', //c
    'shortcodes/vc_counter_up.php', //c
    'shortcodes/vc_custom_title.php', //c
    'shortcodes/vc_custom_icon.php', //c
    'shortcodes/vc_contact_form.php', //c


    'shortcodes/vc_dropcap.php', //d


    'shortcodes/vc_gmap.php', //g

    'shortcodes/vc_hero_header.php', //h


    'shortcodes/vc_image_slider.php', //i
    'shortcodes/vc_image_single.php', //i

    'shortcodes/vc_partners.php', //p
    'shortcodes/vc_progress_bar.php', //p
    'shortcodes/vc_progress_bar_circle.php', //p
    'shortcodes/vc_pricing_table_parent.php', //p
    'shortcodes/vc_pricing_table_features.php', //p




    'shortcodes/vc_testimonials_parent.php', //t
    'shortcodes/vc_testimonial.php', //t
    'shortcodes/vc_typed_text.php',

    'shortcodes/vc_single_icon.php', //s
    'shortcodes/vc_single_post.php', //s
    'shortcodes/vc_services.php', //s
    'shortcodes/vc_share_post.php', //s

    'shortcodes/vc_team_memder_parent.php', //t

    'shortcodes/vc_video_lightbox.php', //v
);

foreach ( $shortcodes_inc as $file ) {
    $filepath = plugin_dir_path( __FILE__ ) . $file;
    if ( ! file_exists( $filepath ) ) :
        trigger_error( sprintf( esc_html__( 'Error locating %s for inclusion', 'vlthemes' ), $file ), E_USER_ERROR );
    endif;
    require_once $filepath;
}
unset( $file, $filepath );


add_action('vc_before_init', 'vlthemes_shortcode_extend');

if(!function_exists('vlthemes_shortcode_extend')){
  function vlthemes_shortcode_extend(){

      if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
          class WPBakeryShortCode_Vc_Testimonials_Parent  extends WPBakeryShortCodesContainer {}
          class WPBakeryShortCode_Vc_Pricing_Table_Parent  extends WPBakeryShortCodesContainer {}
          class WPBakeryShortCode_Vc_Team_Member_Parent  extends WPBakeryShortCodesContainer {}
      }


      if ( class_exists( 'WPBakeryShortCode' ) ) {
          class WPBakeryShortCode_Vc_Testimonial  extends WPBakeryShortCode {}
          class WPBakeryShortCode_Vc_Pricing_Table_Features  extends WPBakeryShortCode {}
      }

  }
}
