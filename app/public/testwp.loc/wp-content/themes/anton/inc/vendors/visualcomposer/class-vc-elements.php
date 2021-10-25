<?php 
class Anton_VC_News implements Vc_Vendor_Interface  {
	
	public function load(){
		 
		$newssupported = true; 
 
			/**********************************************************************************
			 * Front Page Posts
			 **********************************************************************************/


		// front page 9
			vc_map( array(
				'name' => esc_html__( '(News) FrontPage 9', 'anton' ),
				'base' => 'pbr_frontpageposts9',
				'icon' => 'icon-wpb-news-9',
				"category" => esc_html__('PBR Widgets', 'anton'),
				'description' => esc_html__( 'Create Post having blog styles', 'anton' ),
				 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'anton' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'anton' ),
						"admin_label" => true
					),
 
					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'anton' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'anton' )
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Grid Columns", 'anton'),
						"param_name" => "grid_columns",
						"value" => array( 1 , 2 , 3 , 4 , 6),
						"std" => 1
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Show Pagination Links', 'anton' ),
						'param_name' => 'show_pagination',
						'description' => esc_html__( 'Enables to show paginations to next new page.', 'anton' ),
						'value' => array( esc_html__( 'Yes, please', 'anton' ) => 'yes' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'anton' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'anton' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'anton' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'anton' )
					)
				)
			) );

			 
			vc_map( array(
				'name' => esc_html__( '(News) FrontPage 3', 'anton' ),
				'base' => 'pbr_frontpageposts3',
				'icon' => 'icon-wpb-news-3',
				"category" => esc_html__('PBR Widgets', 'anton'),
				'description' => esc_html__( 'Create Post having blog styles', 'anton' ),
				 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'anton' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'anton' ),
						"admin_label" => true
					),	
					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'anton' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'anton' )
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Grid Columns", 'anton'),
						"param_name" => "grid_columns",
						"value" => array( 1 , 2 , 3 , 4 , 6),
						"std" => 1
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number Main Posts", 'anton'),
						"param_name" => "num_mainpost",
						'std' => '1',
				        "description" => esc_html__("", 'anton')
						
					),
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Show Pagination Links', 'anton' ),
						'param_name' => 'show_pagination',
						'description' => esc_html__( 'Enables to show paginations to next new page.', 'anton' ),
						'value' => array( esc_html__( 'Yes, please', 'anton' ) => 'yes' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'anton' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'anton' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'anton' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'anton' )
					)
				)
			) );

			vc_map( array(
				'name' => esc_html__( '(News) FrontPage 4', 'anton' ),
				'base' => 'pbr_frontpageposts4',
				'icon' => 'icon-wpb-news-4',
				"category" => esc_html__('PBR Widgets', 'anton'),
				'description' => esc_html__( 'Create Post having blog styles', 'anton' ),
				 
				'params' => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Widget title', 'anton' ),
						'param_name' => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'anton' ),
						"admin_label" => true
					),

				 
				 

					array(
						'type' => 'loop',
						'heading' => esc_html__( 'Grids content', 'anton' ),
						'param_name' => 'loop',
						'settings' => array(
							'size' => array( 'hidden' => false, 'value' => 4 ),
							'order_by' => array( 'value' => 'date' ),
						),
						'description' => esc_html__( 'Create WordPress loop, to populate content from your site.', 'anton' )
					),
					 
					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Show Pagination Links', 'anton' ),
						'param_name' => 'show_pagination',
						'description' => esc_html__( 'Enables to show paginations to next new page.', 'anton' ),
						'value' => array( esc_html__( 'Yes, please', 'anton' ) => 'yes' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Thumbnail size', 'anton' ),
						'param_name' => 'thumbsize',
						'description' => esc_html__( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'anton' )
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Extra class name', 'anton' ),
						'param_name' => 'el_class',
						'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'anton' )
					)
				)
			) );
		
	}
}

class Anton_VC_Elements implements Vc_Vendor_Interface {

	public function load(){ 
		
		/*********************************************************************************************************************
		 *  Our Service
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Featured Box", 'anton'),
		    "base" => "pbr_featuredbox",
		
		    "description"=> esc_html__('Decreale Service Info', 'anton'),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'anton'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"value" => '',    "admin_label" => true,
				),
				array(
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Title Color', 'anton' ),
				    'param_name' => 'title_color',
				    'description' => esc_html__( 'Select font color', 'anton' )
				),

		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Sub Title", 'anton'),
					"param_name" => "subtitle",
					"value" => '',
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'anton'),
					"param_name" => "style",
					'value' 	=> array(
						esc_html__('Default', 'anton') => 'default', 
						esc_html__('Version 1', 'anton') => 'v1', 
						esc_html__('Version 2', 'anton') => 'v2', 
						esc_html__('Version 3', 'anton' )=> 'v3',
						esc_html__('Version 4', 'anton') => 'v4'
					),
					'std' => ''
				),

				array(
					"type" => "attach_image",
					"heading" => esc_html__("Background Image", 'anton'),
					"param_name" => "background",
					"value" => '',
					'description'	=> esc_html__('Select background image for element', 'anton')
				),

				array(
					'type'                           => 'dropdown',
					'heading'                        => esc_html__( 'Title Alignment', 'anton' ),
					'param_name'                     => 'title_align',
					'value'                          => array(
					esc_html__( 'Align left', 'anton' )   => 'separator_align_left',
					esc_html__( 'Align center', 'anton' ) => 'separator_align_center',
					esc_html__( 'Align right', 'anton' )  => 'separator_align_right'
					),
					'std' => 'separator_align_left'
				),

			 	array(
					"type" => "textfield",
					"heading" => esc_html__("FontAwsome Icon", 'anton'),
					"param_name" => "icon",
					"value" => 'fa fa-gear',
					'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'anton' )
									. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
									. esc_html__( 'here to see the list', 'anton' ) . '</a>'
				),
				array(
				    'type' => 'colorpicker',
				    'heading' => esc_html__( 'Icon Color', 'anton' ),
				    'param_name' => 'color',
				    'description' => esc_html__( 'Select font color', 'anton' )
				),	
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Background Icon', 'anton' ),
					'param_name' => 'background',
					'value' => array(
						esc_html__( 'None', 'anton' ) => 'nostyle',
						esc_html__( 'Success', 'anton' ) => 'bg-success',
						esc_html__( 'Info', 'anton' ) => 'bg-info',
						esc_html__( 'Danger', 'anton' ) => 'bg-danger',
						esc_html__( 'Warning', 'anton' ) => 'bg-warning',
						esc_html__( 'Light', 'anton' ) => 'bg-default',
					),
					'std' => 'nostyle',
				),

				array(
					"type" => "attach_image",
					"heading" => esc_html__("Photo", 'anton'),
					"param_name" => "photo",
					"value" => '',
					'description'	=> ''
				),

				array(
					"type" => "textarea",
					"heading" => esc_html__("information", 'anton'),
					"param_name" => "information",
					"value" => 'Your Description Here',
					'description'	=> esc_html__('Allow  put html tags', 'anton' )
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
		 * Pricing Table
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Pricing", 'anton'),
		    "base" => "pbr_pricing",
		    "description" => esc_html__('Make Plan for membership', 'anton' ),
		    "class" => "",
		    "category" => esc_html__('PBR Widgets', 'anton'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"value" => '',
						"admin_label" => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Price", 'anton'),
					"param_name" => "price",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Currency", 'anton'),
					"param_name" => "currency",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Period", 'anton'),
					"param_name" => "period",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Subtitle", 'anton'),
					"param_name" => "subtitle",
					"value" => '',
					'description'	=> ''
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Is Featured", 'anton'),
					"param_name" => "featured",
					'value' 	=> array(  esc_html__('No', 'anton') => 0,  esc_html__('Yes', 'anton') => 1 ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Skin", 'anton'),
					"param_name" => "skin",
					'value' 	=> array(  esc_html__('Skin 1', 'anton') => 'v1',  esc_html__('Skin 2', 'anton') => 'v2', esc_html__('Skin 3', 'anton') => 'v3' ),
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Box Style", 'anton'),
					"param_name" => "style",
					'value' 	=> array( 'boxed' => esc_html__('Boxed', 'anton')),
				),

				array(
					"type" => "textarea_html",
					"heading" => esc_html__("Content", 'anton'),
					"param_name" => "content",
					"value" => '',
					'description'	=> esc_html__('Allow  put html tags', 'anton')
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Title", 'anton'),
					"param_name" => "linktitle",
					"value" => 'SignUp',
					'description'	=> ''
				),

				array(
					"type" => "textfield",
					"heading" => esc_html__("Link", 'anton'),
					"param_name" => "link",
					"value" => 'http://yourdomain.com',
					'description'	=> ''
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
		 *  PBR Counter
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => esc_html__("PBR Counter", 'anton'),
		    "base" => "pbr_counter",
		    "class" => "",
		    "description"=> esc_html__('Counting number with your term', 'anton'),
		    "category" => esc_html__('PBR Widgets', 'anton'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"value" => '',
					"admin_label"	=> true
				),
				array(
					"type" => "textarea",
					"heading" => esc_html__("Description", 'anton'),
					"param_name" => "description",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Number", 'anton'),
					"param_name" => "number",
					"value" => ''
				),
			 	array(
					"type" => "textfield",
					"heading" => esc_html__("FontAwsome Icon", 'anton'),
					"param_name" => "icon",
					"value" => '',
					'description'	=> esc_html__( 'This support display icon from FontAwsome, Please click', 'anton' )
									. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
									. esc_html__( 'here to see the list', 'anton' ) . '</a>'
				),
				array(
					"type" => "attach_image",
					"description" => esc_html__("If you upload an image, icon will not show.", 'anton'),
					"param_name" => "image",
					"value" => '',
					'heading'	=> esc_html__('Image', 'anton' )
				),	
				array(
					"type" => "colorpicker",
					"heading" => esc_html__("Text Color", 'anton'),
					"param_name" => "text_color",
					'value' 	=> '',
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
		 *  Social Links
		 *********************************************************************************************************************/
		vc_map( array(
			'name'        => esc_html__( 'PBR Social Links', 'anton'),
			'base'        => 'pbr_social_links',
			"class"       => "",
			"category" => esc_html__('PBR Widgets', 'anton'),
			'description' => esc_html__( 'Show social link for site', 'anton' ),
			"params"      => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'anton' ),
					'param_name' => 'title',
					'value'       => esc_html__( 'Find us on social networks', 'anton' ),
					'description' => esc_html__( 'Enter heading title.', 'anton' ),
					"admin_label" => true
				),
				//facebook
				array(
	                "type" => "checkbox",
	                "heading" => esc_html__("Show Facebook", 'anton'),
	                "param_name" => "show_facebook",
	                "value" => array(
	                    esc_html__('Yes, please', 'anton') => true
	                ),
	                'std' => true
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Facebook", 'anton'),
					"param_name" => "link_facebook",
					"value" => "",
					'std' => 'https://www.facebook.com/engotheme',
					'description' => esc_html__('Facebook page url. Example: https://www.facebook.com/engotheme', 'anton')
				),

				//twitter
				array(
	                "type" => "checkbox",
	                "heading" => esc_html__("Show Twitter", 'anton'),
	                "param_name" => "show_twitter",
	                "value" => array(
	                    esc_html__('Yes, please', 'anton') => true
	                ),
	                'std' => true
				),		
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Twitter", 'anton'),
					"param_name" => "link_twitter",
					"value" => "",
					'std' => 'https://twitter.com/engotheme',
					'description'	=> esc_html__('Insert the Twitter link. Example: https://twitter.com/engotheme', 'anton')
				),

				//Youtube
				array(
	                "type" => "checkbox",
	                "heading" => esc_html__("Show Youtube", 'anton'),
	                "param_name" => "show_youtube",
	                "value" => array(
	                    esc_html__('Yes, please', 'anton') => true
	                ),
	                'std' => true
				),					
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Youtube ", 'anton'),
					"param_name" => "link_youtube",
					"value" => "",
					'description' => esc_html__('Insert the YouTube link. Example: https://www.youtube.com/user/engotheme', 'anton'),
					'std' => 'https://www.youtube.com/user/engotheme'
				),

				//Pinterest
				array(
	                "type" => "checkbox",
	                "heading" => esc_html__("Show Pinterest", 'anton'),
	                "param_name" => "show_pinterest",
	                "value" => array(
	                    esc_html__('Yes, please', 'anton') => true
	                ),
	                'std' => true
				),	
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Pinterest ", 'anton'),
					"param_name" => "link_pinterest",
					"value" => "",
					'std' => 'https://www.pinterest.com/engotheme/',
					'description' => esc_html__('Insert the Pinterest link. Example: https://www.youtube.com/user/engotheme', 'anton'),
				),

				//Google plus
				array(
	                "type" => "checkbox",
	                "heading" => esc_html__("Show Google plus", 'anton'),
	                "param_name" => "show_google_plus",
	                "value" => array(
	                    esc_html__('Yes, please', 'anton') => true
	                ),
	                'std' => true
				),
				
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link Google plus", 'anton'),
					"param_name" => "link_google_plus",
					"value" => "#",
					'std' => 'https://plus.google.com/+WPOpal',
					'description' => esc_html__('Insert the Pinterest link. Example: https://plus.google.com/+WPOpal', 'anton'),
				),
				
				// LinkedIn
				array(
	                "type" => "checkbox",
	                "heading" => esc_html__("Show LinkedIn", 'anton'),
	                "param_name" => "show_linkedIn",
	                "value" => array(
	                    esc_html__('Yes, please', 'anton') => true
	                ),
	                'std' => false
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Link LinkedIn", 'anton'),
					"param_name" => "link_linkedIn",
					"value" => "#",
					'description' => esc_html__('Insert the Pinterest link. Example: https://www.linkedin.com/pub/opal-wordpress/67/a25/565', 'anton'),
					'std' => 'https://www.linkedin.com/pub/opal-wordpress/67/a25/565'
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'anton'),
					"param_name" => "style",
					'value' 	=> array( 
						esc_html__('Style v1', 'anton') => 'style-1', 
						esc_html__('Style v2', 'anton') => 'style-2'
					),
					'std' => 'style-1'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'anton' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'anton' )
				),
				
			),
		));
		 
	}
}



require_once  vc_path_dir('SHORTCODES_DIR', 'vc-posts-grid.php')  ;
class WPBakeryShortCode_PBR_Frontpageposts3 extends WPBakeryShortCode_VC_Posts_Grid {}
class WPBakeryShortCode_PBR_Frontpageposts4 extends WPBakeryShortCode_VC_Posts_Grid {}
class WPBakeryShortCode_PBR_Frontpageposts9 extends WPBakeryShortCode_VC_Posts_Grid {}

/**
 * Elements
 */
class WPBakeryShortCode_Pbr_featuredbox  extends WPBakeryShortCode {}
class WPBakeryShortCode_Pbr_pricing 	 extends WPBakeryShortCode {}
/**
 * Themes
 */
class WPBakeryShortCode_Pbr_title_heading   extends WPBakeryShortCode {}
class WPBakeryShortCode_Pbr_verticalmenu extends WPBakeryShortCode {}

class WPBakeryShortCode_Pbr_banner_countdown extends WPBakeryShortCode {}
class WPBakeryShortCode_pbr_social_links extends WPBakeryShortCode {}

class WPBakeryShortCode_pbr_counter extends WPBakeryShortCode {}
