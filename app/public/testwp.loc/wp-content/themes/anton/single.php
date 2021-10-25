<?php
/**
 * The Template for displaying all single posts
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */
global $anton_page_layouts; 
$anton_page_layouts = apply_filters( 'anton_fnc_get_single_sidebar_configs', null );
$sidebars = (!empty($anton_page_layouts['sidebars'])) ? $anton_page_layouts['sidebars'] : '';

get_header( apply_filters( 'anton_fnc_get_header_layout', null ) );

?>
<?php do_action( 'anton_template_main_before' ); ?>
<div id="main-container" class="container <?php echo apply_filters( 'anton_template_main_content_class', anton_fnc_theme_options('blog-single-layout') ); ?> <?php if(!function_exists('pbr_themer_get_template_part')){ echo esc_html("container-small"); }?>">
	<div class="row">
		<?php if( isset($anton_page_layouts['sidebars']) && !empty($anton_page_layouts['sidebars']) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>	
		<div id="main-content" class="main-content col-xs-12 <?php echo esc_attr($anton_page_layouts['main']['class']); ?>">
			<div id="primary" class="content-area">
				<div id="content" class="site-content clearfix" role="main">

					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content',get_post_format());

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						endwhile;
					?>

				</div><!-- #content -->
			</div><!-- #primary -->

			<?php get_sidebar( 'content' ); ?>

		</div>
	</div>	
</div>
<?php
get_footer();
