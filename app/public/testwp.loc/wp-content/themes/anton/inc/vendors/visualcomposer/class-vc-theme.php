<?php 

class Anton_VC_Theme implements Vc_Vendor_Interface {

	public function load(){
		

		/*********************************************************************************************************************
		 *  Vertical menu
		 *********************************************************************************************************************/
		$option_menu  = array(); 
		if( is_admin() ){
			$menus = wp_get_nav_menus( array( 'orderby' => 'name' ) );
		    $option_menu = array('---Select Menu---'=>'');
		    foreach ($menus as $menu) {
		    	$option_menu[$menu->name]=$menu->term_id;
		    }
		}    
		vc_map( array(
		    "name" => esc_html__("PBR Quick Links Menu", 'anton'),
		    "base" => "pbr_quicklinksmenu",
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'anton'),
		    'description'	=> esc_html__( 'Show Quick Links To Access', 'anton'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"value" => 'Quick To Go'
				),
		    	array(
					"type" => "dropdown",
					"heading" => esc_html__("Menu", 'anton'),
					"param_name" => "menu",
					"value" => $option_menu,
					"description" => esc_html__("Select menu.", 'anton')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'anton'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				)
		   	)
		));
		 
		

		/*********************************************************************************************************************
		 *  Vertical menu
		 *********************************************************************************************************************/
	 
		vc_map( array(
		    "name" => esc_html__("PBR Vertical MegaMenu", 'anton'),
		    "base" => "pbr_verticalmenu",
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'anton'),
		    "params" => array(

		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"value" => 'Vertical Menu',
					"admin_label"	=> true
				),

		    	array(
					"type" => "dropdown",
					"heading" => esc_html__("Menu", 'anton'),
					"param_name" => "menu",
					"value" => $option_menu,
					"description" => esc_html__("Select menu.", 'anton')
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Position", 'anton'),
					"param_name" => "postion",
					"value" => array(
							'left'=>'left',
							'right'=>'right'
						),
					'std' => 'left',
					"description" => esc_html__("Postion Menu Vertical.", 'anton')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'anton'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				)
		   	)
		));
		 
		vc_map( array(
		    "name" => esc_html__("Fixed Show Vertical Menu ", 'anton'),
		    "base" => "pbr_verticalmenu_show",
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'anton'),
		    "description" => esc_html__( 'Always showing vertical menu on top', 'anton' ),
		    "params" => array(
		  
				array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"description" => esc_html__("When enabled vertical megamenu widget on main navition and its menu content will be showed by this module. This module will work with header:Martket, Market-V2, Market-V3" , 'anton')
				)
		   	)
		));
		
	 

		/* Heading Text Block
		---------------------------------------------------------- */
		vc_map( array(
			'name'        => esc_html__( 'PBR Widget Heading', 'anton'),
			'base'        => 'pbr_title_heading',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'anton'),
			'description' => esc_html__( 'Create title for one Widget', 'anton' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Widget title', 'anton' ),
					'param_name' => 'title',
					'value'       => esc_html__( 'Title', 'anton' ),
					'description' => esc_html__( 'Enter heading title.', 'anton' ),
					"admin_label" => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Sub title', 'anton' ),
					'param_name' => 'sub_title',
					'value'       => esc_html__( 'Sub Title', 'anton' ),
					'description' => esc_html__( 'Enter heading sub title.', 'anton' ),
					"admin_label" => true
				),
				array(
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Title Color', 'anton' ),
				    'param_name' => 'font_color',
				    'description' => esc_html__( 'Select font color', 'anton' )
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Heading Size", 'anton'),
					"param_name" => "heading_size",
					'value' 	=> array(
						esc_html__('Default', 'anton') => 'default', 
						esc_html__('Small', 'anton') => 'small',
						esc_html__('Extra Small', 'anton') => 'extrasmall',
					),
					'std' => ''
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Heading Style", 'anton'),
					"param_name" => "heading_style",
					'value' 	=> array(
						esc_html__('Title v1', 'anton') => 'title-v1',
						esc_html__('Title v2', 'anton') => 'title-v2',
						esc_html__('Title v3', 'anton') => 'title-v3',
						esc_html__('Title v4', 'anton') => 'title-v4',
						esc_html__('Title v5', 'anton') => 'title-v5',
					),
					'std' => ''
				), 
				array(
					"type" => "textarea",
					'heading' => esc_html__( 'Description', 'anton' ),
					"param_name" => "descript",
					"value" => '',
					'description' => esc_html__( 'Enter description for title.', 'anton' )
			    ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'anton' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'anton' )
				)
			),
		));
		
		/* Heading Text Block
		---------------------------------------------------------- */
		vc_map( array(
			'name'        => esc_html__( 'PBR Banner CountDown', 'anton'),
			'base'        => 'pbr_banner_countdown',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'anton'),
			'description' => esc_html__( 'Show CountDown with banner', 'anton' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Widget title', 'anton' ),
					'param_name' => 'title',
					'value'       => esc_html__( 'Title', 'anton' ),
					'description' => esc_html__( 'Enter heading title.', 'anton' ),
					"admin_label" => true
				),


				array(
					"type" => "attach_image",
					"description" => esc_html__("If you upload an image, icon will not show.", 'anton'),
					"param_name" => "image",
					"value" => '',
					'heading'	=> esc_html__('Image', 'anton' )
				),


				array(
				    'type' => 'textfield',
				    'heading' => esc_html__( 'Date Expired', 'anton' ),
				    'param_name' => 'input_datetime',
				    'description' => esc_html__( 'Select font color', 'anton' ),
				),
				 

				array(
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Title Color', 'anton' ),
				    'param_name' => 'font_color',
				    'description' => esc_html__( 'Select font color', 'anton' ),
				    'class'	=> 'hacongtien'
				),
				 
				array(
					"type" => "textarea",
					'heading' => esc_html__( 'Description', 'anton' ),
					"param_name" => "descript",
					"value" => '',
					'description' => esc_html__( 'Enter description for title.', 'anton' )
			    ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'anton' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'anton' )
				),


				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Text Link', 'anton' ),
					'param_name' => 'text_link',
					'value'		 => 'Find Out More',
					'description' => esc_html__( 'Enter your link text', 'anton' )
				),


				
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Link', 'anton' ),
					'param_name' => 'link',
					'value'		 => 'http://',
					'description' => esc_html__( 'Enter your link to redirect', 'anton' )
				)
			),
		));


	}
}