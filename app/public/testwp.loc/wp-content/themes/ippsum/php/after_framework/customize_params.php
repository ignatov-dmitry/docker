<?php

/* Remove unused params */

remove_action( 'customize_register', 'boldthemes_customize_blog_side_info' );
remove_action( 'boldthemes_customize_register', 'boldthemes_customize_blog_side_info' );


// SUPERTITLE WEIGHT

BoldThemes_Customize_Default::$data['default_supertitle_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_supertitle_weight' ) ) {
	function boldthemes_customize_default_supertitle_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_supertitle_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_supertitle_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_supertitle_weight', array(
			'label'     		=> esc_html__( 'Supertitle Font Weight', 'ippsum' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_supertitle_weight]',
			'priority'  		=> 100,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'ippsum' ),
				'thin' 			=> esc_html__( 'Thin', 'ippsum' ),
				'lighter' 		=> esc_html__( 'Lighter', 'ippsum' ),
				'light' 		=> esc_html__( 'Light', 'ippsum' ),
				'normal' 		=> esc_html__( 'Normal', 'ippsum' ),
				'medium' 		=> esc_html__( 'Medium', 'ippsum' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'ippsum' ),
				'bold' 			=> esc_html__( 'Bold', 'ippsum' ),
				'bolder' 		=> esc_html__( 'Bolder', 'ippsum' ),
				'black' 		=> esc_html__( 'Black', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_supertitle_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_supertitle_weight' );


// HEADING WEIGHT

BoldThemes_Customize_Default::$data['default_heading_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_heading_weight' ) ) {
	function boldthemes_customize_default_heading_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_heading_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_heading_weight', array(
			'label'     		=> esc_html__( 'Heading Weight', 'ippsum' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_heading_weight]',
			'priority'  		=> 100,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'ippsum' ),
				'thin' 			=> esc_html__( 'Thin', 'ippsum' ),
				'lighter' 		=> esc_html__( 'Lighter', 'ippsum' ),
				'light' 		=> esc_html__( 'Light', 'ippsum' ),
				'normal' 		=> esc_html__( 'Normal', 'ippsum' ),
				'medium' 		=> esc_html__( 'Medium', 'ippsum' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'ippsum' ),
				'bold' 			=> esc_html__( 'Bold', 'ippsum' ),
				'bolder' 		=> esc_html__( 'Bolder', 'ippsum' ),
				'black' 		=> esc_html__( 'Black', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_heading_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_heading_weight' );


// SUBTITLE WEIGHT

BoldThemes_Customize_Default::$data['default_subtitle_weight'] = 'default';
if ( ! function_exists( 'boldthemes_customize_default_subtitle_weight' ) ) {
	function boldthemes_customize_default_subtitle_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_subtitle_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_subtitle_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));

		$wp_customize->add_control( 'default_subtitle_weight', array(
			'label'     		=> esc_html__( 'Subtitle Font Weight', 'ippsum' ),
			'section'   		=> BoldThemesFramework::$pfx . '_typo_section',
			'settings'  		=> BoldThemesFramework::$pfx . '_theme_options[default_subtitle_weight]',
			'priority'  		=> 100,
			'type'      		=> 'select',
			'choices'   => array(
				'default'		=> esc_html__( 'Default', 'ippsum' ),
				'thin' 			=> esc_html__( 'Thin', 'ippsum' ),
				'lighter' 		=> esc_html__( 'Lighter', 'ippsum' ),
				'light' 		=> esc_html__( 'Light', 'ippsum' ),
				'normal' 		=> esc_html__( 'Normal', 'ippsum' ),
				'medium' 		=> esc_html__( 'Medium', 'ippsum' ),
				'semi-bold' 	=> esc_html__( 'Semi bold', 'ippsum' ),
				'bold' 			=> esc_html__( 'Bold', 'ippsum' ),
				'bolder' 		=> esc_html__( 'Bolder', 'ippsum' ),
				'black' 		=> esc_html__( 'Black', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_subtitle_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_subtitle_weight' );



// BUTTON FONT

BoldThemes_Customize_Default::$data['button_font'] = 'Rubik';
if ( ! function_exists( 'boldthemes_customize_button_font' ) ) {
	function boldthemes_customize_button_font( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[button_font]', array(
			'default'           => urlencode( BoldThemes_Customize_Default::$data['button_font'] ),
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'button_font', array(
			'label'     => esc_html__( 'Button Font', 'ippsum' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[button_font]',
			'priority'  => 101,
			'type'      => 'select',
			'choices'   => BoldThemesFramework::$customize_fonts
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_button_font' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_button_font' );


// BUTTON FONT WEIGHT

BoldThemes_Customize_Default::$data['default_button_weight'] = 'default';

if ( ! function_exists( 'boldthemes_customize_default_button_weight' ) ) {
	function boldthemes_customize_default_button_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_button_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_button_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_button_weight', array(
			'label'     => esc_html__( 'Button Font Weight', 'ippsum' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_button_weight]',
			'priority'  => 102,
			'type'      => 'select',
			'choices'   => array(
				'default'	=> esc_html__( 'Default', 'ippsum' ),
				'thin' 		=> esc_html__( 'Thin', 'ippsum' ),
				'lighter' 	=> esc_html__( 'Lighter', 'ippsum' ),
				'light' 	=> esc_html__( 'Light', 'ippsum' ),
				'normal' 	=> esc_html__( 'Normal', 'ippsum' ),
				'medium' 	=> esc_html__( 'Medium', 'ippsum' ),
				'semi-bold' => esc_html__( 'Semi bold', 'ippsum' ),
				'bold' 		=> esc_html__( 'Bold', 'ippsum' ),
				'bolder' 	=> esc_html__( 'Bolder', 'ippsum' ),
				'black' 	=> esc_html__( 'Black', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_button_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_button_weight' );


// MENU WEIGHT

BoldThemes_Customize_Default::$data['default_menu_weight'] = 'default';

if ( ! function_exists( 'boldthemes_customize_default_menu_weight' ) ) {
	function boldthemes_customize_default_menu_weight( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[default_menu_weight]', array(
			'default'           => BoldThemes_Customize_Default::$data['default_menu_weight'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'default_menu_weight', array(
			'label'     => esc_html__( 'Menu Font Weight', 'ippsum' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[default_menu_weight]',
			'priority'  => 102,
			'type'      => 'select',
			'choices'   => array(
				'default'	=> esc_html__( 'Default', 'ippsum' ),
				'thin' 		=> esc_html__( 'Thin', 'ippsum' ),
				'lighter' 	=> esc_html__( 'Lighter', 'ippsum' ),
				'light' 	=> esc_html__( 'Light', 'ippsum' ),
				'normal' 	=> esc_html__( 'Normal', 'ippsum' ),
				'medium' 	=> esc_html__( 'Medium', 'ippsum' ),
				'semi-bold' => esc_html__( 'Semi bold', 'ippsum' ),
				'bold' 		=> esc_html__( 'Bold', 'ippsum' ),
				'bolder' 	=> esc_html__( 'Bolder', 'ippsum' ),
				'black' 	=> esc_html__( 'Black', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_default_menu_weight' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_default_menu_weight' );


// CAPITALIZE MAIN MENU

BoldThemes_Customize_Default::$data['capitalize_main_menu'] = false;
if ( ! function_exists( 'boldthemes_customize_capitalize_main_menu' ) ) {
	function boldthemes_customize_capitalize_main_menu( $wp_customize ) {
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]', array(
			'default'           => BoldThemes_Customize_Default::$data['capitalize_main_menu'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_checkbox'
		));
		$wp_customize->add_control( 'capitalize_main_menu', array(
			'label'     => esc_html__( 'Capitalize Menu Items', 'ippsum' ),
			'section'   => BoldThemesFramework::$pfx . '_typo_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[capitalize_main_menu]',
			'priority'  => 103,
			'type'      => 'checkbox'
		));
	}
}

add_action( 'customize_register', 'boldthemes_customize_capitalize_main_menu' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_capitalize_main_menu' );


// HIGHLIGHT CURRENT PAGE

BoldThemes_Customize_Default::$data['highlight_current_page'] = 'underline';

if ( ! function_exists( 'boldthemes_customize_highlight_current_page' ) ) {
	function boldthemes_customize_highlight_current_page( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[highlight_current_page]', array(
			'default'           => BoldThemes_Customize_Default::$data['highlight_current_page'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'highlight_current_page', array(
			'label'     => esc_html__( 'Highlight Current Page', 'ippsum' ),
			'section'  => BoldThemesFramework::$pfx . '_header_footer_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[highlight_current_page]',
			'priority'  => 100,
			'type'      => 'select',
			'choices'   => array(
				''			=> esc_html__( 'None', 'ippsum' ),
				'underline'	=> esc_html__( 'Underline', 'ippsum' ),
				'dot' 		=> esc_html__( 'Dot', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_highlight_current_page' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_highlight_current_page' );


// BORDER DETAILS BLOG

BoldThemes_Customize_Default::$data['border_detail'] = 'show';

if ( ! function_exists( 'boldthemes_customize_border_detail' ) ) {
	function boldthemes_customize_border_detail( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[border_detail]', array(
			'default'           => BoldThemes_Customize_Default::$data['border_detail'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'border_detail', array(
			'label'     => esc_html__( 'Show accent border below Media', 'ippsum' ),
			'section'  => BoldThemesFramework::$pfx . '_blog_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[border_detail]',
			'priority'  => 16,
			'type'      => 'select',
			'choices'   => array(
				''			=> esc_html__( 'Hide', 'ippsum' ),
				'show'		=> esc_html__( 'Show', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_border_detail' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_border_detail' );


// BORDER DETAILS SHOP

BoldThemes_Customize_Default::$data['border_shop_detail'] = 'show';

if ( ! function_exists( 'boldthemes_customize_border_shop_detail' ) ) {
	function boldthemes_customize_border_shop_detail( $wp_customize ) {

		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[border_shop_detail]', array(
			'default'           => BoldThemes_Customize_Default::$data['border_shop_detail'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'border_shop_detail', array(
			'label'     => esc_html__( 'Show accent border below Media', 'ippsum' ),
			'section'  => BoldThemesFramework::$pfx . '_shop_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[border_shop_detail]',
			'priority'  => 50,
			'type'      => 'select',
			'choices'   => array(
				''			=> esc_html__( 'Hide', 'ippsum' ),
				'show'		=> esc_html__( 'Show', 'ippsum' )
			)
		));
	}
}
add_action( 'customize_register', 'boldthemes_customize_border_shop_detail' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_border_shop_detail' );



/* Helper function */

if ( ! function_exists( 'ippsum_body_class' ) ) {
	function ippsum_body_class( $extra_class ) {
		if ( boldthemes_get_option( 'default_heading_weight' ) ) {
			$extra_class[] =  'btHeadingWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_heading_weight' ) );
		}
		if ( boldthemes_get_option( 'default_supertitle_weight' ) ) {
			$extra_class[] =  'btSupertitleWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_supertitle_weight' ) );
		}
		if ( boldthemes_get_option( 'default_subtitle_weight' ) ) {
			$extra_class[] =  'btSubtitleWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_subtitle_weight' ) );
		}
		if ( boldthemes_get_option( 'default_button_weight' ) ) {
			$extra_class[] =  'btButtonWeight' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'default_button_weight' ) );
		}
		if ( boldthemes_get_option( 'highlight_current_page' ) ) {
			$extra_class[] =  'btHighlightCurrentPage' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'highlight_current_page' ) );
		}
		if ( boldthemes_get_option( 'border_detail' ) ) {
			$extra_class[] =  'btBorderDetail' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'border_detail' ) );
		}
		if ( boldthemes_get_option( 'border_shop_detail' ) ) {
			$extra_class[] =  'btBorderShopDetail' . boldthemes_convert_param_to_camel_case ( boldthemes_get_option( 'border_shop_detail' ) );
		}
		return $extra_class;
	}
}