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
global $anton_page_layouts;
$anton_page_layouts = apply_filters( 'anton_fnc_get_page_sidebar_configs', null );

get_header( apply_filters( 'anton_fnc_get_header_layout', null ) );
?>

<?php do_action( 'anton_template_main_before' ); ?>

<section id="main-container" class="<?php echo apply_filters('anton_template_main_container_class','container');?> inner <?php if(!function_exists('pbr_themer_get_template_part')){ echo esc_html("container-small"); }?>">			
	<div class="row">
		<?php if( isset($anton_page_layouts['sidebars']) && !empty($anton_page_layouts['sidebars']) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>	

		<?php if (class_exists('Vc_Manager')) {
            $cls = $anton_page_layouts['main']['class'];
        } else {
            $cls = esc_html('col-sm-8 col-md-9');
        } ?>
		<div id="main-content" class="main-content col-xs-12 <?php echo esc_attr($cls); ?>">
			<?php if (!is_front_page() && !class_exists('Vc_Manager')): ?>
		        <header class="page-header">
		            <h1 class="page-title"><?php the_title(); ?></h1>
		        </header>
		    <?php endif; ?>
		    
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
		</div><!-- #main-content -->
		
		<?php if (!class_exists('Vc_Manager')):
            ?>
            <div class="sidebar wpo-sidebar col-sm-4 col-md-3">
                <?php dynamic_sidebar('sidebar-default'); ?>
            </div>
            <?php
        endif; ?>
	</div>	
</section>
<?php

get_footer();