<?php

function anton_woocommerce_enqueue_scripts() {
	wp_enqueue_script( 'anton-woocommerce', get_template_directory_uri() . '/js/woocommerce.js', array( 'jquery', 'suggest' ), '20131022', true );
}
add_action( 'wp_enqueue_scripts', 'anton_woocommerce_enqueue_scripts' );


/**
 */
add_filter('woocommerce_add_to_cart_fragments',	'anton_fnc_woocommerce_header_add_to_cart_fragment' );

function anton_fnc_woocommerce_header_add_to_cart_fragment( $fragments ){
	global $woocommerce;

	$fragments['#cart .mini-cart-items'] =  sprintf(_n(' <span class="mini-cart-items"> %d  </span> ', ' <span class="mini-cart-items"> %d <em>items</em> </span> ', $woocommerce->cart->cart_contents_count, 'anton'), $woocommerce->cart->cart_contents_count);
 	$fragments['#cart .mini-cart .amount'] = trim( $woocommerce->cart->get_cart_total() );
    
    return $fragments;
}

/**
 * Mini Basket
 */
if(!function_exists('anton_fnc_minibasketent')){
    function anton_fnc_minibasketent( $style='' ){ 
        $template =  apply_filters( 'anton_fnc_minibasketent_template', anton_fnc_get_header_layout( '' )  );  
        
      //  if( $template == 'v4' ){
        //	$template = 'v3';
     //   }
       	
        return get_template_part( 'woocommerce/cart/mini-cart-button', $template ); 
    }
}
if(anton_fnc_theme_options("woo-show-minicart",true)){
	add_action( 'anton_template_header_right', 'anton_fnc_minibasketent', 30, 0 );
}
/******************************************************
 * 												   	  *
 * Hook functions applying in archive, category page  *
 *												      *
 ******************************************************/
function anton_template_woocommerce_main_container_class( $class ){ 
	if( is_product() ){
		$class .= ' '.  anton_fnc_theme_options('woocommerce-single-layout') ;
	}else if( is_product_category() || is_archive()  ){ 
		$class .= ' '.  anton_fnc_theme_options('woocommerce-archive-layout') ;
	}
	return $class;
}

add_filter( 'anton_template_woocommerce_main_container_class', 'anton_template_woocommerce_main_container_class' );
function anton_fnc_get_woocommerce_sidebar_configs( $configs='' ){

	global $post; 
	$right = null; $left = null; 

	if( is_product() ){
		$left  	=  anton_fnc_theme_options( 'woocommerce-single-left-sidebar', 'sidebar-default' ); 
		$right 	=  anton_fnc_theme_options( 'woocommerce-single-right-sidebar', 'sidebar-default' );
		$layout =  anton_fnc_theme_options( 'woocommerce-single-layout', 'mainright');  

	}else if( is_product_category() || is_archive() ){
		$left  	=  anton_fnc_theme_options( 'woocommerce-archive-left-sidebar', 'sidebar-default' ); 
		$right 	=  anton_fnc_theme_options( 'woocommerce-archive-right-sidebar', 'sidebar-default' );
		$layout =  anton_fnc_theme_options( 'woocommerce-archive-layout', 'mainright' ); 
	}

 
	return anton_fnc_get_layout_configs( $layout, $left, $right, $configs );
}

add_filter( 'anton_fnc_get_woocommerce_sidebar_configs', 'anton_fnc_get_woocommerce_sidebar_configs', 1, 1 );


function anton_woocommerce_breadcrumb_defaults( $args ){
	$bgimage = anton_fnc_theme_options('breadcrumb_image', '');
	if(!empty( $bgimage )){  
		$style = 'background-image:url(\''.($bgimage).'\'); background-position: top center;';
	}
	$estyle = !empty($style)? 'style="'.($style).'"':""; 

	$class_check = (!empty($style)) ? 'empty_bgimg' : 'not_empty_bgimg';

	$args['wrap_before'] = '<div class="pbr-breadscrumb pbr-woocommerce-breadcrumb '.esc_html($class_check).' " '.$estyle.'><div class="container"><ol class="breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>';
	$args['wrap_after'] = '</ol></div></div>';

	return $args;
}

add_filter( 'woocommerce_breadcrumb_defaults', 'anton_woocommerce_breadcrumb_defaults' );

add_action( 'anton_woo_template_main_before', 'woocommerce_breadcrumb', 30, 0 );
/**
 * Remove show page results which display on top left of listing products block.
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 10 );


function anton_fnc_woocommerce_after_shop_loop_start(){
	echo '<div class="products-bottom-wrap clearfix">';
}

add_action( 'woocommerce_after_shop_loop', 'anton_fnc_woocommerce_after_shop_loop_start', 1 );

function anton_fnc_woocommerce_after_shop_loop_after(){
	echo '</div>';
}

add_action( 'woocommerce_after_shop_loop', 'anton_fnc_woocommerce_after_shop_loop_after', 10000 );


/**
 * Wrapping all elements are wrapped inside Div Container which rendered in woocommerce_before_shop_loop hook
 */
function woocommerce_before_shop_loop_start(){
	echo '<div class="products-top-wrap clearfix">';
}

function woocommerce_before_shop_loop_end(){
	echo '</div>';
}


add_action( 'woocommerce_before_shop_loop', 'woocommerce_before_shop_loop_start' , 0 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_before_shop_loop_end' , 1000 );


function anton_fnc_woocommerce_display_modes(){
	$woo_display = 'grid';

    if (isset($_GET['display'])){
        $woo_display = $_GET['display'];
    }
    echo '<form class="display-mode" method="get">';
        echo '<button class="btn '.($woo_display == 'grid' ? 'active' : '').'" value="grid" name="display" type="submit"><i class="icons-grid"></i></button>';   
        echo '<button class="btn '.($woo_display == 'list' ? 'active' : '').'" value="list" name="display" type="submit"><i class="icons-list"></i></button>';   
        // Keep query string vars intact
        foreach ( $_GET as $key => $val ) {
            if ( 'display' === $key || 'submit' === $key ) {
                continue;
            }
            if ( is_array( $val ) ) {
                foreach( $val as $innerVal ) {
                    echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
                }

            } else {
                echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
            }
        }
    echo '</form>';
 
}
add_action( 'woocommerce_before_shop_loop', 'anton_fnc_woocommerce_display_modes' , 10 );


/**
 * Processing hook layout content
 */
function anton_fnc_layout_main_class( $class ){
	$sidebar = anton_fnc_theme_options( 'woo-sidebar-show', 1 ) ;
	if( is_single() ){
		$sidebar = anton_fnc_theme_options('woo-single-sidebar-show'); ;
	}
	else {
		$sidebar = anton_fnc_theme_options('woo-sidebar-show'); 
	}

	if( $sidebar ){
		return $class;
	}

	return 'col-lg-12 col-md-12 col-xs-12';
}
add_filter( 'anton_woo_layout_main_class', 'anton_fnc_layout_main_class', 4 );


/**
 *
 */
function wpopal_fnc_woocommerce_archive_image(){ 
	if ( is_tax( array( 'product_cat', 'product_tag' ) ) && get_query_var( 'paged' ) == 0 ) { 
		$thumb =  get_woocommerce_term_meta( get_queried_object()->term_id, 'thumbnail_id', true ) ;

		if( $thumb ){
			$img = wp_get_attachment_image_src( $thumb, 'full' ); 
		
			echo '<p class="category-banner"><img src="'.esc_url_raw( $img[0]).'"></p>'; 
		}
	}
}
add_action( 'woocommerce_archive_description', 'wpopal_fnc_woocommerce_archive_image', 9 );
/**


 
	/**
	 *
	 */
	function anton_fncr_woocommerce_single_product_summary_outer_promotions(){
		global $product ; 

		$post_id = $product->get_id(); 

		$wfg_enabled 	 = get_post_meta( $post_id, '_wfg_single_gift_enabled', true );
		$allowed 		 = get_post_meta( $post_id, '_wfg_single_gift_allowed', true );
		$products 		 = get_post_meta( $post_id, '_wfg_single_gift_products', true );

	  ?>
	  <?php if( $wfg_enabled && $products ) : ?>
	     <div role="alert" class="productinfo-free-gift alert alert-danger media">
	     	<div class="gifts-icon pull-left"><i class="fa fa-gift fa-2x"></i></div>
	     	<div class="gift-content media-body">
		     	<h5><?php esc_html__( 'Gifts', 'anton' ); ?></h5>
		  	 	<ul class="list-unstyled">
		  	 		<?php foreach( $products as $product_id ) :
		  	 			$_product = get_product( $product_id );
		  	 		?>
		  	 		<li class="product-gift">
		  	 			<i class="fa fa-check-square"></i>
		  	 			<?php esc_html__('Free', 'anton'); ?> <a href="<?php echo esc_url( get_permalink( $product_id ) ); ?>"><?php echo get_the_title($product_id); ?></a> - <?php echo trim( $_product->get_price_html() ); ?>
		  	 		</li>
		  	 		<?php endforeach; ?>
		  	 		 
		  	 	</ul>	
	  		</div>
    	</div>
    	<?php endif; ?>
	 	 
	<?php }

	add_action( 'woocommerce_single_product_summary', 'anton_fncr_woocommerce_single_product_summary_outer_promotions', 99 );


    add_filter( 'yith_wcwl_button_label',          'anton_fnc_woocomerce_icon_wishlist'  );
    add_filter( 'yith-wcwl-browse-wishlist-label', 'anton_fnc_woocomerce_icon_wishlist_add' );


    function anton_fnc_woocomerce_icon_wishlist( $value='' ){
    	return '<i class="icon-wishlist"></i><span>'.esc_html__('Wishlist', 'anton').'</span>';
    }

    function anton_fnc_woocomerce_icon_wishlist_add(){
    	return '<i class="icon-wishlist"></i><span>'.esc_html__('Wishlist', 'anton').'</span>';
    }


remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'pbrthemer_woocommerce_output_related_products', 'woocommerce_output_related_products', 20 );

/**
 * Show/Hide related, upsells products
 */
function anton_woocommerce_related_upsells_products($located, $template_name) {
	$options      = get_option('pbr_theme_options');
	$content_none = get_template_directory() . '/woocommerce/content-none.php';

	if ( 'single-product/related.php' == $template_name ) {
		if ( isset( $options['wc_show_related'] ) && 
			( 1 == $options['wc_show_related'] ) ) {
			$located = $content_none;
		}
	} elseif ( 'single-product/up-sells.php' == $template_name ) {
		if ( isset( $options['wc_show_upsells'] ) && 
			( 1 == $options['wc_show_upsells'] ) ) {
			$located = $content_none;
		}
	}

	return apply_filters( 'anton_woocommerce_related_upsells_products', $located, $template_name );
}

add_filter( 'wc_get_template', 'anton_woocommerce_related_upsells_products', 10, 2 );

/**
 * Number of products per page
 */
function anton_woocommerce_shop_per_page($number) {
	$value = anton_fnc_theme_options('woo-number-page', get_option('posts_per_page'));
	if ( is_numeric( $value ) && $value ) {
		$number = absint( $value );
	}
	return $number;
}

add_filter( 'loop_shop_per_page', 'anton_woocommerce_shop_per_page' );

/**
 * Number of products per row
 */
function anton_woocommerce_shop_columns($number) {
	$value = anton_fnc_theme_options('wc_itemsrow', 3);
	if ( in_array( $value, array(2, 3, 4, 6) ) ) {
		$number = $value;
	}
	return $number;
}

add_filter( 'loop_shop_columns', 'anton_woocommerce_shop_columns' );

function anton_fnc_woocommerce_share_box() {
	if( anton_fnc_theme_options('wc_show_share_social', true) && function_exists('pbr_themer_get_template_part') ){
		pbr_themer_get_template_part( 'sharebox' );
	}
}
add_filter( 'woocommerce_single_product_summary', 'anton_fnc_woocommerce_share_box', 100 );

function anton_fnc_woocommerce_product_thumbnails_columns($number) {
	return 4;
}
add_filter('woocommerce_product_thumbnails_columns', 'anton_fnc_woocommerce_product_thumbnails_columns');

function anton_woocommerce_show_product_thumbnails( $layout ){ 
	$layout = $layout.'-h';
	return $layout;
}

add_filter( 'pbrthemer_woocommerce_show_product_thumbnails', 'anton_woocommerce_show_product_thumbnails'  );

function anton_woocommerce_show_product_images( $layout ){ 
	$layout = $layout.'-h';
	return $layout;
}

add_filter( 'pbrthemer_woocommerce_show_product_images', 'anton_woocommerce_show_product_images'  );

function anton_single_product_config( $productConfig ){ 
	return array(     
	  'product_enablezoom'         => 1,
	  'product_zoommode'           => 'inner',
	  'product_zoomeasing'         => 1,
	  'product_zoomlensshape'      => "round",
	  'product_zoomlenssize'       => "150",
	  'product_zoomgallery'        => 0,
	  'enable_product_customtab'   => 0,
	  'product_customtab_name'     => '',
	  'product_customtab_content'  => '',
	  'product_related_column'     => 0,        
	);
}
add_filter('pbrthemer_single_product_config', 'anton_single_product_config' );

add_action( 'woocommerce_single_product_summary', 'anton_pre_tag_short_description', 19.9999 );
if ( ! function_exists( 'anton_pre_tag_short_description' ) ) {

	function anton_pre_tag_short_description() {
		?>
			<div class="product_ctn_bottom">
		<?php
	}
}

add_action( 'woocommerce_single_product_summary', 'anton_pre_tag_share', 99.9999 );
if ( ! function_exists( 'anton_pre_tag_share' ) ) {

	function anton_pre_tag_share() {
		?>
			<div class="product_ctn_share">
		<?php
	}
}


add_action( 'woocommerce_single_product_summary', 'anton_after_tag_short_description', 10.0001 );
add_action( 'woocommerce_single_product_summary', 'anton_after_tag_short_description', 40.0001 );
if ( ! function_exists( 'anton_after_tag_short_description' ) ) {

	function anton_after_tag_short_description() {
		?>
			</div>
		<?php
	}
}

function anton_woocommerce_get_product_thumbnail( $size = 'shop_catalog', $deprecated1 = 0, $deprecated2 = 0 ) {
	global $post;
	$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );

	if ( has_post_thumbnail() ) {
		$props = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
		return get_the_post_thumbnail( $post->ID, $image_size, array(
			'title'	 => $post->post_title,
			'alt'    => $post->post_title,
		) );
	} elseif ( wc_placeholder_img_src() ) {
		return wc_placeholder_img( $image_size );
	}
}

function anton_woocommerce_template_loop_product_thumbnail() {
	echo anton_woocommerce_get_product_thumbnail();
}