<?php


/***********************************************************
General Settings
***********************************************************/


$priority = 0;

Kirki::add_field('paragon_customize', array(
    'type' => 'switch',
    'settings' => 'general_fixed_sidebar',
    'label' => esc_html__('Fixed Sidebar', 'paragon'),
    'section' => 'section_general_settings',
    'default' => '0',
    'priority' => $priority++,
	'choices' => array(
	    'on'  => esc_html__( 'Enable', 'paragon' ),
	    'off' => esc_html__( 'Disable', 'paragon' )
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'switch',
	'settings' => 'general_preloader',
	'label' => esc_html__('Preloader', 'paragon'),
	'section' => 'section_general_settings',
	'default' => '1',
	'priority' => $priority++,
	'choices' => array(
	    'on'  => esc_html__( 'Enable', 'paragon' ),
	    'off' => esc_html__( 'Disable', 'paragon' )
	)
));

Kirki::add_field('paragon_customize', array(
	'type' => 'switch',
	'settings' => 'general_back_to_top',
	'label' => esc_html__('Back To Top', 'paragon'),
	'section' => 'section_general_settings',
	'default' => '1',
	'priority' => $priority++,
	'choices' => array(
	    'on'  => esc_html__( 'Enable', 'paragon' ),
	    'off' => esc_html__( 'Disable', 'paragon' )
	)
));


Kirki::add_field('paragon_customize', array(
	'type' => 'color',
	'settings' => 'general_color',
	'label' => esc_html__('Primary Color', 'paragon'),
	'section' => 'section_general_settings',
	'default' => '#21dca4',
	'priority' => $priority++,
	'output' => array(
		array(
			'element' => '
				#nprogress .bar, 
				span.highlight, 
				.vl-btn--primary:not(.disabled):not(:disabled):hover, 
				.vl-btn--secondary, 
				.woocommerce a.button:hover, 
				.vl-btn-ajax-load, 
				.vl-social-icon:hover, 
				.comment-reply-link:hover, 
				.comment-edit-link:hover, 
				.null-instagram-feed .instagram-pics a::before, 
				#wp-calendar td#today, 
				.owl-dots .owl-dot::after, 
				.owl-carousel .owl-prev, 
				.owl-carousel .owl-next, 
				.vl-video-lightbox--link, 
				.vl-single-icon:hover, 
				.woocommerce span.onsale, 
				.woocommerce .star-rating span, 
				.vl-custom-shop-title--line, 
				.woocommerce .quantity button.minus:hover, 
				.woocommerce .quantity button.plus:hover, 
				.vl-cart-sidebar .vl-icon-cart span, 
				.woocommerce-MyAccount-navigation ul li a::before
			',
			'property' => 'background-color' 
		),
		array(
			'element' => '
				
				.vl-sidebar-navigation nav ul li a:hover > span, 
				.vl-sidebar-portfolio-filter a:hover > span, 
				.vl-sidebar-portfolio-filter a.is-active > span, 
				.vl-sidebar-portfolio-sorting a:hover > span, 
				.vl-sidebar-portfolio-sorting a.is-active > span, 
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle
			',
			'property' => 'border-color' 
		),
		array(
			'element' => '
		
				.vl-text-color, 
				cite, 
				a:hover, 
				.vl-sidebar-navigation nav ul li a:hover, 
				.vl-sidebar-navigation nav ul li.menu-item-has-children.sub-active > a, 
				.vl-mobile-btn.is-active, a.vl-large-link, .vl-widget ul li a:hover, 
				.vl-sidebar-portfolio-filter a:hover, 
				.vl-sidebar-portfolio-filter a.is-active, 
				.vl-sidebar-portfolio-sorting a:hover, 
				.vl-sidebar-portfolio-sorting a.is-active, 
				.vl-pagination span.current,
				.vl-post--title .ion-android-star, 
				.vl-post--meta a:hover, 
				.vl-post-share a:hover, 
				.vl-btn-submit span::before, 
				.vl-pricing-table .featured-flag, 
				.vl-back-to-top:hover, 
				p.rtw_main a:first-child, 
				.vl-product--add-to-card.added, 
				.woocommerce .widget_price_filter .price_slider_amount .button:hover, 
				.woocommerce p.stars.selected a.active:before, 
				.woocommerce p.stars:hover a:before, 
				.woocommerce p.stars.selected a:not(.active):before


				
			',
			'property' => 'color' 
		) 
	) 
));
