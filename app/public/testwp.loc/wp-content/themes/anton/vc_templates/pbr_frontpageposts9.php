<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();

$layout = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;


if(is_front_page()){
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
}
else{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}
$args['paged'] = $paged; 
$post_per_page = $args['posts_per_page']; 
 
$loop = new WP_Query($args);
?>

<div class="widget frontpage-posts frontpage-9 <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
    <?php
        if($title!=''){ ?>
            <h3 class="widget-title">
                <span><?php echo esc_attr($title); ?></span>
            </h3>
        <?php }
    ?>
    <div class="widget-content"> 
        <?php
            $_count =0;
            $colums = $grid_columns;
            $bscol = floor( 12/$colums );
        ?>
         
        <div class="posts-grid grid">
            <?php
                $i =0; while($loop->have_posts()){  $loop->the_post(); ?>
                <?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>

                <?php if(  $i++%$colums==0 ) {  ?>
                <div class="post-item grid-item row">
                <?php } ?>
                <div class="col-sm-<?php echo esc_attr($bscol); ?> grid-item">
                    <article class="blog_content post">
                        <?php
                        if ( has_post_thumbnail() ) {
                            ?>
                                <figure class="entry-thumb">
                                    <a href="<?php the_permalink(); ?>" class="entry-image zoom-2">
                                        <?php the_post_thumbnail( '$thumbsize' );?>
                                    </a>
                                    <!-- vote    -->
                                    <?php do_action('uno_fnc_rating') ?>
                                </figure>
                                <?php
                            }
                        ?>
                        <div class="entry-content">                            
                            <?php if (get_the_title()) { ?>
                                <h3 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                            <?php  } ?>

                            <div class="entry-meta clearfix">
                                <div class="entry-date pull-left">
                                    <i class="fa fa-calendar-o"></i>
                                    <span><?php echo get_the_date(); ?></span>
                                </div> 

                                <span class="author pull-left">
                                    <i class="fa fa-user"></i>
                                    <?php esc_html_e( 'by :', 'anton' ); ?>&nbsp;<?php the_author_posts_link(); ?>
                                </span>           
                            </div>

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
                    </article>
                </div>
                <?php if(  ($i%$colums==0) || $i == $loop->post_count) {  ?>
                </div>
                <?php } ?>
            <?php   }  ?>
        </div>

    </div>
        <?php if( isset($show_pagination) && $show_pagination ): ?>
        <div class="w-pagination"><?php anton_fnc_pagination_nav( $post_per_page,$loop->found_posts,$loop->max_num_pages ); ?></div>
        <?php endif ; ?>
</div>
<?php wp_reset_postdata(); ?>