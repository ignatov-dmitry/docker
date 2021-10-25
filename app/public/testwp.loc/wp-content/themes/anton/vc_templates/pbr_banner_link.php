<?php 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$css_class = 'pbr_banner_link'.' '.$el_class.' '.'vc_align_'. $img_alignment .' '. $this->getCSSAnimation( $css_animation );

$link = vc_build_link($link_banner);

$img = wp_get_attachment_image_src($img_banner,'full');
?>
<div class="banner-link">
	<?php if( $title ) { ?>
    <div class="banner-title">
        <h2><?php echo esc_attr($title); ?></h2>
    </div>
    <?php } ?>
	
    <?php
    if($style_effect == 'effect-v1'){ 
     ?>
		<figure class="entry-image <?php echo esc_attr($css_class); ?> <?php echo esc_attr($style_effect); ?>">
	    	<?php if(isset($img[0]) && $img[0]){?>
	        <img src="<?php echo esc_url_raw($img[0]);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
	        <?php } ?>

	    	<div class="border one">
	        	<div></div>
		    </div>
		    <div class="border two">
		    	<div></div>
		    </div>
	    	<a href="<?php echo esc_url($link['url']);?>"></a>
	    </figure>
    <?php } elseif ($style_effect == 'effect-v2') {
     ?>
		<figure class="entry-image <?php echo  esc_attr($css_class); ?> <?php echo esc_attr($style_effect); ?>">
	    	<?php if(isset($img[0]) && $img[0]){?>
	        <img src="<?php echo esc_url_raw($img[0]);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
	        <?php } ?>

	    	<div class="effect-line"></div>
	    	<a href="<?php echo esc_url($link['url']);?>"></a>
	    </figure>
    <?php } ?>
</div>
	