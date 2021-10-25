<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */

$anton_page_layouts = apply_filters( 'anton_fnc_get_woocommerce_sidebar_configs', null );

get_header( apply_filters( 'anton_fnc_get_header_layout', null ) ); ?>
<?php do_action( 'anton_woo_template_main_before' ); ?>
<div id="main-container" class="<?php echo apply_filters('anton_template_woocommerce_main_container_class','container');?>">
	
	<div class="row">
		<div id="main-content" class="main-content col-xs-12 <?php echo esc_attr($anton_page_layouts['main']['class']); ?>">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					 <?php  anton_fnc_woocommerce_content(); ?>

				</div><!-- #content -->
			</div><!-- #primary -->


			<?php get_sidebar( 'content' ); ?>
		</div><!-- #main-content -->

		<?php if( isset($anton_page_layouts['sidebars']) && !empty($anton_page_layouts['sidebars']) ) : ?>
			<?php get_sidebar('shop'); ?>
		<?php endif; ?>

	</div>	
</div>
<?php

get_footer();
