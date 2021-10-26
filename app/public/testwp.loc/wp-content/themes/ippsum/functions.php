<?php

// Register action/filter callbacks

add_action( 'after_setup_theme', 'ippsum_register_menus' );
add_action( 'wp_enqueue_scripts', 'ippsum_enqueue_scripts_styles' );
add_action( 'tgmpa_register', 'ippsum_register_plugins' );
add_action( 'wp_enqueue_scripts', 'ippsum_load_fonts' );
add_action( 'admin_init', 'ippsum_theme_add_editor_styles' );
add_action( 'admin_enqueue_scripts', 'ippsum_load_fonts' );
add_action( 'admin_enqueue_scripts', 'ippsum_load_admin_style' );

add_action( 'widgets_init', 'ippsum_widget_area' );

add_filter( 'bt_bb_color_scheme_arr', 'ippsum_color_schemes' );
add_filter( 'body_class', 'ippsum_body_class' );
add_filter( 'tiny_mce_before_init', 'ippsum_editor_dynamic_styles' );

add_theme_support( 'customize-selective-refresh-widgets' );

// callbacks

/**
 * Register navigation menus
 */
if ( ! function_exists( 'ippsum_register_menus' ) ) {
	function ippsum_register_menus() {
		register_nav_menus( array (
			'primary' => esc_html__( 'Primary Menu', 'ippsum' ),
			'footer'  => esc_html__( 'Footer Menu', 'ippsum' )
		));
	}
}

/**
 * Enqueue scripts and styles
 */
if ( ! function_exists( 'ippsum_enqueue_scripts_styles' ) ) {
	function ippsum_enqueue_scripts_styles() {
		
		BoldThemesFramework::$crush_vars_def = array( 'accentColor', 'alternateColor', 'bodyFont', 'menuFont', 'headingFont', 'headingSuperTitleFont', 'headingSubTitleFont', 'buttonFont', 'logoHeight' );
		
		// Custom accent color and font style
		$boldthemes_add_override_css = false;		
		
		$accent_color = boldthemes_get_option( 'accent_color' );
		$alternate_color = boldthemes_get_option( 'alternate_color' );
		$body_font = urldecode( boldthemes_get_option( 'body_font' ) );
		$menu_font = urldecode( boldthemes_get_option( 'menu_font' ) );
		$heading_font = urldecode( boldthemes_get_option( 'heading_font' ) );
		$heading_supertitle_font = urldecode( boldthemes_get_option( 'heading_supertitle_font' ) );
		$heading_subtitle_font = urldecode( boldthemes_get_option( 'heading_subtitle_font' ) );
		$button_font = urldecode( boldthemes_get_option( 'button_font' ) );
		$logo_height = urldecode( boldthemes_get_option( 'logo_height' ) );

		if ( $accent_color != '' ) {
			BoldThemesFramework::$crush_vars['accentColor'] = $accent_color;
			if ( $accent_color != BoldThemes_Customize_Default::$data['accent_color'] ) {
				$boldthemes_add_override_css = true;
			}
		}

		if ( $alternate_color != '' ) {
			BoldThemesFramework::$crush_vars['alternateColor'] = $alternate_color;
			if ( $alternate_color != BoldThemes_Customize_Default::$data['alternate_color'] ) {
				$boldthemes_add_override_css = true;
			}
		}
		if ( $body_font != '' ) {
			if ( $body_font == 'no_change' ) {
				$body_font = BoldThemes_Customize_Default::$data['body_font'];
			}
			BoldThemesFramework::$crush_vars['bodyFont'] = $body_font;
			if ( $body_font != BoldThemes_Customize_Default::$data['body_font'] ) {
				$boldthemes_add_override_css = true;
			}
		}

		if ( $menu_font != '' ) {
			if ( $menu_font == 'no_change' ) {
				$menu_font = BoldThemes_Customize_Default::$data['menu_font'];
			}
			BoldThemesFramework::$crush_vars['menuFont'] = $menu_font;
			if ( $menu_font != BoldThemes_Customize_Default::$data['menu_font'] ) {
				$boldthemes_add_override_css = true;
			}
		}

		if ( $heading_font != '' ) {
			if ( $heading_font == 'no_change' ) {
				$heading_font = BoldThemes_Customize_Default::$data['heading_font'];
			}
			BoldThemesFramework::$crush_vars['headingFont'] = $heading_font;
			if ( $heading_font != BoldThemes_Customize_Default::$data['heading_font'] ) {
				$boldthemes_add_override_css = true;
			}
		}

		if ( $heading_supertitle_font != '' ) {
			if ( $heading_supertitle_font == 'no_change' ) {
				$heading_supertitle_font = BoldThemes_Customize_Default::$data['heading_supertitle_font'];
			}
			BoldThemesFramework::$crush_vars['headingSuperTitleFont'] = $heading_supertitle_font;
			if ( $heading_supertitle_font != BoldThemes_Customize_Default::$data['heading_supertitle_font'] ) {
				$boldthemes_add_override_css = true;
			}
		}

		if ( $heading_subtitle_font != '' ) {
			if ( $heading_subtitle_font == 'no_change' ) {
				$heading_subtitle_font = BoldThemes_Customize_Default::$data['heading_subtitle_font'];
			}
			BoldThemesFramework::$crush_vars['headingSubTitleFont'] = $heading_subtitle_font;
			if ( $heading_subtitle_font != BoldThemes_Customize_Default::$data['heading_subtitle_font'] ) {
				$boldthemes_add_override_css = true;
			}
		}

		if ( $button_font != '' ) {
			if ( $button_font == 'no_change' ) {
				$button_font = BoldThemes_Customize_Default::$data['button_font'];
			}
			BoldThemesFramework::$crush_vars['buttonFont'] = $button_font;
			if ( $button_font != BoldThemes_Customize_Default::$data['button_font'] ) {
				$boldthemes_add_override_css = true;
			}
		}
		
		if ( $logo_height != '' ) {
			BoldThemesFramework::$crush_vars['logoHeight'] = $logo_height;
			if ( $logo_height != BoldThemes_Customize_Default::$data['logo_height'] ) {
				$boldthemes_add_override_css = true;
			}
		}

		// Create override file without local settings

		if ( function_exists( 'boldthemes_csscrush_file' ) ) {
			boldthemes_csscrush_file( get_theme_file_path( 'style.crush.css' ), array( 'source_map' => true, 'minify' => false, 'output_file' => 'style', 'formatter' => 'block', 'boilerplate' => false, 'vars' => BoldThemesFramework::$crush_vars, 'plugins' => array( 'loop', 'ease' ), 'vendor_target' => 'none' ) );
		}

		// custom theme css
		wp_enqueue_style( 'ippsum-style', get_parent_theme_file_uri( 'style.css' ), array(), false, 'screen' );
		wp_enqueue_style( 'ippsum-print', get_parent_theme_file_uri( 'print.css' ), array(), false, 'print' );
		wp_enqueue_style( 'ippsum-edge', get_parent_theme_file_uri( 'edge.css' ), array(), false, 'screen' );

		// external js
		wp_enqueue_script( 'fancySelect', get_parent_theme_file_uri( 'framework/js/fancySelect.js' ), array( 'jquery' ), '', true );

		// default theme js
		wp_enqueue_script( 'ippsum-header-misc', get_parent_theme_file_uri( 'framework/js/header.misc.js' ), array( 'jquery' ), '', true );
		wp_enqueue_script( 'ippsum-misc', get_parent_theme_file_uri( 'framework/js/misc.js' ), array( 'jquery' ), '', true );
		
		// custom theme js
		wp_enqueue_script( 'ippsum-custom', get_parent_theme_file_uri( 'js/custom.js' ), array( 'jquery' ), '', true );
		
		wp_add_inline_script( 'ippsum-header-misc', boldthemes_set_global_uri(), 'before' );
		
		if ( file_exists( get_parent_theme_file_path( 'css-override.php' ) ) && $boldthemes_add_override_css ) {
			require_once( get_parent_theme_file_path( 'css-override.php' ) );
			wp_add_inline_style( 'ippsum-style', $css_override );
		}
		
		if ( file_exists( get_parent_theme_file_path( 'icons.php' ) ) ) {
			require_once( get_parent_theme_file_path( 'icons.php' ) );
			wp_add_inline_style( 'ippsum-style', $icons );
		}

		if ( boldthemes_get_option( 'custom_js' ) != '' ) {
			wp_add_inline_script( 'ippsum-misc', boldthemes_get_option( 'custom_js' ) );
		}	
		
	}
}

/**
 * Register the required plugins for this theme
 */
if ( ! function_exists( 'ippsum_register_plugins' ) ) {
	function ippsum_register_plugins() {

		$plugins = array(
	 
			array(
				'name'               => esc_html__( 'Ippsum', 'ippsum' ), // The plugin name.
				'slug'               => 'ippsum', // The plugin slug (typically the folder name).
				'source'             => get_parent_theme_file_path( 'plugins/ippsum.zip' ), // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '1.0.3', ///!do not change this comment! E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			),
			array(
				'name'               => esc_html__( 'Cost Calculator', 'ippsum' ), // The plugin name.
				'slug'               => 'bt' . '_cost_calculator', // The plugin slug (typically the folder name).
				'source'             => get_parent_theme_file_path( 'plugins/' . 'bt' . '_cost_calculator.zip' ), // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '2.2.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			),
			array(
				'name'               => esc_html__( 'Bold Timeline Lite', 'ippsum' ), // The plugin name.
				'slug'               => 'bold-timeline-lite', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'Bold Builder', 'ippsum' ), // The plugin name.
				'slug'               => 'bold-page-builder', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'BoldThemes WordPress Importer', 'ippsum' ), // The plugin name.
				'slug'               => 'bt' . '_wordpress_importer', // The plugin slug (typically the folder name).
				'source'             => get_parent_theme_file_path( 'plugins/' . 'bt' . '_wordpress_importer.zip' ), // The plugin source.
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '2.6.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			),
			array(
				'name'               => esc_html__( 'Meta Box', 'ippsum' ), // The plugin name.
				'slug'               => 'meta-box', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'Contact Form 7', 'ippsum' ), // The plugin name.
				'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			),
			array(
				'name'               => esc_html__( 'Lightweight Sidebar Manager', 'ippsum' ), // The plugin name.
				'slug'               => 'sidebar-manager', // The plugin slug (typically the folder name).
				'required'           => true, // If false, the plugin is only 'recommended' instead of required.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			)
		);
	 
		$config = array(
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'ippsum' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'ippsum' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'ippsum' ), // %s = plugin name.
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'ippsum' ),
				'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'ippsum' ), // %1$s = plugin name(s).
				'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'ippsum' ), // %1$s = plugin name(s).
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'ippsum' ), // %1$s = plugin name(s).
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'ippsum' ), // %1$s = plugin name(s).
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'ippsum' ), // %1$s = plugin name(s).
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'ippsum' ), // %1$s = plugin name(s).
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'ippsum' ), // %1$s = plugin name(s).
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'ippsum' ), // %1$s = plugin name(s).
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'ippsum' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'ippsum' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'ippsum' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'ippsum' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'ippsum' ), // %s = dashboard link.
				'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
			)
		);
	 
		tgmpa( $plugins, $config );
	 
	}
}

/**
 * Loads custom Google Fonts
 */
if ( ! function_exists( 'ippsum_load_fonts' ) ) {
	function ippsum_load_fonts() {
		$body_font = urldecode( boldthemes_get_option( 'body_font' ) );
		$heading_font = urldecode( boldthemes_get_option( 'heading_font' ) );
		$menu_font = urldecode( boldthemes_get_option( 'menu_font' ) );
		$heading_subtitle_font = urldecode( boldthemes_get_option( 'heading_subtitle_font' ) );
		$heading_supertitle_font = urldecode( boldthemes_get_option( 'heading_supertitle_font' ) );
		$button_font = urldecode( boldthemes_get_option( 'button_font' ) );
		
		$font_families = array();
		
		if ( $body_font != '' ) {
			if ( $body_font == 'no_change' ) {
				$body_font = BoldThemes_Customize_Default::$data['body_font'];
			}
			$font_families[] = $body_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Lato font: on or off', 'ippsum' ) ) {
				$font_families[] = 'Lato' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}
		
		if ( $heading_font != '' ) {
			if ( $heading_font == 'no_change' ) {
				$heading_font = BoldThemes_Customize_Default::$data['heading_font'];
			}
			$font_families[] = $heading_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Lato font: on or off', 'ippsum' ) ) {
				$font_families[] = 'Lato' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}
		
		if ( $menu_font != '' ) {
			if ( $menu_font == 'no_change' ) {
				$menu_font = BoldThemes_Customize_Default::$data['menu_font'];
			}
			$font_families[] = $menu_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Lato font: on or off', 'ippsum' ) ) {
				$font_families[] = 'Lato' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}

		if ( $heading_subtitle_font != '' ) {
			if ( $heading_subtitle_font == 'no_change' ) {
				$heading_subtitle_font = BoldThemes_Customize_Default::$data['heading_subtitle_font'];
			}
			$font_families[] = $heading_subtitle_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Lato font: on or off', 'ippsum' ) ) {
				$font_families[] = 'Lato' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}

		if ( $heading_supertitle_font != '' ) {
			if ( $heading_supertitle_font == 'no_change' ) {
				$heading_supertitle_font = BoldThemes_Customize_Default::$data['heading_supertitle_font'];
			}
			$font_families[] = $heading_supertitle_font . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
		} else {
			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Lato font: on or off', 'ippsum' ) ) {
				$font_families[] = 'Lato' . ':100,200,300,400,500,600,700,800,900,100italic,200italic,300italic,400italic,500italic,600italic,700italic,800italic,900italic';
			}
		}

		if ( $button_font != '' ) {
			if ( $button_font == 'no_change' ) {
				$button_font = BoldThemes_Customize_Default::$data['button_font'];
			}
			$font_families[] = $button_font . ':600';
		} else {
			/*
			Translators: If there are characters in your language that are not supported
			by chosen font(s), translate this to 'off'. Do not translate into your own language.
			 */
			if ( 'off' !== _x( 'on', 'Lato font: on or off', 'ippsum' ) ) {
				$font_families[] = 'Lato' . ':600';
			}
		}

		if ( count( $font_families ) > 0 ) {
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);
			$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
			wp_enqueue_style( 'ippsum-fonts', $font_url, array(), '1.0.0' );
			add_editor_style( $font_url );
		}
	}
}

if ( ! function_exists( 'ippsum_load_admin_style' ) ) {
	function ippsum_load_admin_style() {
		if ( function_exists( 'boldthemes_csscrush_file' ) ) {
			boldthemes_csscrush_file( get_theme_file_path( 'admin-style.crush.css' ), array( 'source_map' => true, 'minify' => false, 'output_file' => 'admin-style', 'formatter' => 'block', 'boilerplate' => false, 'vars' => BoldThemesFramework::$crush_vars, 'plugins' => array( 'loop', 'ease' ) ) );
		}
		wp_enqueue_style( 'ippsum-admin-style', get_parent_theme_file_uri( 'admin-style.css' ) );
		require_once( get_parent_theme_file_path( 'admin-style.php' ) );
		wp_add_inline_style( 'ippsum-admin-style', $admin_style );
	}
}

/**
 * TinyMCE style
 */
if ( ! function_exists( 'ippsum_theme_add_editor_styles' ) ) {
	function ippsum_theme_add_editor_styles() {
	    add_editor_style( 'admin-style.css' );
	}
}



/**
 * SVG Icon array
 */
if ( ! function_exists( 'bt_bb_get_svg_icons_param_array' ) ) {
	function bt_bb_get_svg_icons_param_array() {
	    return array(
			esc_html__( 'No icon', 'ippsum' ) 					=> 'no_icon',
			esc_html__( 'Abstract ai', 'ippsum' ) 				=> 'abstract_ai',
			esc_html__( 'Abstract component', 'ippsum' ) 		=> 'abstract_component',
			esc_html__( 'Accounting', 'ippsum' ) 				=> 'accounting',
			esc_html__( 'Achievement', 'ippsum' ) 				=> 'achievement',
			esc_html__( 'Action', 'ippsum' ) 					=> 'action',
			esc_html__( 'Action List', 'ippsum' ) 				=> 'action_list',
			esc_html__( 'Advertising', 'ippsum' ) 				=> 'advertising',
			esc_html__( 'Agreement 01', 'ippsum' ) 			=> 'agreement_57',
			esc_html__( 'Agreement 02', 'ippsum' ) 			=> 'agreement_60',
			esc_html__( 'Ai', 'ippsum' ) 						=> 'ai',
			esc_html__( 'Analyse', 'ippsum' ) 					=> 'analyse',
			esc_html__( 'Application', 'ippsum' ) 				=> 'application',
			esc_html__( 'Artboard 01', 'ippsum' ) 				=> 'artboard_34',
			esc_html__( 'Artboard 02', 'ippsum' ) 				=> 'artboard_62',
			esc_html__( 'Bar chart', 'ippsum' ) 				=> 'bar_chart',
			esc_html__( 'Big data', 'ippsum' ) 				=> 'big_data',
			esc_html__( 'Bot', 'ippsum' ) 						=> 'bot',
			esc_html__( 'Box solution', 'ippsum' ) 			=> 'box_solution',
			esc_html__( 'Brainstorm', 'ippsum' ) 				=> 'brainstorm',
			esc_html__( 'Business strategy', 'ippsum' ) 		=> 'business_strategy',
			esc_html__( 'Capital', 'ippsum' ) 					=> 'capital',
			esc_html__( 'Classificator', 'ippsum' ) 			=> 'classificator',
			esc_html__( 'Click', 'ippsum' ) 					=> 'click',
			esc_html__( 'Collaboration', 'ippsum' ) 			=> 'collaboration',
			esc_html__( 'Contract', 'ippsum' ) 				=> 'contract',
			esc_html__( 'Defence', 'ippsum' ) 					=> 'defence',
			esc_html__( 'Direction', 'ippsum' ) 				=> 'direction',
			esc_html__( 'Discussion', 'ippsum' ) 				=> 'discussion',
			esc_html__( 'Face detection', 'ippsum' ) 			=> 'face_detection',
			esc_html__( 'Features', 'ippsum' ) 				=> 'features',
			esc_html__( 'filter', 'ippsum' ) 					=> 'filter',
			esc_html__( 'Global data', 'ippsum' ) 				=> 'global_data',
			esc_html__( 'Goal', 'ippsum' ) 					=> 'goal',
			esc_html__( 'Grant', 'ippsum' ) 					=> 'grant',
			esc_html__( 'Image recognition', 'ippsum' ) 		=> 'image_recognition',
			esc_html__( 'Investment strategy', 'ippsum' ) 		=> 'investment_strategy',
			esc_html__( 'Licence', 'ippsum' ) 					=> 'licence',
			esc_html__( 'Link', 'ippsum' ) 					=> 'link',
			esc_html__( 'Mail Management', 'ippsum' ) 			=> 'mail_management',
			esc_html__( 'Mobile', 'ippsum' ) 					=> 'mobile',
			esc_html__( 'Money flow', 'ippsum' ) 				=> 'money_flow',
			esc_html__( 'Network', 'ippsum' ) 					=> 'network',
			esc_html__( 'Object recognition', 'ippsum' ) 		=> 'object_recognition',
			esc_html__( 'Offical letter', 'ippsum' ) 			=> 'offical_letter',
			esc_html__( 'Password', 'ippsum' ) 				=> 'password',
			esc_html__( 'Performance', 'ippsum' ) 				=> 'performance',
			esc_html__( 'Pie chart', 'ippsum' ) 				=> 'pie_chart',
			esc_html__( 'Product', 'ippsum' ) 					=> 'product',
			esc_html__( 'Puzzle', 'ippsum' ) 					=> 'puzzle',
			esc_html__( 'Responsive', 'ippsum' ) 				=> 'responsive',
			esc_html__( 'Round diagram', 'ippsum' ) 			=> 'round_diagram',
			esc_html__( 'Savings', 'ippsum' ) 					=> 'savings',
			esc_html__( 'Scalable', 'ippsum' ) 				=> 'scalable',
			esc_html__( 'Scheme', 'ippsum' ) 					=> 'scheme',
			esc_html__( 'Seo', 'ippsum' ) 						=> 'seo',
			esc_html__( 'Shop', 'ippsum' ) 					=> 'shop',
			esc_html__( 'Statistics', 'ippsum' ) 				=> 'statistics',
			esc_html__( 'Strategy', 'ippsum' ) 				=> 'strategy',
			esc_html__( 'Team meeting', 'ippsum' ) 			=> 'team_meeting',
			esc_html__( 'Team work', 'ippsum' ) 				=> 'team_work',
			esc_html__( 'Traffic', 'ippsum' ) 					=> 'traffic'
		);
	}
}

/* Get icon HTML */

if ( ! function_exists( 'bt_bb_get_svg_icon_html' ) ) {
	function bt_bb_get_svg_icon_html( $icon ) {				
		ob_start();
		require( dirname(__FILE__) . '/bold-page-builder/content_elements_misc/svg/' . $icon . '.svg' );
		return ob_get_clean();							
	}	
}



/**
 * Add FontAwesome to TinyMCE editor
 */
if ( ! function_exists( 'ippsum_editor_dynamic_styles' ) ) {
	function ippsum_editor_dynamic_styles( $mceInit ) {
	    $styles = '@font-face{font-family:\"FontAwesome\";src:url(\"' . get_parent_theme_file_uri( 'fonts/FontAwesome/FontAwesome.woff' ) . '\") format(\"woff\"),url(\"' . get_parent_theme_file_uri( 'fonts/FontAwesome/FontAwesome.ttf' ) . '\") format(\"truetype\");}';
	    if ( isset( $mceInit['content_style'] ) ) {
	        $mceInit['content_style'] .= ' ' . ( $styles ) . ' ';
	    } else {
	        $mceInit['content_style'] = $styles . ' ';
	    }
	    return $mceInit;
	}
}

/**
 * Add class to body
 *
 * @return string 
 */
if ( ! function_exists( 'ippsum_body_class' ) ) {
	function ippsum_body_class( $extra_class ) {
		if ( boldthemes_get_option( 'heading_style' ) ) {
			$extra_class[] =  'btHeadingStyle_' . boldthemes_get_option( 'heading_style' );
		}
		if ( boldthemes_get_option( 'default_heading_weight' ) ) {
			$extra_class[] =  'btHeadingWeight_' . boldthemes_get_option( 'default_heading_weight' );
		}
		if ( boldthemes_get_option( 'default_supertitle_weight' ) ) {
			$extra_class[] =  'btSupertitleWeight_' . boldthemes_get_option( 'default_supertitle_weight' );
		}
		if ( boldthemes_get_option( 'default_subtitle_weight' ) ) {
			$extra_class[] =  'btSubtitleWeight_' . boldthemes_get_option( 'default_subtitle_weight' );
		}
		if ( boldthemes_get_option( 'default_menu_weight' ) ) {
			$extra_class[] =  'btMenuWeight_' . boldthemes_get_option( 'default_menu_weight' );
		}
		if ( boldthemes_get_option( 'default_button_weight' ) ) {
			$extra_class[] =  'btButtonWeight_' . boldthemes_get_option( 'default_button_weight' );
		}
		if ( boldthemes_get_option( 'capitalize_main_menu' ) ) {
			$extra_class[] = 'btCapitalizeMainMenuItems';
		}
		if ( boldthemes_get_option( 'highlight_current_page' ) ) {
			$extra_class[] =  'btCurrentPage_' . boldthemes_get_option( 'highlight_current_page' );
		}
		if ( boldthemes_get_option( 'border_detail' ) ) {
			$extra_class[] =  'btBorderDetail_' . boldthemes_get_option( 'border_detail' );
		}
		if ( boldthemes_get_option( 'border_shop_detail' ) ) {
			$extra_class[] =  'btBorderShopDetail_' . boldthemes_get_option( 'border_shop_detail' );
		}
		return $extra_class;
	}
}

/**
 * Shop sidebar
 */
if ( ! function_exists( 'ippsum_widget_area' ) ) {
	function ippsum_widget_area() {
		if ( class_exists( 'woocommerce' ) ) {
			register_sidebar( array (
				'name' 			=> esc_html__( 'Shop Sidebar', 'ippsum' ),
				'id' 			=> 'bt_shop_sidebar',
				'description'   => 'WooCommerce sidebar',
				'before_widget' => '<div class="btBox %2$s">',
				'after_widget' 	=> '</div>',
				'before_title' 	=> '<h4><span>',
				'after_title' 	=> '</span></h4>',
			));
		}
	}
}

require_once( get_parent_theme_file_path( 'php/before_framework.php' ) );
require_once( get_parent_theme_file_path( 'framework/framework.php' ) );
require_once( get_parent_theme_file_path( 'php/config.php' ) );
require_once( get_parent_theme_file_path( 'php/after_framework.php' ) );