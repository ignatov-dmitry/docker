<?php   global $woocommerce; ?>
<div class="pbr-topcart">
<div id="cart" class="dropdown version-1">
        
        <a class="dropdown-toggle mini-cart" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#">
            <span class="text-skin cart-icon">
                <i class="icon-ecommerce-basket"></i>
            </span>

            <span class="title-cart"><?php esc_html_e('My Cart ', 'anton'); ?></span>
            <?php echo sprintf(_n(' <span class="mini-cart-items"> %d  </span> ', ' <span class="mini-cart-items"> %d <em>item</em> </span> ', $woocommerce->cart->cart_contents_count, 'anton'), $woocommerce->cart->cart_contents_count);?><span class="mini-cart-total"> <?php echo trim( $woocommerce->cart->get_cart_total() ); ?> </span>
            </a>            
        <div class="dropdown-menu"><div class="widget_shopping_cart_content">
            <?php woocommerce_mini_cart(); ?>
        </div></div>
    </div>
</div>    