<?php 

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$enddays = strtotime( $input_datetime );
$style = '';
$fstyle = '';

if( $image ){
	$img = wp_get_attachment_image_src( $image,'full' );
	if( isset($img[0]) ){
		$style = 'style="background-image:url(\''.$img[0].'\')"';
	}
}
if( $font_color ){
	$fstyle = 'style="color:'.$font_color.'"';
}
?>
<div class="banner-countdown-widget" <?php echo trim($style); ?>>
	<div class="banner-countdown-inner" <?php echo trim($fstyle); ?>>
		<div class="heading-countdown">
			<?php if( isset($title) && $title ) : ?>
				<h3 <?php echo trim($fstyle); ?>><?php echo trim($title); ?></h3>
			<?php endif; ?>	

			<?php if( isset($descript) && $descript ) : ?>
				<p <?php echo trim($fstyle); ?>><?php echo trim($descript); ?></p>
			<?php endif; ?>	
		</div>

		<div class="countdown-wrapper">
		    <div class="pbr-countdown" data-countdown="countdown"
		        data-date="<?php echo date('m',$enddays).'-'.date('d',$enddays).'-'.date('Y',$enddays).'-'. date('H',$enddays) . '-' . date('i',$enddays) . '-' .  date('s',$enddays) ; ?>">
		    </div>
		</div>
		<?php if( $link && $text_link ) : ?>
			<div class="viewall">
				<a href="<?php echo esc_url($link); ?>" <?php echo trim($fstyle); ?>><?php echo trim( $text_link ); ?></a>					
			</div>	
		<?php endif; ?>
	</div>	
</div>