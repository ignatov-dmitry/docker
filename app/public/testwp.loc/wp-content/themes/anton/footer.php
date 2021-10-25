<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */
$footer_profile =  apply_filters( 'anton_fnc_get_footer_profile', 'default' );
$footer_key = anton_fnc_get_footer_custom_key($footer_profile)?anton_fnc_get_footer_custom_key($footer_profile):"";
?>
<?php get_sidebar( 'mass-footer-body' );  ?>
</div><!-- #main -->
	<?php do_action( 'anton_template_main_after' ); ?>
	<?php do_action( 'anton_template_footer_before' ); ?>
	<footer id="pbr-footer" class="pbr-footer <?php echo esc_attr($footer_key);?>" data-role="contentinfo">
		<!-- Footer content -->
		<div class="engo_footer_content">
			<?php if( $footer_profile ) : ?>
				<div class="inner">
					<?php anton_fnc_render_post_content( $footer_profile ); ?>
				</div>
			<?php endif; ?>
		</div>
		
		<div class="pbr-copyright">
			<div class="container">
				<!-- Coppyright -->
				<div class="copyright">
					<?php do_action( 'anton_fnc_credits' ); ?>
					<?php
						anton_display_footer_copyright();
					?>
				</div>		
			</div>
		</div>

		<?php get_sidebar( 'mass-footer-body' );  ?>			
	</footer>

	<?php do_action( 'anton_template_footer_after' ); ?>
	<?php get_sidebar( 'offcanvas' );  ?>
	<?php get_sidebar( 'verticalmenu' );  ?>
	</div>
</div>

<div class="scrollup">
	<span class="fa fa-long-arrow-up"></span>
</div>
 <!-- #page -->
<?php wp_footer(); ?>
</body>
</html>