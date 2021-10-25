<?php
/* $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Engotheme Team <engotheme@gmail.com>
 * @copyright  Copyright (C) 2017 engotheme.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://engotheme.com
 * @support  http://engotheme.com.
 */
?>
<?php // wp_head(); ?>

<div id="product-<?php the_ID(); ?>" <?php post_class('product'); ?>>
    <div id="single-product" class="product-info woocommerce">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <?php
                    /**
                     * woocommerce_before_single_product_summary hook
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    //do_action( 'woocommerce_before_single_product_summary' );
                    wc_get_template( 'single-product/product-image-carousel.php' );
                ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="summary entry-summary">
                    <?php
                        /**
                        * woocommerce_single_product_summary hook
                        *
                        * @hooked woocommerce_template_single_title - 5
                        * @hooked woocommerce_template_single_rating - 10
                        * @hooked woocommerce_template_single_price - 10
                        * @hooked woocommerce_template_single_excerpt - 20
                        * @hooked woocommerce_template_single_add_to_cart - 30
                        * @hooked woocommerce_template_single_meta - 40
                        * @hooked woocommerce_template_single_sharing - 50
                        */
                        woocommerce_template_single_title();
                        woocommerce_template_single_rating();
                        woocommerce_template_single_price();
                        woocommerce_template_single_excerpt();
                        ?>
                        <div class="cart">
                            <?php woocommerce_template_loop_add_to_cart(); ?>
                        </div>
                    <?php woocommerce_template_single_meta(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- #product-<?php the_ID(); ?> -->