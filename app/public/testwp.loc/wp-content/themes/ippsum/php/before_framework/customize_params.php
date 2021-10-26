<?php


// HEADER STYLE
if ( ! function_exists( 'boldthemes_customize_header_style' ) ) {
	function boldthemes_customize_header_style( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[header_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['header_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'header_style', array(
			'label'     => esc_html__( 'Header Style', 'ippsum' ),
			'description'    => esc_html__( 'Select header style for all the pages on the site.', 'ippsum' ),
			'section'   => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[header_style]',
			'priority'  => 62,
			'type'      => 'select',
			'choices'   => array(
				'transparent-light'  		=> esc_html__( 'Transparent Light', 'ippsum' ),
				'transparent-dark'   		=> esc_html__( 'Transparent Dark', 'ippsum' ),
				'accent-dark' 				=> esc_html__( 'Accent + Dark', 'ippsum' ),
				'accent-light' 				=> esc_html__( 'Light + Accent ', 'ippsum' ),
				'light-accent' 				=> esc_html__( 'Accent + Light', 'ippsum' ),
				'light-dark' 				=> esc_html__( 'Light + Dark', 'ippsum' ),
				'dark-transparent' 			=> esc_html__( 'Dark + Transparent', 'ippsum' ),
				'alternate-transparent' 	=> esc_html__( 'Alternate + Transparent', 'ippsum' ),
				'accent-transparent' 		=> esc_html__( 'Accent + Transparent', 'ippsum' )
			)
		));
	}
}