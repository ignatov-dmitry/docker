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
/*
*Template Name: 404 Page
*/

get_header( apply_filters( 'anton_fnc_get_header_layout', null ) ); ?>
<?php do_action( 'anton_template_main_before' ); ?>

<div id="main-container" class="<?php echo apply_filters('anton_template_main_container_class','container');?> inner clearfix notfound-page">
	<div class="row">
		<div id="main-content" class="main-content col-lg-12 text-center">
			<div id="primary" class="content-area">
				 <div id="content" class="site-content" role="main">
					<div class="icon-notfound"></div>
					<div class="title-error">
						<?php esc_html_e( "404 ERROR", 'anton' ); ?>
					</div>
					<div class="error-description">
						<?php esc_html_e( "We're sorry, but the page you were looking for doesn't exist.", 'anton' ); ?>						
					</div><!-- .page-content -->

					<div class="page-action">
						<?php esc_html_e( 'Please try one of the following pages', 'anton' ); ?>
					</div>
					<div class="search-404page clearfix"><?php anton_fnc_categories_searchform() ?></div>
					<div class="backtohome">
						<?php echo esc_html__( 'or go back to', 'anton' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <?php esc_html_e('home page', 'anton'); ?> <i class="fa fa-angle-double-right"></i></a>
					</div>
				</div><!-- #content -->
			</div><!-- #primary -->
			<?php get_sidebar( 'content' ); ?>
		</div><!-- #main-content -->
		<?php get_sidebar(); ?>	 
	</div>	
</div>
<?php

get_footer();