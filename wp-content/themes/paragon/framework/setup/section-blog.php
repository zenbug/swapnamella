<?php


/***********************************************************
Blog Settings
***********************************************************/

$priority = 0;

Kirki::add_field('paragon_customize', array(
	'type' => 'text',
	'settings' => 'blog_title',
	'label' => esc_html__('Blog Title', 'paragon'),
	'section' => 'section_blog_settings',
	'default' => esc_html__('Our Latest News', 'paragon'),
	'priority' => $priority++,
));

Kirki::add_field('paragon_customize', array(
	'type' => 'textarea',
	'settings' => 'blog_subtitle',
	'label' => esc_html__('Blog Subtitle', 'paragon'),
	'section' => 'section_blog_settings',
	'default' => '',
	'priority' => $priority++,
));

