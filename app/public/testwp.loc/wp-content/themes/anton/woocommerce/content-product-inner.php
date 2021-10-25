<?php 
    global $product;
    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($product->get_id() ), 'blog-thumbnails' );
    $product = wc_get_product();   
    $time_sale = get_post_meta( $product->get_id(), '_sale_price_dates_to', true ); 
?>

<div class="product-block" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
    <figure class="image">
        <?php woocommerce_show_product_loop_sale_flash(); ?>
        <a href="<?php the_permalink(); ?>" class="product-image zoom">
            <?php
                /**
                * woocommerce_before_shop_loop_item_title hook
                *
                * @hooked woocommerce_show_product_loop_sale_flash - 10
                * @hooked woocommerce_template_loop_product_thumbnail - 10
                */
                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail', 10);
                add_action('woocommerce_before_shop_loop_item_title', 'anton_woocommerce_template_loop_product_thumbnail', 11);
                do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
        </a>
        <div class="button-action">
            <div class="button-groups">
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                <?php
                    $action_add = 'yith-woocompare-add-product';
                    $url_args = array(
                        'action' => $action_add,
                        'id' => $product->get_id()
                    );
                ?>

                <?php
                    if( class_exists( 'YITH_WCWL' ) ) {
                        echo do_shortcode( '[yith_wcwl_add_to_wishlist]' );
                    }
                ?>   

                <?php if(anton_fnc_theme_options('is-quickview', true)){ ?>
                    <div class="quick-view">
                        <a href="#" class="quickview" data-productslug="<?php echo trim($product->get_slug()); ?>" data-toggle="modal" data-target="#pbr-quickview-modal">
                           <span><i class="icon-quickview"> </i></span>
                        </a>
                    </div>
                <?php } ?>                      
            </div>   
        </div>
        <?php if($time_sale) {  ?>
        <div class="time">        
            <div class="pro-countdown clearfix" data-countdown="countdown"
                data-date="<?php echo date('m',$time_sale).'-'.date('d',$time_sale).'-'.date('Y',$time_sale).'-'. date('H',$time_sale) . '-' . date('i',$time_sale) . '-' .  date('s',$time_sale) ; ?>">
            </div>         
        </div>
        <?php } ?>
    </figure>

    <div class="caption">       
        <div class="meta">
        <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php
            /**
            * woocommerce_after_shop_loop_item_title hook
            *
            * @hooked woocommerce_template_loop_rating - 5
            * @hooked woocommerce_template_loop_price - 10
            */
            do_action( 'woocommerce_after_shop_loop_item_title');
        ?>
        </div>           
    </div>
</div>
