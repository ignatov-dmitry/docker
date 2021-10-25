<?php 
global $product;
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($product->get_id() ), 'blog-thumbnails' );

?>
<div class="product-block" data-product-id="<?php echo esc_attr($product->get_id()); ?>">
	<div class="row">
		<div class="col-md-4 col-lg-4 col-sm-4">
		    <figure class="image">
		        <?php woocommerce_show_product_loop_sale_flash(); ?>
		        <a href="<?php echo (get_option( 'woocommerce_enable_lightbox' )=='yes' && is_product()) ? $image_attributes[0] : the_permalink(); ?>" class="product-image <?php echo (get_option( 'woocommerce_enable_lightbox' )=='yes' &&  is_product())?'zoom':'zoom-2' ;?>">
		            <?php
		                /**
		                * woocommerce_before_shop_loop_item_title hook
		                *
		                * @hooked woocommerce_show_product_loop_sale_flash - 10
		                * @hooked woocommerce_template_loop_product_thumbnail - 10
		                */
		                remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash', 10);
		                //do_action( 'woocommerce_before_shop_loop_item_title' );
		                echo trim( $product->get_image('full') ); 
		            ?>
		        </a>

		    </figure>
		</div>    
	    <div class="col-md-8 col-lg-8 col-sm-8">
		    <div class="caption-list">		        
		        <div class="meta">
		         <h3 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>		           
		            <p><?php echo  the_excerpt();  ?></p>
		        </div>    		        
		    </div>
			
			<div class="rating">
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

			<div class="button-action">
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>       

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
	</div>	    
</div>
