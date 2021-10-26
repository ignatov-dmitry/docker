<?php

// PRODUCT LIST HEADLINE SIZE
if ( ! function_exists( 'boldthemes_product_list_headline_size' ) ) {
	function boldthemes_product_list_headline_size ( ) {
		return 'small';
	}
}
add_filter( 'boldthemes_product_list_headline_size', 'boldthemes_product_list_headline_size' );

// PRODUCT HEADLINE DASH
if ( ! function_exists( 'boldthemes_product_list_headline_dash' ) ) {
	function boldthemes_product_list_headline_dash ( ) {
		return 'top';
	}
}
add_filter( 'boldthemes_product_list_headline_dash', 'boldthemes_product_list_headline_dash' );


// SINGLE PRODUCT SHARE
if ( ! function_exists( 'boldthemes_shop_share_settings' ) ) {
	function boldthemes_shop_share_settings ( ) {
		return array( 'xsmall', 'filled', 'circle' );
	}
}
add_filter( 'boldthemes_shop_share_settings', 'boldthemes_shop_share_settings' );


/**
 * Preloader HTML output
 */
 if ( ! function_exists( 'boldthemes_preloader_html' ) ) {
	function boldthemes_preloader_html() {
		if ( ! boldthemes_get_option( 'disable_preloader' ) ) { ?>
			<div id="btPreloader" class="btPreloader">
				<div class="animation">
					<div class="btLoaderText"><?php echo wp_kses_post( boldthemes_get_option( 'preloader_text' ) ); ?></div>
					<div class="btLoaderSpin">
							
							<svg version="1.1" id="L4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							  viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
							  <circle fill="#fff" stroke="none" cx="6" cy="50" r="6">
								<animate
							      attributeName="opacity"
							      dur="1s"
							      values="0;1;0"
							      repeatCount="indefinite"
							      begin="0.1"/>    
							  </circle>
							  <circle fill="#fff" stroke="none" cx="26" cy="50" r="6">
							    <animate
							      attributeName="opacity"
							      dur="1s"
							      values="0;1;0"
							      repeatCount="indefinite" 
							      begin="0.2"/>       
							  </circle>
							  <circle fill="#fff" stroke="none" cx="46" cy="50" r="6">
							    <animate
							      attributeName="opacity"
							      dur="1s"
							      values="0;1;0"
							      repeatCount="indefinite" 
							      begin="0.3"/>     
							  </circle>
							</svg>

					</div>
				</div>
			</div><!-- /.preloader -->
		<?php }
	}
}
