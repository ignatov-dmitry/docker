<?php

/**
 * Color schemes
 */

if ( ! function_exists( 'ippsum_color_schemes' ) ) {
	function ippsum_color_schemes( $color_scheme_arr ) {

		$theme_color_schemes = array();
		$theme_color_schemes[] = 'dark-skin;Light font, dark background;#ffffff;#000000';
		$theme_color_schemes[] = 'light-skin;Dark font, light background;#000000;#ffffff';
		
		$theme_color_schemes[] = 'accent-light-skin;Accent font, dark background (or details);' . boldthemes_get_option( 'accent_color' ) . ';#000000';
		$theme_color_schemes[] = 'accent-dark-skin;Accent font, light background (or details);' . boldthemes_get_option( 'accent_color' ) . ';#ffffff';
		$theme_color_schemes[] = 'light-accent-skin;Dark font, accent background (or details);#000000;' . boldthemes_get_option( 'accent_color' );
		$theme_color_schemes[] = 'dark-accent-skin;Light font, accent background (or details);#ffffff;' . boldthemes_get_option( 'accent_color' );
		
		$theme_color_schemes[] = 'alternate-light-skin;Alternate font, dark background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#000000';
		$theme_color_schemes[] = 'alternate-dark-skin;Alternate font, light background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#ffffff';
		$theme_color_schemes[] = 'light-alternate-skin;Dark font, alternate background (or details);#000000;' . boldthemes_get_option( 'alternate_color' );
		$theme_color_schemes[] = 'dark-alternate-skin;Light font, alternate background (or details);#ffffff;' . boldthemes_get_option( 'alternate_color' );

		$theme_color_schemes[] = 'gray-background;Dark font, gray background (or details);#181818;#f3f3f3';
		$theme_color_schemes[] = 'accent-gray-skin;Accent font, gray background (or details);' . boldthemes_get_option( 'accent_color' ) . ';#f1f1f1';

		$theme_color_schemes[] = 'alternate-accent-skin;Accent font, alternate background (or details);' . boldthemes_get_option( 'accent_color' ) . ';' . boldthemes_get_option( 'alternate_color' );
		$theme_color_schemes[] = 'accent-alternate-skin;Alternate font, accent background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';' . boldthemes_get_option( 'accent_color' );

		$theme_color_schemes[] = 'alternate-gray-skin;Alternate font, gray background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#f9f9f9';

		$theme_color_schemes[] = 'gray-accent-skin;Gray font, accent background (or details);#c3c3c3;' . boldthemes_get_option( 'accent_color' );
		$theme_color_schemes[] = 'gray-light-skin;Gray font, light background (or details);#8e8e8e;#ffffff';
		$theme_color_schemes[] = 'dark-gray-accent-skin;Dark gray font, accent background (or details);#707070;' . boldthemes_get_option( 'accent_color' );

		$theme_color_schemes[] = 'dark-rose-skin;Dark font, light pink background (or details);#181818;#fce7e7';
		$theme_color_schemes[] = 'accent-rose-skin;Accent font, light pink background (or details);' . boldthemes_get_option( 'accent_color' ) . ';#fce7e7';
		$theme_color_schemes[] = 'alternate-rose-skin;Alternate font, light pink background (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#fce7e7';
		$theme_color_schemes[] = 'accent-dark-gray-skin;Accent font, dark gray background (or details);' . boldthemes_get_option( 'accent_color' ) . ';#848484';

		return array_merge( $theme_color_schemes, $color_scheme_arr );
	}
}

/*

Black/White;#000;#fff
White/Black;#fff;#000
LightGray/Black;#e2e2e2;#000
Black/LightGray;#000;#e2e2e2
DarkGray/White;#333335;#fff
White/DarkGray;#fff;#333335

*/

/*
* set content width
*/
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Change number of related products
 */
if ( ! function_exists( 'boldthemes_change_number_related_products' ) ) {
	function boldthemes_change_number_related_products( $args ) {
		$args['posts_per_page'] = 4; // # of related products
		$args['columns'] = 4; // # of columns per row
		return $args;
	}
}

/**
 * Loop shop per page
 */
 
if ( ! function_exists( 'boldthemes_loop_shop_per_page' ) ) {
	function boldthemes_loop_shop_per_page( $cols ) {
		return 9;
	}
}

/**
 * Loop columns
 */
if ( ! function_exists( 'boldthemes_loop_shop_columns' ) ) {
	function boldthemes_loop_shop_columns() {
		return 3; // 3 products per row
	}
}