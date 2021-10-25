<?php
/*
*Template Name: Coming soon
*
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <div class="container-fluid">
            <?php while ( have_posts() ) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                <?php the_content(); ?>
              </article>
            <?php endwhile; ?>
    </div>
    <div class="container">
        <p class="pull-left">
        <?php 
            $devby = '<a target="_blank" href="'.esc_url('http://wwww.engotheme.com').'">EngoTheme</a>';
            printf( esc_html__( 'Proudly powered by %s. Developed by %s', 'anton' ), 'WordPress', $devby );
        ?>
            
        </p>
    </div>
    <?php wp_footer(); ?>
</body>
</html>