<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     EngoTheme <engotheme@gmail.com>
 * @copyright  Copyright (C) 2017 engotheme.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://engotheme.com
 * @support  http://engotheme.com
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if ( ! isset( $category ) ) {
	return;
}
$term = get_term_by( 'slug', $category, 'product_cat' );

if ( ! $term ) return;

if( isset( $image ) ) {
    $image = wp_get_attachment_image_src( $image, 'full' );
} else {
    $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_image_src( $thumbnail_id, 'full');
}

?>

<div class="widget <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
    <div class="widget-content">
        <div class="ocean-woo-category<?php echo esc_attr( isset( $content_position ) ? ' ' . $content_position : '' ) ?>">
        	<header class="entry-header">
        		<a href="<?php echo esc_url( get_term_link( $category, 'product_cat' ) ) ?>">
        			<img src="<?php echo esc_url_raw( $image[0] ); ?>" title="<?php echo esc_attr($term->name); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
        		</a>
        	</header>

        	<div class="entry-body">
        		<h3 class="title"><?php echo esc_html( $term->name ); ?></h3>
        		<?php if ( isset( $desc ) && $desc ) : ?>
	        		<span class="desc"><?php echo esc_html( $desc ) ?></span>
	        	<?php endif; ?>

	        	<?php if ( isset( $btn_item ) && $btn_item ) : ?>
	        		<a href="<?php echo esc_url( get_term_link( $category, 'product_cat' ) ) ?>" class="btn btn-banner"><?php esc_html_e( 'View all product', 'anton' ); ?></a>
	        	<?php endif; ?>
        	</div>
        </div>
    </div>
</div>