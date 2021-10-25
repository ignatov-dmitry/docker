<?php

 /**
  * Register Woocommerce Vendor which will register list of shortcodes
  */
function anton_fnc_init_vc_vendors(){
	
	$vendor = new Anton_VC_News();
	add_action( 'vc_after_set_mode', array(
		$vendor,
		'load'
	), 99 );


	$vendor = new Anton_VC_Theme();
	add_action( 'vc_after_set_mode', array(
		$vendor,
		'load'
	), 99 );

	$vendor = new Anton_VC_Elements();
	add_action( 'vc_after_set_mode', array(
		$vendor,
		'load'
	), 99 );

	
}
add_action( 'after_setup_theme', 'anton_fnc_init_vc_vendors' , 99 );   

/**
 * Add parameters for row
 */
function anton_fnc_add_params(){

 	/**
	 * add new params for row
	 */
	vc_add_param( 'vc_row', array(
	    "type" => "checkbox",
	    "heading" => esc_html__("Parallax", 'anton'),
	    "param_name" => "parallax",
	    "value" => array(
	        'Yes, please' => true
	    )
	));

	$row_class =  array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Background Styles', 'anton' ),
        'param_name' => 'bgstyle',
        'description'	=> esc_html__('Use Styles Supported In Theme, Select No Use For Customizing on Tab Design Options', 'anton'),
        'value' => array(
			esc_html__( 'No Use', 'anton' ) => '',
			esc_html__( 'Background Color Primary', 'anton' ) => 'bg-primary',
			esc_html__( 'Background Color Info', 'anton' ) 	 => 'bg-info',
			esc_html__( 'Background Color Danger', 'anton' )  => 'bg-danger',
			esc_html__( 'Background Color Warning', 'anton' ) => 'bg-warning',
			esc_html__( 'Background Color Success', 'anton' ) => 'bg-success',
			esc_html__( 'Background Color Theme', 'anton' ) 	 => 'bg-theme',
		    esc_html__( 'Background Image 1 Dark', 'anton' ) => 'bg-style-v1',
			esc_html__( 'Background Image 2 Dark', 'anton' ) => 'bg-style-v2',
			esc_html__( 'Background Image 3 Blue', 'anton' ) => 'bg-style-v3',
			esc_html__( 'Background Image 4 Red', 'anton' ) => 'bg-style-v4',
        )
    ) ;

	vc_add_param( 'vc_row', $row_class );
	vc_add_param( 'vc_row_inner', $row_class );
 

	 vc_add_param( 'vc_row', array(
	     "type" => "dropdown",
	     "heading" => esc_html__("Is Boxed", 'anton'),
	     "param_name" => "isfullwidth",
	     "value" => array(
	     				esc_html__('Yes, Boxed', 'anton') => '1',
	     				esc_html__('No, Wide', 'anton') => '0'
	     			)
	));

	vc_add_param( 'vc_row', array(
	    "type" => "textfield",
	    "heading" => esc_html__("Icon", 'anton'),
	    "param_name" => "icon",
	    "value" => '',
		'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'anton' )
						. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
						. esc_html__( 'here to see the list, and use class icons-lg, icons-md, icons-sm to change its size', 'anton' ) . '</a>'
	));
	// add param for image elements

	 vc_add_param( 'vc_single_image', array(
	     "type" => "textarea",
	     "heading" => esc_html__("Image Description", 'anton'),
	     "param_name" => "description",
	     "value" => "",
	     'priority'	
	));
}
add_action( 'after_setup_theme', 'anton_fnc_add_params', 99 );
 
 /** 
  * Replace pagebuilder columns and rows class by bootstrap classes
  */
function anton_wpo_change_bootstrap_class( $class_string,$tag ){
 
	if ($tag=='vc_column' || $tag=='vc_column_inner') {
		$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
		$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
		$class_string = preg_replace('/vc_col-(\w)/', 'col-$1', $class_string);
		$class_string = str_replace('wpb_column', '', $class_string);
		$class_string = str_replace('column_container', '', $class_string);
	}
	return $class_string;
}

/*add_filter( 'vc_shortcodes_css_class', 'anton_wpo_change_bootstrap_class',10,2);*/