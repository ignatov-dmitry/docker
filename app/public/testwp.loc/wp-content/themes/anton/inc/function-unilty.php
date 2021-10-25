<?php 
/**
 * function to integrate with WPML which will display languages as buttons
 */

if( !function_exists("anton_fnc_wpml_language_buttons") ){
   function anton_fnc_wpml_language_buttons(){
     if( function_exists( 'icl_get_languages' ) ){
       $languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
       if( is_array( $languages ) ){
          
          foreach( $languages as $lang_k=>$lang ){
              if( $lang['active'] ){
                  $active_lang = $lang;
                  unset( $languages[$lang_k] );
              }
          }

          // disabled
          if( count( $languages ) ){
              $lang_status = 'enabled';
          } else {
              $lang_status = 'disabled';
          }
          
          echo '<div class="language wpml-languages quick-button '. $lang_status .'">';
          
              echo '<div class="heading active" href="'. esc_url( $active_lang['url'] ).'" ontouchstart="this.classList.toggle(\'hover\');">';
                  echo '<img src="'. esc_url( $active_lang['country_flag_url'] ) .'" alt="'. esc_attr(get_bloginfo('name', 'display')) . '"/>';
                  echo esc_attr( $active_lang['translated_name'] );
                  if( count( $languages ) ) echo '<i class="icon-down-open-mini"></i>';
              echo '</div>';
              
              if( count( $languages ) ){
                  echo '<ul class="wpml-lang-dropdown list">';
                      foreach( $languages as $lang ){
                          echo '<li><a href="'. esc_url( $lang['url'] ) .'"><img src="'. esc_url( $lang['country_flag_url'] ) .'" alt="'. esc_attr(get_bloginfo('name', 'display')) . '"/>'. esc_attr( $lang['translated_name'] ) .'</a></li>';
                      }
                  echo '</ul>';
              }
              
          echo '</div>';
        }
      } 
   }
}
 /**
  * find all header files with prefix name having header-
  */
function anton_fnc_get_header_layouts(){
    $path = get_template_directory().'/header-*.php';
    $files = glob( $path  );
    $headers = array(
      'global'  => esc_html__('Global', 'anton'),
        ''      => esc_html__('Default', 'anton'),
    );
    if( count($files)>0 ){
        foreach ($files as $key => $file) {
            $header = str_replace( "header-", '', str_replace( '.php', '', basename($file) ) );
            $headers[$header] = esc_html__( 'Header', 'anton' ) . ' ' .str_replace( '-',' ', ucfirst( $header ) );
        }
    }

    return $headers;
}

 /**
  * Get list of footer profile as array. they are post from  post type 'footer'
  */
function anton_fnc_get_footer_profiles(){
    
    $footers_type = get_posts( array('posts_per_page' => -1, 'post_type' => 'footer') );
    $footers = array(  '' => esc_html__('None', 'anton') );

    foreach ($footers_type as $key => $value) {
        $footers[$value->ID] = $value->post_title;
    }

    wp_reset_postdata();

    return $footers;
}

/**
 * get list of menu group
 */
function anton_fnc_get_menugroups(){
    $menus       = wp_get_nav_menus( );
    $option_menu = array( '' => '---Select Menu---' );
    foreach ($menus as $menu) {
        $option_menu[$menu->term_id]=$menu->name;
    }
    return $option_menu;
}

/**
 *
 */
function anton_fnc_cst_skins(){
    $path = get_template_directory().'/css/skins/*';
    $files = glob($path , GLOB_ONLYDIR );
    $skins = array( 'default' => 'default' );
    if( count($files) > 0 ){
      foreach ($files as $key => $file) {
          $skin = str_replace( '.css', '', basename($file) );
          $skins[$skin] =  $skin;
      }
    }

    return $skins;
}

/**
 * Footer builder profile is custom post type, its content is shortcode rendering with visual composer 
 *
 * @param $footer 
 * 
 */

function anton_fnc_get_footer_profile_postdata( $footer ){
  
  if( is_numeric($footer) ){
      $post = get_post( $footer );
  }else {
      $post =  get_posts( array( 
          'name' =>  $footer, 
          'numberposts' => 1,
          'post_type' => 'footer' ) );
       $post = count($post) && $post?$post[0] :null;
  }
  wp_reset_postdata();
  return $post; 
}

/**
 * Footer builder profile is custom post type, its content is shortcode rendering with visual composer 
 *
 * @param $footer 
 * 
 */
function anton_fnc_render_post_content( $footer ){

  global $anton_wpopconfig; 

	$post = get_post( $footer );
  $anton_wpopconfig['type'] = 'footer';
	if($post){
    	echo do_shortcode( $post->post_content ); 
  }
  
  $anton_wpopconfig['type'] = '';

  wp_reset_postdata();	
}
 
/**
 * create a random key to use as primary key.
 */
if(!function_exists('anton_fnc_makeid')){
    function anton_fnc_makeid($length = 5){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}



if(!function_exists('anton_fnc_excerpt')){
    //Custom Excerpt Function
    function anton_fnc_excerpt($limit,$afterlimit='[...]') {
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


function anton_fnc_get_widget_block_styles(){
   return array(  'default' , 'primary', 'danger' , 'success', 'warning', 'coffe', 'bluesky' );
}
