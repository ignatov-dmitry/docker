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
 * @support  http://engotheme.com.
 */
    $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
    extract( $atts );
  
    $deals = array();
    $loop = anton_fnc_woocommerce_query('deals', $number);
    $img = wp_get_attachment_image_src($photo,'full');
    $_id = anton_fnc_makeid();
    $_count = 1;

    $_total =  $loop->found_posts;  

    if( $loop->have_posts()  ) { ?>
 
    <div class="widget_today_deal deal-<?php echo esc_attr($layer_style); ?> <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
        <div class="widget-content woo-deals">
            <div class="today-deal" id="today_deal_<?php echo esc_attr($_id); ?>">
                <?php while ( $loop->have_posts() ) : $loop->the_post();
                    $product = wc_get_product();                         
                    $time_sale = strtotime( $input_datetime );     
                ?>
                    <?php if( isset($img) && $img ){ ?>
                    <figure class="image">
                        <img src="<?php echo esc_url_raw($img[0]);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
                    </figure>
                    <?php } ?>

                    <div class="caption">
                        <h2 class="title-heading">
                            <span><span class="icon-title"></span><?php if( isset($title) && $title ){ ?><?php echo esc_html($title); ?><?php } ?></span>                            
                        </h2>
                        <?php if( isset($subtitle) && $subtitle ){ ?><span class="subtitle"><?php echo esc_html($subtitle); ?></span> <?php } ?>
                        <?php if( isset($description) && $description ){ ?><div class="description"><?php echo esc_html($description); ?></div><?php } ?>
                        <div class="time">
                            <?php if(   $time_sale ) {  ?>
                            <div class="pts-countdown clearfix" data-countdown="countdown"
                                 data-date="<?php echo date('m',$time_sale).'-'.date('d',$time_sale).'-'.date('Y',$time_sale).'-'. date('H',$time_sale) . '-' . date('i',$time_sale) . '-' .  date('s',$time_sale) ; ?>">
                            </div>
                            <?php } ?> 
                        </div>
                        <?php $link = vc_build_link($link_button); ?>
                        <a class="btn btn-theme" href="<?php echo esc_url($link['url']); ?>">
                            <?php echo esc_attr($text_button); ?> 
                        </a>
                    </div>

                <?php 
                        $_count++; 
                    endwhile; 
                ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
    <?php } ?>