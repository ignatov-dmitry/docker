<?php 
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$img = wp_get_attachment_image_src($icon_video,'full');

$bg_img = wp_get_attachment_image_src($bg_video,'full');

?>
<div class="widget widget-video-link <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
	<?php if($title!=''): ?>
        <h3 class="widget-heading">
           <span><?php echo esc_attr( $title ); ?></span>       
        </h3>
    <?php endif; ?>
	<div class="video-content">
		
		<?php if (isset($bg_img[0]) && $bg_img[0]) { ?>
	        <figure class="image">
	            <img src="<?php echo esc_url_raw($bg_img[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"/>
	        </figure>
	    <?php } ?>

		<?php if (isset($img[0]) && $img[0]) { ?>
		<figure class="image-icon">
			<a href="<?php echo esc_url($link); ?>" data-lity>	            
	            <img src="<?php echo esc_url_raw($img[0]); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"/>        
		    </a>
	    </figure>
	    <?php } ?>
		
	</div>	    
</div>