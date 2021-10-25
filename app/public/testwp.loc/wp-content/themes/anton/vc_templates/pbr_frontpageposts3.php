<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
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

<div class="widget frontpage-posts frontpage-3 div-blog <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
    <?php
        if($title!=''){ ?>
            <h3 class="widget-title">
                <span><?php echo esc_attr($title); ?></span>
            </h3>
        <?php }
    ?>
    <div class="widget-content"> 
       <?php
        $_count = 1;
        $i=0;
        $colums = $grid_columns;
        $bscol = floor( 12/$colums );
        $end = $loop->post_count;
        ?>

        <div class="frontpage-wrapper">

            <?php if(  $i++%$colums==0 ) {  ?>
            <div class="row">
            <?php } ?>
            
                <?php
                    $i = 0;
                    $main = $num_mainpost;

                while($loop->have_posts()){
                    $loop->the_post();
                    ?>
                    <?php if( $i<=$main-1) { ?>
                        <?php if( $i == 0 ) {  ?>
                            <div  class=" main-posts large">
                        <?php } ?>
                            <article class="post col-sm-<?php echo esc_attr($bscol); ?>">
                                <?php get_template_part( 'vc_templates/post/_single' ) ?>
                            </article>

                        <?php if( $i == $main-1 || $i == $end -1 ) { ?>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                            <?php if( $i == $main  ) { ?>
                            <div class="col-sm-<?php echo esc_attr($bscol); ?> secondary-posts">
                            <?php }  ?>
                            <article class="post col-sm-<?php echo esc_attr($bscol); ?>">
                                <?php get_template_part( 'vc_templates/post/_single-v2' ) ?>
                            </article>
                            <?php if( $i == $end-1 ) {   ?>
                                </div>
                            <?php } ?>
                    <?php } ?>

                <?php  $i++; } ?>

            <?php if(  ($i%$colums==0) || $i == $loop->post_count) {  ?>
            </div>
            <?php } ?>
        </div>

    </div>
        <?php if( isset($show_pagination) && $show_pagination ): ?>
        <div class="w-pagination"><?php anton_fnc_pagination_nav( $post_per_page,$loop->found_posts,$loop->max_num_pages ); ?></div>
        <?php endif ; ?>
</div>
<?php wp_reset_postdata(); ?>