<?php
/**
 * The template for displaying posts in the Audio post format
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */
$audiolink =  get_post_meta( get_the_ID(),'anton_audio_link', true );
if ( isset($_GET['blog_layout']) && $_GET['blog_layout']== 'list' ) {
	$class = 'col-md-6 col-lg-6';
}else{
	$class = '';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog">
		<?php if (class_exists('Vc_Manager')) { ?>
		<div class="post-preview">
			<?php if( $audiolink ) : ?>
				<div class="audio-wrap audio-responsive"><?php echo wp_oembed_get( $audiolink ); ?></div>
			<?php else : ?>
				<?php anton_fnc_post_thumbnail(); ?>
			<?php endif; ?>

			<?php if ( has_post_thumbnail() ): ?>
				<span class="post-format">
					<a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"></a>
				</span>
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

		<div class="post-content">	
			<div class="entry-content">
				<?php
					/* translators: %s: Name of current post */
					if(is_single()){
						the_content( sprintf(
							esc_html__( 'Continue reading %s', 'anton').'<span class="meta-nav">&rarr;</span>',
							the_title( '<span class="screen-reader-text">', '</span>', false )
						) );
					}else{
						the_excerpt();
					}

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'anton' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
		</div><!-- .entry-content -->

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
	</div>
</article><!-- #post-## -->
