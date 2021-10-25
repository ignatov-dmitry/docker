<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb )) {

	$delimiter = '<span>/</span>';

	echo trim($wrap_before);

	$end = '' ;
	$title = '';

	foreach ( $breadcrumb as $key => $crumb ) {

		echo trim($before);
		echo '<li>';

		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
			echo '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>';
		} else {
			echo esc_html( $crumb[0] );
		}

		
		if( is_product() && ! empty( $crumb[1] ) && sizeof( $breadcrumb ) == $key + 2 ) {
			$title = esc_html__( 'Product detail', 'anton');
			$_tag = 'h2'; 
		}elseif(is_shop() || is_product_category() || is_product_tag() ){
			$title = esc_html__( 'All product', 'anton');
			$_tag = 'h1';
		}

		echo trim($after);
		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
			echo trim( $delimiter );
		}
		echo '</li>';

		$end = esc_html( $crumb[0] );
	}
	printf('<li class="active"><'.$_tag.' class="title-active page-title">%s</'.$_tag.'></li>', $title);
	echo trim($wrap_after);

}