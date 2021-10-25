<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// AUTO GENERATED - Do not modify or remove comment markers above or below:
if ( !function_exists( 'anton_child_fnc_theme_configurator_css' ) ):
    function anton_child_fnc_theme_configurator_css() {
        wp_enqueue_style( 'anton_child_css', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css');
    }
endif;
add_action( 'wp_enqueue_scripts', 'anton_child_fnc_theme_configurator_css', 999 );

// END ENQUEUE PARENT ACTION
