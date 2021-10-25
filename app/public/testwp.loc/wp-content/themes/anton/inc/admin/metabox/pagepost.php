<?php 
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function anton_func_register_meta_boxes( $meta_boxes )
{
	global $wp_registered_sidebars;
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	$sidebars = array();
	if( $wp_registered_sidebars){
		foreach( $wp_registered_sidebars  as $key => $value ){
			$sidebars[$key] = $value['name'];
		}
	}
	// Better has an underscore as last sign
	$prefix = 'anton_';
	$layouts = array(
	    '' => esc_html__('Fullwidth', 'anton'),
	    'leftmain' => esc_html__('Left - Main Sidebar', 'anton'),
	    'mainright' => esc_html__('Main - Right Sidebar', 'anton'),

	);
	$footers = anton_fnc_get_footer_profiles();
	$footers['global'] = esc_html__( 'Global', 'anton' );
	
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Page Layout Setting', 'anton' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array( 'page' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
	 	
			// CHECKBOX
			array(
				'name' => esc_html__( 'Enable Fullwidth Layout', 'anton' ),
				'id'   => "{$prefix}enable_fullwidth_layout",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 0,
			),		
			// HEADER SELECT BOX
			array(
				'name'        => esc_html__( 'Header Layout', 'anton' ),
				'id'          => "{$prefix}header_layout",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     =>  anton_fnc_get_header_layouts(),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '',
				'placeholder' => esc_html__( 'Select option', 'anton' ),
			),

			array(
				'name'        => esc_html__( 'Footer Layout', 'anton' ),
				'id'          => "{$prefix}footer_profile",
				'type'        => 'select',
				'options'     => $footers,
				'multiple'    => false,
				'placeholder' => esc_html__( 'Select option', 'anton' ),
			),

			// CHECKBOX
			array(
				'name' => esc_html__( 'Disable Breadscrumb', 'anton' ),
				'id'   => "{$prefix}disable_breadscrumb",
				'type' => 'checkbox',
				// Value can be 0 or 1
				'std'  => 1,
			),	

			array(
				'name'        => esc_html__( 'Layout', 'anton' ),
				'id'          => "{$prefix}page_layout",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     =>   $layouts,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '',

			),

			// HEADER SELECT BOX
			array(
				'name'        => esc_html__( 'Left Sidebar', 'anton' ),
				'id'          => "{$prefix}leftsidebar",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $sidebars,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '',
				'placeholder' => esc_html__( 'Global', 'anton' ),
			),

			// HEADER SELECT BOX
			array(
				'name'        => esc_html__( 'Right Sidebar', 'anton' ),
				'id'          => "{$prefix}rightsidebar",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => $sidebars,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '',
				'placeholder' => esc_html__( 'Global', 'anton' ),
			),
			// HEADER SELECT BOX
			array(
				'name'        => esc_html__( 'Addition class', 'anton' ),
				'id'          => "{$prefix}additionclass",
				'type'        => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'     => array( 'home-background' => esc_html__( 'Home Background', 'anton' ) ),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => '',
				'placeholder' => esc_html__( 'None', 'anton' ),
			),

		),
		'validation' => array(
			 
		)

	);	

	$meta_boxes[] = array(
		'title'      => 'Footer meta data',
		'post_types' => 'footer',
		'fields'     => array(
			array(
				'name' => 'Footer key',
				'id'   => "{$prefix}footer_key",
				'type' => 'text',
			),
		)
	);
 	 
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'anton_func_register_meta_boxes' , 102 );


function anton_func_register_postformat_meta_boxes(  $meta_boxes  ){
	 
	// Better has an underscore as last sign
	$prefix = 'anton_';

	$layouts = array(
	    '' => esc_html__('Fullwidth', 'anton'),
	    'leftmain' => esc_html__('Left - Main Sidebar', 'anton'),
	    'mainright' => esc_html__('Main - Right Sidebar', 'anton'),

	);

	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'post_format_standard_post_meta',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Format Setting', 'anton' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array(  'post' ),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'low',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
	 	
			// CHECKBOX
			
			array(
				'id'   => "{$prefix}gallery_files",
				'name' => esc_html__( 'Images Gallery', 'anton' ),
				'type' => 'file_advanced',
				'description'  => esc_html__( 'Select one or more images to show as gallery', 'anton' ),
			),

			array(
				'id'   => "{$prefix}video_link",
				'name' => esc_html__( 'Video Link', 'anton' ),
				'type' => 'oembed',
				'description'  => esc_html__( 'Select one or more images to show as gallery', 'anton' ),
			),
			
			array(
				'id'   => "{$prefix}link_text",
				'name' => esc_html__( 'Link Text', 'anton' ),
				'type' => 'text',
				'description'  => esc_html__( 'Select one or more images to show as gallery', 'anton' ),
			), 
			array(
				'id'   => "{$prefix}link_link",
				'name' => esc_html__( 'Link To Redirect', 'anton' ),
				'type' => 'text',
				'description'  => esc_html__( 'Select one or more images to show as gallery', 'anton' ),
			), 
			 
			array(
				'id'   => "{$prefix}audio_link",
				'name' => esc_html__( 'Audio Link', 'anton' ),
				'type' => 'text',
				'description'  => esc_html__( 'Select one or more images to show as gallery', 'anton' ),
			),  
		),
		'validation' => array(
			 
		)
	);	
 	 
	return $meta_boxes;
}


function anton_func_standard_post_meta( $post_id ){
		
	global $post; 
	$prefix = 'anton_';
	$type = get_post_format();

	$old = array(
		'gallery_files',
		'video_link',
		'link_text',
		'link_link',
		'audio_link',
	);
	
	$data = array( 'gallery' => array('gallery_files'), 
				   'video' =>  array('video_link'), 
				   'audio' =>  array('audio_link'), 
				   'link' => array('link_link','link_text') ); 

	$new = array();

	if( isset($data[$type]) ){
		foreach( $data[$type] as $key => $value ){
			$new[$prefix.$value] = $_POST[$prefix.$value];
		}
	}


	foreach( $old as $key => $value ){
		if( isset($_POST[$prefix.$value]) ){
			unset( $_POST[$prefix.$value] );
		}
	}
	if( $new ){
		$_POST = array_merge( $_POST, $new );
	}
	// echo get_post_format();


}
add_action( "rwmb_post_format_standard_post_meta_before_save_post", 'anton_func_standard_post_meta' , 9  );

add_filter( 'rwmb_meta_boxes', 'anton_func_register_postformat_meta_boxes' , 100 );


//fix testimonial metabox
function anton_fnc_metaboxes_testimonial_fields(){
     /**
       * prefix of meta keys (optional)
       * Use underscore (_) at the beginning to make keys hidden
       * Alt.: You also can make prefix empty to disable it
       */

         // Better has an underscore as last sign
      $prefix = 'testimonials_';
      $fields =  array(
          // COLOR
      	array(
            'name' => esc_html__( 'Name', 'anton'),
            'id'   => "{$prefix}name",
            'type' => 'text',
            'description' => esc_html__('Enter name ', 'anton')
          ), 
          array(
            'name' => esc_html__( 'Job', 'anton'),
            'id'   => "{$prefix}job",
            'type' => 'text',
            'description' => esc_html__('Enter Job example CEO, CTO', 'anton')
          ), 
           
        
          array(
            'name' => esc_html__( 'Link', 'anton'),
            'id'   => "{$prefix}link",
            'type' => 'text',
            'description' => esc_html__('Enter Link to this personal', 'anton')
          ), 

 
          
        ); 
       return apply_filters( 'anton_fnc_metaboxes_testimonial_fields', $fields );
  }

  /**
   *
   */
  function anton_fnc_testimonials_register_meta_boxes( $meta_boxes ){

      // 1st meta box
      $meta_boxes[] = array(
        // Meta box id, UNIQUE per meta box. Optional since 4.1.5
        'id'         => 'standard',
        // Meta box title - Will appear at the drag and drop handle bar. Required.
        'title'      => esc_html__( 'Testimonials Info', 'anton'),
        // Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
        'post_types' => array( 'testimonial' ),
        // Where the meta box appear: normal (default), advanced, side. Optional.
        'context'    => 'normal',
        // Order of meta box: high (default), low. Optional.
        'priority'   => 'low',
        // Auto save: true, false (default). Optional.
        'autosave'   => true,
        // List of meta fields
        'fields'     =>  anton_fnc_metaboxes_testimonial_fields()
      );

      return $meta_boxes;
  }

  /**
   * Register Metabox 
   */

  add_filter( 'rwmb_meta_boxes', 'anton_fnc_testimonials_register_meta_boxes', 15);