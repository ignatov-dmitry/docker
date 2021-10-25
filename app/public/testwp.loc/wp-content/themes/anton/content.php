<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-single">
        <?php if (class_exists('Vc_Manager')) { ?>
        <div class="post-preview">
            <?php if ( has_post_thumbnail() ) : ?>
                <figure class="entry-thumb zoom-2"><?php anton_fnc_post_thumbnail(); ?></figure>
            <?php endif; ?>
        </div>
        <?php } ?>
        
        <header class="entry-header">
            <?php
            if (is_single()) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
            endif;
            ?>
        </header><!-- .entry-header -->
        
        <div class="entry-meta clearfix">
            <div class="entry-date pull-left">
                <i class="fa fa-calendar-o"></i>
                <span><?php echo get_the_date(); ?></span>
            </div> 

            <span class="author pull-left">
                <i class="fa fa-user"></i>
                <?php esc_html_e( 'by :', 'anton' ); ?>&nbsp;<?php the_author_posts_link(); ?>
            </span>           
        </div><!-- .entry-meta -->

        <?php if (is_search()) : ?>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div><!-- .entry-summary -->
        <?php else : ?>
            <div class="entry-content">
                <?php
                /* translators: %s: Name of current post */
                if (is_single()){
                    the_content( sprintf(
                        esc_html__( 'Continue reading %s', 'anton' ) . '<span class="meta-nav">&rarr;</span>',
                        the_title( '<span class="screen-reader-text">', '</span>', false )
                    ) );
                } else{
                    the_excerpt();
                }

                wp_link_pages( array(
                    'before'      => '<div class="page-links clearfix"><span class="page-links-title">' . esc_html__( 'Pages:', 'anton' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
                ?>
            </div><!-- .entry-content -->
        <?php endif; ?>

        <?php if(is_single()): ?>
            <?php the_tags( '<div class="tag-links hidden"><span class="title">Tag:</span>', '', '</div>' ); ?>

            <?php if( anton_fnc_theme_options('blog-show-share-post', true) && function_exists('pbr_themer_get_template_part') ){
                pbr_themer_get_template_part( 'sharebox' );
            } ?>
            <div class="clearfix"></div>
            <?php
            // Previous/next post navigation.
             anton_fnc_post_nav(); ?>
        <?php else: ?>                  
            <div class="readmore">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'anton' ); ?></a>
            </div>
        <?php endif; ?>

    </div>
</article><!-- #post-## -->