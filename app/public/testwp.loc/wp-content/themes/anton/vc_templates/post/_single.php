<?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>
<?php
  $post_category = "";
  $categories = get_the_category();
  $separator = ' | ';
  $output = '';
  if($categories){
    foreach($categories as $category) {
      $output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'" title="' . esc_attr( sprintf( esc_html__( "View all posts in %s", 'anton' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
    }
  $post_category = trim($output, $separator);
  }      
?>
<div class="blog_content">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" class="entry-image zoom-2">
                    <?php the_post_thumbnail( '$thumbsize' );?>
                </a>
                <!-- vote    -->
                <?php do_action('wpopal_show_rating') ?>
                 <div class="category-highlight hidden">
                    <?php echo trim($post_category); ?>
                </div>
            </figure>
        <?php
    } ?>
    <div class="entry-content">
        <?php
            if (get_the_title()) {
            ?>
                <h4 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
        <?php } ?>
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
        <?php
            if (! has_excerpt()) {
                echo "";
            } else {
                ?>
                    <p class="entry-description"><?php echo anton_fnc_excerpt(20,'...'); ?></p>
                <?php
            }
        ?>
        <div class="readmore">
          <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'anton' ); ?></a>
        </div>
    </div>
</div>