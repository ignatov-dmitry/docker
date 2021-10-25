<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$img = wp_get_attachment_image_src($photo,'full');
$style = $style ? 'feature-box-'.$style:""; 
$color = $color?'style="color:'. $color .';"' : "";
$title_color = $title_color?'style="color:'. $title_color .';"' : "";
$_background = wp_get_attachment_image_src($background,'full');

if($_background){
    $estyle = 'style="background: #ffffff url(\''.esc_url_raw( $_background[0]).'\') repeat top center;"';
}else{
    $estyle = '';
}
?>
<div class="widget widget-featurebox <?php echo esc_attr($style); ?> <?php echo esc_attr($el_class) ?> <?php echo esc_attr($title_align); ?>" <?php echo trim($estyle);?>>
    <div class="widget-content">
        <?php if($icon){ ?>
        <div class="fbox-icon">
            <i class="icons <?php echo esc_attr($icon); ?> <?php echo esc_attr($background); ?> radius-x" <?php echo trim( $color); ?>></i>
        </div>
        <?php } ?>

        <?php if(isset($img[0]) && $img[0]){?>
        <div class="fbox-image">
            <img src="<?php echo esc_url_raw($img[0]);?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
        </div>
        <?php } ?>

        <div class="fbox-body clearfix">  
            <div class="titile-heading">
                <h3 <?php echo trim( $title_color); ?>><?php echo trim($title); ?></h3> 
            </div>           

            <?php if( $subtitle ) { ?>
            <small><?php echo esc_html($subtitle); ?></small>  
            <?php } ?>

            <?php if(trim($information)!=''){ ?>
               <p class="description"><?php echo trim( $information );?></p>  
            <?php } ?>                       
        </div>
    </div>                
</div>

