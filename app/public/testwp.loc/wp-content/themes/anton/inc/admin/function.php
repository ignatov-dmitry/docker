<?php

function anton_fnc_is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
 


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}


/**
 *
 */
function anton_fnc_setup_admin_setting(){

	global $pagenow; 
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
		/**
		 *
		 */
		$pts = array( 'brands', 'testimonials', 'footer', 'megamenu', 'team');

		$options = array();	

		foreach( $pts as $key ){
			$options['enable_'.$key] = 'on'; 
		}
	
		update_option( 'pbr_themer_posttype', $options );
	}

	
	if( anton_fnc_is_edit_page() ){ 	
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_style('jquery-ui-css', get_template_directory_uri() .'/css/jquery-ui.css');
		wp_enqueue_script( 'anton-admin-scripts', get_template_directory_uri() . '/js/custom-admin.js', array( 'jquery'  ), '20131022', true );
	}

	wp_enqueue_style( 'anton-custom-admin-css', get_template_directory_uri() . '/css/custom-admin.css', array(), '3.0.3' );	

}


add_action( 'init', 'anton_fnc_setup_admin_setting'  );
function anton_fnc_megamenu_item_config_toplevel( $item ) {
	
      $item_id = esc_attr( $item->ID );
?>
       	<p class="field-class_icon description description-wide">   
	        <label for="edit-menu-item-class_icon-<?php echo esc_attr($item_id); ?>"><?php esc_html_e( 'Icon Class:', 'anton' ); ?> <br>
	            <input type="text" name="menu-item-class_icon[<?php echo esc_attr($item_id); ?>]" value="<?php echo esc_attr($item->class_icon); ?>">
	        </label>
       	</p>
<?php 
}
add_action( 'pbr_megamenu_item_config_toplevel', 'anton_fnc_megamenu_item_config_toplevel' );


if (!function_exists('anton_fnc_custom_nav_update')) {
    add_action('wp_update_nav_menu_item', 'anton_fnc_custom_nav_update',10, 3);
    function anton_fnc_custom_nav_update($menu_id, $menu_item_db_id, $args ) {
      	$fields = array( 'class_icon' );
      	foreach( $fields as $field ){
	        if(!isset($_POST['menu-item-'.$field][$menu_item_db_id])){
	            $_POST['menu-item-'.$field][$menu_item_db_id] = "";
	        }
	        $custom_value = $_POST['menu-item-'.$field][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, $field, $custom_value );
      	}
    }
}

/**
 * Remove supported posttypes which provided by framework
 */
function anton_fnc_load_posttype_files( $output ){

  $pts = array( 'brands', 'testimonials', 'footer', 'megamenu', 'team');
  foreach( $output as $key=>$file ){
        if( !(in_array($key, $pts)) )
      unset( $output[$key] ); 
    }
  
  return $output; 
}

add_filter( 'pbrthemer_load_posttype_files' , 'anton_fnc_load_posttype_files', 1,  10 );