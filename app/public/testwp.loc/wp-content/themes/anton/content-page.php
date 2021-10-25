<?php
/**
 * The template used for displaying page content
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content-page">
        <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links clearfix"><span class="page-links-title">' . esc_html__( 'Pages:', 'anton' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->