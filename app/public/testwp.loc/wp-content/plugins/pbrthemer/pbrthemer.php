<?php 
/*
  Plugin Name: WpOpal Framework For Themes
  Plugin URI: http://www.wpopal.com/
  Description: Implement rich functions for themes base on Opal WordPress framework and load widgets for theme used, this is required.
  Version: 1.4.16
  Author: WPOPAL
  Author URI: http://www.wpopal.com
  License: GPLv2 or later
  Update: 24, April 2018
 */

  define( 'PBR_THEMER_PLUGIN_THEMER_URL', plugin_dir_url( __FILE__ ) );
  define( 'PBR_THEMER_PLUGIN_THEMER_DIR', plugin_dir_path( __FILE__ )  );
  define( 'PBR_THEMER_PLUGIN_THEMER_TEMPLATE_DIR', PBR_THEMER_PLUGIN_THEMER_DIR.'metabox_templates/' );
  define( 'PBR_THEMER_IMPORT_FOLDER', get_template_directory() . '/inc/import/'  );

  include_once( dirname( __FILE__ ) . '/import/import.php' );
  require_once( dirname( __FILE__ ) . '/classes/account.php' );
  require_once( dirname( __FILE__ ) . '/classes/nav.php' );
  require_once( dirname( __FILE__ ) . '/classes/offcanvas-menu.php' );

  require 'plugin-updates/plugin-update-checker.php';
    $PluginUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        add_query_arg( array(
            'action' => 'opal_update',
            'name'   => 'pbrthemer',
        ), 'http://www.wpopal.com/wp-admin/admin-post.php' ),
    __FILE__,
    'pbrthemer'
    );

  /**
   * Loading Widgets
   */
  function pbrthemer_load_custom_wp_admin_style() {
    wp_enqueue_style( 'pbrthemer-admin-css', PBR_THEMER_PLUGIN_THEMER_URL.'assets/css/admin.css');
    wp_enqueue_style( 'pbrthemer-admin-css' );
  }
  add_action( 'admin_enqueue_scripts', 'pbrthemer_load_custom_wp_admin_style' );
  function pbr_themer_widgets_init(){ 

    if( class_exists('WooCommerce')){
        require( PBR_THEMER_PLUGIN_THEMER_DIR.'vendors/woocommerce.php' );
    }

    if(class_exists('Vc_Manager')){
        require( PBR_THEMER_PLUGIN_THEMER_DIR.'vendors/visualcomposer.php' );
    }

      require( PBR_THEMER_PLUGIN_THEMER_DIR.'function.templates.php' );
      require( PBR_THEMER_PLUGIN_THEMER_DIR.'setting.class.php' );
      require( PBR_THEMER_PLUGIN_THEMER_DIR.'widget.class.php' );

      
      
      define( "PBR_THEMER_PLUGIN_THEMER", true );
      define( 'PBR_THEMER_PLUGIN_THEMER_WIDGET_TEMPLATES', get_template_directory().'/'  );

      $widgets = apply_filters( 'pbr_themer_load_widgets', array( 'contact-info', 'twitter','posts','featured_post','top_rate','sliders','recent_comment','recent_post','tabs','flickr', 'video', 'socials', 'menu_vertical', 'socials_siderbar','popupnewsletter') );


      if( !empty($widgets) ){
          foreach( $widgets as $opt => $key ){

              $file = str_replace( 'enable_', '', $key );
              $filepath = PBR_THEMER_PLUGIN_THEMER_DIR.'widgets/'.$file.'.php'; 
              if( file_exists($filepath) ){ 
                  require_once( $filepath );
              }
          }  
      }
  }
  add_action( 'widgets_init', 'pbr_themer_widgets_init' );

    
  /**
   * Loading Post Types
   */
  function pbr_themer_load_posttypes_setup(){
       

      $opts = apply_filters( 'pbr_themer_load_posttypes', get_option( 'pbr_themer_posttype' ) );
      if( !empty($opts) ){

          foreach( $opts as $opt => $key ){

              $file = str_replace( 'enable_', '', $opt );
              $filepath = PBR_THEMER_PLUGIN_THEMER_DIR.'posttypes/'.$file.'.php'; 
              if( file_exists($filepath) ){
                  require_once( $filepath );
              }
          }  
      }
  }   
  add_action( 'init', 'pbr_themer_load_posttypes_setup', 1 );   
  

if(!function_exists('pbr_string_limit_words')){
  function pbr_string_limit_words($string, $word_limit)
  {
    $words = explode(' ', $string, ($word_limit + 1));

    if(count($words) > $word_limit) {
      array_pop($words);
    }

    return implode(' ', $words);
  }
}


add_action( 'init', 'pbrthemer_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function pbrthemer_load_textdomain() {
  load_plugin_textdomain( 'pbrthemer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

function pbrthemer_fnc_theme_options($name, $default = false) {
  
    // get the meta from the database
    $options = ( get_option( 'pbr_theme_options' ) ) ? get_option( 'pbr_theme_options' ) : null;

    
   
    // return the option if it exists
    if ( isset( $options[$name] ) ) {
        return apply_filters( "pbr_theme_options_$name", $options[ $name ] );
    }
    if( get_option( $name ) ){
        return get_option( $name );
    }
    // return default if nothing else
    return apply_filters( "pbr_theme_options_$name", $default );
}

if(!function_exists('pbrthemer_fnc_makeid')){
    function pbrthemer_fnc_makeid($length = 5){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}

if(!function_exists('pbrthemer_fnc_excerpt')){
    //Custom Excerpt Function
    function pbrthemer_fnc_excerpt($limit,$afterlimit='[...]') {
        $excerpt = get_the_excerpt();
        if( $excerpt != ''){
           $excerpt = explode(' ', strip_tags( $excerpt ), $limit);
        }else{
            $excerpt = explode(' ', strip_tags(get_the_content( )), $limit);
        }
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).' '.$afterlimit;
        } else {
            $excerpt = implode(" ",$excerpt);
        }
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        return strip_shortcodes( $excerpt );
    }
}

if(!function_exists('pbrthemer_fnc_pagination_nav')){
    function pbrthemer_fnc_pagination_nav($per_page,$total,$max_num_pages=''){
        ?>
        <section class="pbr-pagination">
            <?php global  $wp_query; ?>
            <?php pbrthemer_fnc_pagination($prev = esc_html__('Previous','pbrthemer'), $next = esc_html__('Next','pbrthemer'), $pages=$max_num_pages ,array('class'=>'pull-left')); ?>
            <div class="result-count pull-right">
                <?php
                $paged    = max( 1, $wp_query->get( 'paged' ) );
                $first    = ( $per_page * $paged ) - $per_page + 1;
                $last     = min( $total, $per_page * $paged );

                if ( 1 == $total ) {
                    esc_html_e( 'Showing the single result', 'pbrthemer' );
                } elseif ( $total <= $per_page || -1 == $per_page ) {
                    printf( esc_html__( 'Showing all %d results', 'pbrthemer' ), $total );
                } else {
                    printf( _x( 'Showing %1$d to %2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'pbrthemer' ), $first, $last, $total );
                }
                ?>
            </div>
        </section>
    <?php
    }
}

if(!function_exists('pbrthemer_fnc_pagination')){
    //page navegation
    function pbrthemer_fnc_pagination($prev = 'Prev', $next = 'Next', $pages='' ,$args=array('class'=>'')) {
        global $wp_query, $wp_rewrite;
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
        if($pages==''){
            global $wp_query;
             $pages = $wp_query->max_num_pages;
             if(!$pages)
             {
                 $pages = 1;
             }
        }
        $pagination = array(
            'base' => @add_query_arg('paged','%#%'),
            'format' => '',
            'total' => $pages,
            'current' => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type' => 'array'
        );

        if( $wp_rewrite->using_permalinks() )
            $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        
        if(isset( $_GET['s'])){
            $cq = $_GET['s'];
            $sq = str_replace(" ", "+", $cq);
        }
        
        if( !empty($wp_query->query_vars['s']) ){
            $pagination['add_args'] = array( 's' => $sq);
        }
        if(paginate_links( $pagination )!=''){
            $paginations = paginate_links( $pagination );
            echo '<ul class="pagination '.esc_attr( $args["class"] ).'">';
                foreach ($paginations as $key => $pg) {
                    echo '<li>'. $pg .'</li>';
                }
            echo '</ul>';
        }
    }
}

if(!function_exists('pbrthemer_fnc_gallery')){
    function pbrthemer_fnc_gallery($post_id, $size='full'){
      $galleries = get_post_gallery( $post_id, false );
        if( !isset($galleries['ids'] ) ){
            return array();
        }
      $img_ids = explode(",",$galleries['ids']);
      $output = array();
      foreach ($img_ids as $key => $id){
        $img_src = wp_get_attachment_image_src($id,$size);
        $output[] = $img_src[0];
      }
      return $output;
    }
}