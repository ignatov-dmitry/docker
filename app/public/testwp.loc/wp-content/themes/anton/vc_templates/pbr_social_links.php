<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
?>
<?php if($show_facebook || $show_google_plus || $show_youtube || $show_pinterest || $show_linkedIn || $show_twitter ): ?>
<div class="widget-social widget<?php echo esc_attr($el_class); ?>">
	<?php if( !empty( $title)): ?>
		<h2 class="wpb_heading">
			<span><?php echo esc_attr($title);?></span>
		</h2>
	<?php endif; ?>
	
	<?php if( $style =='style-1') : ?>
		<ul class="social list-unstyled style-v1 ">
		<?php if($show_facebook): ?>
			<li>
				<a class="facebook-social" href="<?php echo esc_url($link_facebook);?>"  target="_blank" >
					<i class="fa fa-facebook"></i> 
					<span><?php esc_html_e( 'facebook', 'anton'); ?></span>
				</a>				
			</li>
		<?php endif; ?>	
		<?php if($show_twitter): ?>
			<li>
				<a class="twitter-social" href="<?php echo esc_url($link_twitter);?>"  target="_blank">
					<i class="fa fa-twitter"></i> 
					<span><?php esc_html_e( 'twitter', 'anton'); ?></span>
				</a>				
			</li>
		<?php endif; ?>		
		<?php if($show_google_plus): ?>
			<li>
				<a href="<?php echo esc_url($link_google_plus);?>"  target="_blank">
					<i class="fa fa-google-plus"></i> 
					<span><?php esc_html_e( 'google +', 'anton'); ?></span>
				</a>				
			</li>
		<?php endif; ?>	
		<?php if($show_youtube): ?>
			<li>
				<a href="<?php echo esc_url($link_youtube);?>"  target="_blank">
					<i class="fa fa-youtube"></i>
					<span><?php esc_html_e( 'youtube', 'anton'); ?></span>
				</a>				
			</li>
		<?php endif; ?>	
		<?php if($show_pinterest): ?>
			<li>
				<a href="<?php echo esc_url($link_pinterest);?>"  target="_blank" >
					<i class="fa fa-pinterest"></i>
					<span><?php esc_html_e( 'pinterest', 'anton'); ?></span>
				</a>				
			</li>
		<?php endif; ?>	
			<?php if($show_linkedIn): ?>
				<li><a href="<?php echo esc_url($link_linkedIn);?>"  target="_blank">
						<i class="fa fa-linkedin"></i>
						<span><?php esc_html_e( 'linkedin', 'anton'); ?></span>
					</a>					
				</li>
			<?php endif; ?>	
		</ul>
	
	<?php else: ?>
		<ul class="social list-unstyled bo-sicolor social-circle style-v2">
		<?php if($show_facebook): ?>
			<li>
				<a class="facebook" href="<?php echo esc_url($link_facebook);?>"  target="_blank" >
					<i class="fa fa-facebook bo-social-facebook"></i>
					<span><?php esc_html_e( 'Facebook', 'anton'); ?></span>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_twitter): ?>
			<li>
				<a class="twitter" href="<?php echo esc_url($link_twitter);?>"  target="_blank">
					<i class="fa fa-twitter bo-social-twitter"></i>
					<span><?php esc_html_e( 'Twitter', 'anton'); ?></span>
				</a>
			</li>
		<?php endif; ?>		
		<?php if($show_google_plus): ?>
			<li>
				<a  class="google-plus" href="<?php echo esc_url($link_google_plus);?>"  target="_blank">
					<i class="fa fa-google-plus bo-social-google-plus"></i>
					<span><?php esc_html_e( 'Google plus', 'anton'); ?></span>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_youtube): ?>
			<li>
				<a class="youtube" href="<?php echo esc_url($link_youtube);?>"  target="_blank">
					<i class="fa fa-youtube bo-social-youtube"></i>
					<span><?php esc_html_e( 'Youtube', 'anton'); ?></span>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_pinterest): ?>
			<li>
				<a class="pinterest" href="<?php echo esc_url($link_pinterest);?>"  target="_blank" >
					<i class="fa fa-pinterest bo-social-pinterest"></i>
					<span><?php esc_html_e( 'Pinterest', 'anton'); ?></span>
				</a>
			</li>
		<?php endif; ?>	
		<?php if($show_linkedIn): ?>
			<li>
				<a class="linkedin" href="<?php echo esc_url($link_linkedIn);?>"  target="_blank">
					<i class="fa fa-linkedin bo-social-linkedin"></i>
					<span><?php esc_html_e( 'Linkedin', 'anton'); ?></span>
				</a>
			</li>
		<?php endif; ?>	
		</ul>
	<?php endif;?>
</div>
<?php endif; ?>