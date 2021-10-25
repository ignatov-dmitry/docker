<?php
/*
*Template Name: Blog
*
*/
/*
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */

$anton_page_layouts = apply_filters( 'anton_fnc_get_page_blog_sidebar_configs', null );

get_header( apply_filters( 'anton_fnc_get_header_layout', null ) );
?>
<?php do_action( 'anton_template_main_before' ); ?>
<div id="main-container" class="<?php echo apply_filters('anton_template_main_container_class','container');?> inner">
	<div class="row">

		<?php if( isset($anton_page_layouts['sidebars']) && !empty($anton_page_layouts['sidebars']) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
		
		<div id="main-content" class="main-content <?php echo esc_attr($anton_page_layouts['main']['class']); ?>">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">

					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
						endwhile;
					?>

				</div><!-- #content -->
			</div><!-- #primary -->
			<?php get_sidebar( 'content' ); ?>
			
		</div><!-- #main-content -->
		
	</div>	
</div>
<?php

get_footer();