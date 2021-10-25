<?php
/**
 * The template for displaying Search Results pages
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */

get_header( apply_filters( 'anton_fnc_get_header_layout', null ) ); ?>

<?php 
	echo '<div id="pbr-breadscrumb" class="pbr-breadscrumb"><div class="container">';
		anton_fnc_render_breadcrumbs();
	echo '</div></div>';
?>

	<div id="primary" class="content-area container inner">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'anton' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next post navigation.
					anton_fnc_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
