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
    $img = wp_get_attachment_image_src($image_banner,'full');
    $_id = anton_fnc_makeid();
    $_count = 1;
?>

    <div class="widget_custom_content <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
        <div class="widget_content">
            <figure class="image">
                <img src="<?php echo esc_url_raw($img[0]);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
            </figure>
            <div class="custom_content">
                <h2 class="title-heading">
                    <span><?php if( isset($title) && $title ){ ?><?php echo esc_html($title); ?><?php } ?></span>                            
                </h2>

                <?php if( isset($subtitle) && $subtitle ){ ?>
                    <div class="subtitle"><?php echo esc_html($subtitle); ?></div> 
                <?php } ?>

                <?php if( isset($description) && $description ){ ?>
                    <div class="description"><?php echo esc_html($description); ?></div>
                <?php } ?>
                
                <?php if ( isset( $button ) && $button ) { ?>
                    <a class="btn btn-botton" href="#">
                        <?php echo esc_html("Shop now"); ?> 
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>