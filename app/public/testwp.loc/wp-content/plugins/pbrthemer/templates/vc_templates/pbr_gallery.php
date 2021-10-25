<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$args = array(
    'post_type' => 'gallery',
    'posts_per_page' => $number
);
$loop = new WP_Query( $args );
$count = 0;
switch ($columns_count) {
    case '6':
        $class_column = 'col-lg-2 col-md-2 col-sm-6';
        break;
    case '4':
        $class_column='col-md-3 col-sm-6';
        break;
    case '3':
        $class_column='col-md-4 col-sm-12';
        break;
    case '2':
        $class_column='col-md-6 col-sm-6';
        break;
    default:
        $class_column='col-md-12 col-sm-12';
        break;
}
?>
    <div class="widget-nostyle">
        <div class="widget-content">
            <div class="row">
                <?php while( $loop->have_posts() ): $loop->the_post();
                    $class_col = ($count++%$columns_count==0)? 'first-row' : '';
                    $galleries = pbrthemer_fnc_gallery(get_the_ID());
                    ?>
                    <div class="<?php echo esc_attr($class_column).' '.esc_attr($class_col);?>">
                        <div class="galleries-content">
                            <div class="galleries-inner">
                                <div class="img-galleries">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                                <div class="link-galleries">
                                    <a class="d-flex flex-column justify-content-center" href="<?php echo esc_url_raw(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" rel="prettyPhoto[gallerries-<?php echo get_the_ID(); ?>]">
                                        <span class="title"><?php the_title(); ?></span>
                                        <span><?php echo trim(count($galleries)+1); ?><?php esc_html_e(' photos', 'pbrthemer');?></span>
                                    </a>
                                </div>
                                
                                <div class="hidden">
                                    <?php foreach($galleries as $gallery): ?>
                                        <a href="<?php echo esc_url_raw($gallery);?>" alt="<?php the_title();?>" rel="prettyPhoto[gallerries-<?php echo get_the_ID(); ?>]"></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <script type="text/javascript">
                                jQuery(document).ready( function( $ ){
                                    $("a[rel^='prettyPhoto[gallerries-<?php echo get_the_ID(); ?>]']").prettyPhoto({
                                        animation_speed:'normal',
                                        theme:'light_square',
                                        social_tools: false,
                                    });
                                });
                            </script>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php wp_reset_postdata();