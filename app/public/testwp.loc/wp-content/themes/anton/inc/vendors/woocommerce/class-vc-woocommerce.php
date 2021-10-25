<?php 
if( class_exists("WPBakeryShortCode") ){
	/**
	 * Class Anton_VC_Woocommerces
	 *
	 */
	class Anton_VC_Woocommerce  implements Vc_Vendor_Interface  {

		/**
		 * register and mapping shortcodes
		 */
		public function product_category_field_search( $search_string ) {
			$data = array();
			$vc_taxonomies_types = array('product_cat');
			$vc_taxonomies = get_terms( $vc_taxonomies_types, array(
				'hide_empty' => false,
				'search' => $search_string
			) );
			if ( is_array( $vc_taxonomies ) && ! empty( $vc_taxonomies ) ) {
				foreach ( $vc_taxonomies as $t ) {
					if ( is_object( $t ) ) {
						$data[] = vc_get_term_object( $t );
					}
				}
			}
			return $data;
		}

		public function product_category_render($query) {  
			$category = get_term_by('id', (int)$query['value'], 'product_cat');
			if ( ! empty( $query ) && !empty($category)) {
				$data = array();
				$data['value'] = $category->term_id;
				$data['label'] = $category->name;
				return ! empty( $data ) ? $data : false;
			}
			return false;
		}

		/**
		 * register and mapping shortcodes
		 */
		public function load(){  

			$shortcodes = array( 'pbr_products', 'pbr_products_collection', 'pbr_product_categories_tab' ); 

			foreach( $shortcodes as $shortcode ){
				add_filter( 'vc_autocomplete_'. $shortcode .'_categories_callback', array($this, 'product_category_field_search'), 10, 1 );
			 	add_filter( 'vc_autocomplete_'. $shortcode .'_categories_render', array($this, 'product_category_render'), 10, 1 );
			}


			$order_by_values = array(
				'',
				esc_html__( 'Date', 'anton' ) => 'date',
				esc_html__( 'ID', 'anton' ) => 'ID',
				esc_html__( 'Author', 'anton' ) => 'author',
				esc_html__( 'Title', 'anton' ) => 'title',
				esc_html__( 'Modified', 'anton' ) => 'modified',
				esc_html__( 'Random', 'anton' ) => 'rand',
				esc_html__( 'Comment count', 'anton' ) => 'comment_count',
				esc_html__( 'Menu order', 'anton' ) => 'menu_order',
			);

			$options = array(    
                esc_html__( 'Latest Product', 'anton' ) 		=> 'recent_products',
                esc_html__( 'Sale Product', 'anton' )   		=> 'sale_products',
                esc_html__( 'Featured Product', 'anton' ) 		=> 'featured_products',
                esc_html__( 'Best Selling', 'anton' ) 			=> 'best_selling_products',
                esc_html__( 'Top Rate', 'anton' ) 				=> 'top_rate',
            ); 

			$order_way_values = array(
				'',
				esc_html__( 'Descending', 'anton' ) => 'DESC',
				esc_html__( 'Ascending', 'anton' ) => 'ASC',
			);
			$product_categories_dropdown = array(''=> esc_html__('None', 'anton') );
			$block_styles = anton_fnc_get_widget_block_styles();
			
			$product_columns_deal = array(1, 2, 3, 4);

			if( is_admin() ){
					$args = array(
						'type' => 'post',
						'child_of' => 0,
						'parent' => '',
						'orderby' => 'name',
						'order' => 'ASC',
						'hide_empty' => false,
						'hierarchical' => 1,
						'exclude' => '',
						'number' => '',
						'taxonomy' => 'product_cat',
						'pad_counts' => false,

					);

					$categories = get_categories( $args );
					anton_fnc_woocommerce_getcategorychilds( 0, $categories, 0, $product_categories_dropdown );
					
			}
		    vc_map( array(
		        "name" => esc_html__("PBR Product Deals", 'anton'),
		        "base" => "pbr_product_deals",
		        "class" => "",
		    	"category" => esc_html__('PBR Woocommerce', 'anton'),
		    	'description'	=> esc_html__( 'Display Product Sales with Count Down', 'anton' ),
		        "params" => array(
		            array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Title', 'anton'),
		                "param_name" => "title",
		            ),

		             array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title', 'anton'),
		                "param_name" => "subtitle",
		            ),

		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Extra class name", 'anton'),
		                "param_name" => "el_class",
		                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
		            ),
		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Number items to show", 'anton'),
		                "param_name" => "number",
		                'std' => '1',
		                "description" => esc_html__("", 'anton')
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Columns count", 'anton'),
		                "param_name" => "columns_count",
		                "value" => $product_columns_deal,
		                'std' => '2',
		                "description" => esc_html__("Select columns count.", 'anton')
		            ),
		            array(
		                "type" => "dropdown",
		                "heading" => esc_html__("Layout", 'anton'),
		                "param_name" => "layout",
		                "value" => array(esc_html__('Carousel', 'anton') => 'carousel', esc_html__('Grid', 'anton') =>'grid' ),
		                "admin_label" => true,
		                "description" => esc_html__("Select columns count.", 'anton')
		            )
		        )
		    ));
	 
		    //// 
		    vc_map( array(
		        "name" => esc_html__( "PBR Products On Sale", 'anton' ),
		        "base" => "pbr_products_onsale",
		        "class" => "",
		    	"category" => esc_html__( 'PBR Woocommerce', 'anton' ),
		    	'description'	=> esc_html__( 'Display Products Sales With Pagination', 'anton' ),
		        "params" => array(
		            array(
		                "type" 		  => "textfield",
		                "class" 	  => "",
		                "heading" 	  => esc_html__( 'Title', 'anton' ),
		                "param_name"  => "title",
		                "admin_label" => true
		            ),
		             array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title', 'anton'),
		                "param_name" => "subtitle",
		            ),
		            array(
		                "type" => "textfield",
		                "heading" => esc_html__("Number items to show", 'anton'),
		                "param_name" => "number",
		                'std' => '9',
		                "description" => esc_html__("", 'anton'),
		                  "admin_label" => true
		            ),
		             array(
		                "type" 		  => "dropdown",
		                "heading" 	  => esc_html__( "Columns count", 'anton' ),
		                "param_name"  => "columns_count",
		                "value" 	  => array(6,5,4,3,2,1),
		                "admin_label" => false,
		                "description" => esc_html__( "Select columns count.", 'anton' )
		            ),

		            array(
		                "type" 		  => "textfield",
		                "heading" 	  => esc_html__( "Extra class name", 'anton' ),
		                "param_name"  => "el_class",
		                "description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
		            )
		        )
		    ));
		  
			/**
			 * pbr_productcategory
			 */
		 
			$sidebar_product_lists = array(
				esc_html__('None', 'anton') => 'none',
				esc_html__('New Arrives', 'anton') => 'recent_product',
				esc_html__('Special Products', 'anton') => 'on_sale'
			);
			$product_layout = array('Grid'=>'grid','List'=>'list','Carousel'=>'carousel', 'Special'=>'special', 'List-v1' => 'list-v1');
			$product_type = array('Best Selling'=>'best_selling','Featured Products'=>'featured_product','Top Rate'=>'top_rate','Recent Products'=>'recent_product','On Sale'=>'on_sale','Recent Review' => 'recent_review' );
			$product_columns = array(6 ,5 ,4 , 3, 2, 1);
			$show_tab = array(
			                array('recent', esc_html__('Latest Products', 'anton')),
			                array( 'featured_product', esc_html__('Featured Products', 'anton' )),
			                array('best_selling', esc_html__('BestSeller Products', 'anton' )),
			                array('top_rate', esc_html__('TopRated Products', 'anton' )),
			                array('on_sale', esc_html__('Special Products', 'anton' ))
			            );


			/**
			 * pbr_products
			 */
			vc_map( array(
			    "name" => esc_html__("PBR Products", 'anton'),
			    "base" => "pbr_products",
			    'description'=> esc_html__( 'Show products as bestseller, featured in block', 'anton' ),
			    "class" => "",
			   "category" => esc_html__('PBR Woocommerce', 'anton'),
			    "params" => array(
			    	array(
						"type" => "textfield",
						"heading" => esc_html__("Title", 'anton'),
						"param_name" => "title",
						"admin_label" => true,
						"value" => ''
					),
					 array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Sub Title', 'anton'),
		                "param_name" => "subtitle",
		            ),
					array(
						"type" => "dropdown",
						"heading" => esc_html__('Category', 'anton'),
						"param_name" => "term_id",
						"value" =>$product_categories_dropdown,	"admin_label" => true
					),
			    	array(
						"type" => "dropdown",
						"heading" => esc_html__("Type", 'anton'),
						"param_name" => "type",
						"value" => $product_type,
						"admin_label" => true,
						"description" => esc_html__("Select columns count.", 'anton')
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Style", 'anton'),
						"param_name" => "style",
						"value" => $product_layout
					),
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Columns count", 'anton'),
						"param_name" => "columns_count",
						"value" => $product_columns,
						"admin_label" => true,
						"description" => esc_html__("Select columns count.", 'anton')
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Number of products to show", 'anton'),
						"param_name" => "number",
						"value" => '4'
					),
					array(
		                "type" => "textfield",
		                "class" => "",
		                "heading" => esc_html__('Text button', 'anton'),
		                "param_name" => "text_button",
		            ),
					array(
						'type' => 'vc_link',
						'heading' => __( 'URL (Link)', 'anton' ),
						'param_name' => 'link_button',
						'description' => __( 'Add link to button.', 'anton' ),
					),
					array(
						"type" => "textfield",
						"heading" => esc_html__("Extra class name", 'anton'),
						"param_name" => "el_class",
						"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
					)
			   	)
			));
			 
		// Category
		vc_map( array(
			'name'        => esc_html__( 'PBR Category', 'anton' ),
			'base'        => 'pbr_category',
			'icon'        => 'icon-wpb-woocommerce',
			'category'    => esc_html__( 'PBR Woocommerce', 'anton' ),
			'description' => esc_html__( 'Display SubCategory', 'anton' ),

			'params' => array(
				array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an image for category", 'anton'),
					"param_name"  => "image",
					"value"       => '',
					'heading'     => esc_html__('Image', 'anton' )
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__( 'Content Position', 'anton' ),
					'param_name' => 'content_position',
					'value'      => array(
						esc_html__('Center', 'anton')                 => 'content_center',
						esc_html__('Center-left', 'anton')            => 'content_center_left',
						esc_html__('Center-Right', 'anton')           => 'content_center_right',
						esc_html__('Bottom-left', 'anton')            => 'content_bottom_left',
						esc_html__('Bottom-right', 'anton')           => 'content_bottom_right',
						esc_html__('Bottom-left-inset', 'anton')      => 'content_bottom_left_inset',
						esc_html__('Speacial-center', 'anton')        => 'content_special_center',
						esc_html__('Speacial-center-bottom', 'anton') => 'content_special_bottom'
					),
					'description' =>  esc_html__( 'Display title, description on left or right ...', 'anton' ),
					'std'         => 'content_center'
				),
				array(
					'type' 			=> 'dropdown',
					'heading' 		=> esc_html__( 'Category', 'anton' ),
					'value' 		=> $product_categories_dropdown,
					"admin_label" 	=> true,
					'param_name' 	=> 'category',
					'description' 	=> esc_html__( 'Product category list', 'anton' ),
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Description", 'anton'),
					"param_name"  => "desc",
					"description" => esc_html__("Just description for Category on frontend page.", 'anton')
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display button shop now', 'anton' ),
					'param_name' => 'btn_item',
					'value' => array(
						esc_html__('Yes', 'anton') 	=> 1,
						esc_html__('No', 'anton') 	=> 0
					),
					'description' =>  esc_html__( 'Display call to action button', 'anton' ),
					'std' => 1
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Extra class name", 'anton'),
					"param_name"  => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				)
			)
		) );

		// Product Item Deal
		vc_map( array(
			'name'        => esc_html__( 'PBR To Day Deal', 'anton' ),
			'base'        => 'pbr_today_deal',
			'icon'        => 'icon-wpb-woocommerce',
			'category'    => esc_html__( 'PBR Woocommerce', 'anton' ),
			'description' => esc_html__( 'Display Product Item deal', 'anton' ),

			'params' => array(
				array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => esc_html__('Title', 'anton'),
	                "param_name" => "title",
	            ),

	            array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => esc_html__('Sub Title', 'anton'),
	                "param_name" => "subtitle",
	            ),

	            array(
					"type" => "textarea",
					"heading" => esc_html__("information", 'anton'),
					"param_name" => "description",
					"value" => 'Your Description Here',
					'description'	=> esc_html__('Allow  put html tags', 'anton' )
				),

	            array(
	                "type" => "textfield",
	                "heading" => esc_html__("Number items to show", 'anton'),
	                "param_name" => "number",
	                'std' => '1',
	                "description" => esc_html__("Number items to show", 'anton')
	            ),

	            array(
					"type" => "dropdown",
					"heading" => esc_html__("style", 'anton'),
					"param_name" => "layer_style",
					'value' 	=> array(
						esc_html__('Style v1', 'anton') => 'style-v1',
						esc_html__('Style v2', 'anton') => 'style-v2',
					),
					'std' => ''
				), 

	            array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an image", 'anton'),
					"param_name"  => "photo",
					"value"       => '',
					'heading'     => esc_html__('Image', 'anton' )
				),

				array(
				    'type' => 'textfield',
				    'heading' => esc_html__( 'Date Expired', 'anton' ),
				    'param_name' => 'input_datetime',
				    'description' => esc_html__( 'Select font color', 'anton' ),
				),

				array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => esc_html__('Text button', 'anton'),
	                "param_name" => "text_button",
	            ),

				array(
					'type' => 'vc_link',
					'heading' => __( 'URL (Link)', 'anton' ),
					'param_name' => 'link_button',
					'description' => __( 'Add link to button.', 'anton' ),
				),

				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Extra class name", 'anton'),
					"param_name"  => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				),
			)
		) );

		// Custom content
		vc_map( array(
			'name'        => esc_html__( 'PBR Custom Content', 'anton' ),
			'base'        => 'pbr_custom_content',
			'icon'        => 'icon-wpb-woocommerce',
			'category'    => esc_html__( 'PBR Woocommerce', 'anton' ),
			'description' => esc_html__( 'Display content banner', 'anton' ),

			'params' => array(
				array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => esc_html__('Title', 'anton'),
	                "param_name" => "title",
	            ),

	            array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => esc_html__('Sub Title', 'anton'),
	                "param_name" => "subtitle",
	            ),

	            array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an image", 'anton'),
					"param_name"  => "image_banner",
					"value"       => '',
					'heading'     => esc_html__('Image', 'anton' )
				),

				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Extra class name", 'anton'),
					"param_name"  => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				),
				
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Display button shop now', 'anton' ),
					'param_name' => 'button',
					'value' => array(
						esc_html__('Yes', 'anton') 	=> 1,
						esc_html__('No', 'anton') 	=> 0
					),
					'description' =>  esc_html__( 'Display call to action button', 'anton' ),
					'std' => 1
				),

	            array(
					"type" => "textarea",
					"heading" => esc_html__("information", 'anton'),
					"param_name" => "description",
					"value" => 'Your Description Here',
					'description'	=> esc_html__('Allow  put html tags', 'anton' )
				),
			)
		) );

		// video link
		vc_map( array(
			'name'        => esc_html__( 'PBR Video Link', 'anton' ),
			'base'        => 'pbr_video_link',
			'icon'        => 'icon-wpb-woocommerce',
			'category'    => esc_html__( 'PBR Woocommerce', 'anton' ),
			'description' => esc_html__( 'Display video', 'anton' ),

			'params' => array(
				array(
					"type"       => "textfield",
					"class"      => "",
					"heading"    => esc_html__('Title', 'anton'),
					"param_name" => "title",
	            ),

	            array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an image icon", 'anton'),
					"param_name"  => "icon_video",
					"value"       => '',
					'heading'     => esc_html__('Image', 'anton' )
				),

				array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an background image", 'anton'),
					"param_name"  => "bg_video",
					"value"       => '',
					'heading'     => esc_html__('Backgound Image', 'anton' )
				),

				array(
					"type"       => "textfield",
					"class"      => "",
					"heading"    => esc_html__('link', 'anton'),
					"param_name" => "link",
				),

				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Extra class name", 'anton'),
					"param_name"  => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				),
			)
		) );

		//Product categories tab
		vc_map( array(
			'name' => esc_html__( 'PBR Product Categories Tab ', 'anton' ),
			'base' => 'pbr_product_categories_tab',
			'icon' => 'icon-wpb-woocommerce',
			'category' => esc_html__( 'PBR Woocommerce', 'anton' ),
			'description' => esc_html__( 'Display product categories tab', 'anton' ),
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'anton' ),
					'param_name' => 'title',
					'description' => esc_html__( 'Enter title ', 'anton' ),
				),
		        array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Product type', 'anton' ),
					'value' => $options,
					'param_name' => 'product_type',
					'default' => 'recent_products',
					'description' => esc_html__( 'Select Product type', 'anton' ),
				),
				array(
				    'type' => 'autocomplete',
				    'heading' => esc_html__( 'Categories', 'anton' ),
				    'value' => '',
				    'param_name' => 'categories',
				    "admin_label" => true,
				    'description' => esc_html__( 'Select Category', 'anton' ),
				    'settings' => array(
				     'multiple' => true,
				     'unique_values' => true,
				     // In UI show results except selected. NB! You should manually check values in backend
				    ),
			   	),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Per page', 'anton' ),
					'value' => 12,
					'param_name' => 'per_page',
					'description' => esc_html__( 'How much items per page to show', 'anton' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns', 'anton' ),
					'value' => array(1,2,3,4,5,6),
					'param_name' => 'columns',
					'description' => esc_html__( 'How much columns grid', 'anton' ),
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__('Extra class name', 'anton'),
					"param_name"  => "el_class",
					"description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'anton')
				)
			)
		) );
		/**
		 * pbr_all_products
		 */
		vc_map( array(
		    "name" => esc_html__("PBR Products Tabs", 'anton'),
		    "base" => "pbr_tabs_products",
		    'description'	=> esc_html__( 'Display BestSeller, TopRated ... Products In tabs', 'anton' ),
		    "class" => "",
		    "category" => esc_html__('PBR Woocommerce', 'anton'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"value" => ''
				),
				 array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => esc_html__('Sub Title', 'anton'),
	                "param_name" => "subtitle",
	            ),
				array(
		            "type" => "sorted_list",
		            "heading" => esc_html__("Show Tab", 'anton'),
		            "param_name" => "show_tab",
		            "description" => esc_html__("Control teasers look. Enable blocks and place them in desired order.", 'anton'),
		            "value" => "recent,featured_product,best_selling",
		            "options" => $show_tab
		        ),
		        array(
					"type" => "dropdown",
					"heading" => esc_html__("Style", 'anton'),
					"param_name" => "style",
					"value" => $product_layout
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Number of products to show", 'anton'),
					"param_name" => "number",
					"value" => '4'
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Columns count", 'anton'),
					"param_name" => "columns_count",
					"value" => $product_columns,
					"description" => esc_html__("Select columns count.", 'anton')
				),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'anton'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				)
		   	)
		));
		/**
		 * pbr_all_products
		 */
		vc_map( array(
		    "name" => esc_html__("PBR Banner Link", 'anton'),
		    "base" => "pbr_banner_link",
		    'icon' => 'icon-wpb-single-image',
		    'description'	=> esc_html__( 'Display Banner link', 'anton' ),
		    "class" => "",
		    "category" => esc_html__('PBR Woocommerce', 'anton'),
		    "params" => array(
		    	array(
					"type" => "textfield",
					"heading" => esc_html__("Title", 'anton'),
					"param_name" => "title",
					"value" => ''
				),
				array(
					"type"        => "attach_image",
					"description" => esc_html__("Upload an image", 'anton'),
					"param_name"  => "img_banner",
					"value"       => '',
					'heading'     => esc_html__('Image', 'anton' )
				),			
				array(
					'type' => 'textfield',
					'heading' => __( 'Image size', 'anton' ),
					'param_name' => 'img_size',
					'value' => 'thumbnail',
					'description' => __( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'anton' ),
				),	
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Style Effect", 'anton'),
					"param_name" => "style_effect",
					'value' 	=> array(
						esc_html__('Effect v1', 'anton') => 'effect-v1',
						esc_html__('Effect v2', 'anton') => 'effect-v2',
						esc_html__('Effect v3', 'anton') => 'effect-v3',
						esc_html__('Effect v4', 'anton') => 'effect-v4',
						esc_html__('Effect v5', 'anton') => 'effect-v5',
					),
					'std' => ''
				),
				array(
					"type" => "dropdown",
					"heading" => esc_html__("Image Alignment", 'anton'),
					"param_name" => "img_alignment",
					'value' 	=> array(
						esc_html__('left', 'anton') => 'Left',
						esc_html__('center', 'anton') => 'Center',
						esc_html__('right', 'anton') => 'Right',
					),
					'std' => ''
				),
				array(
					'type' => 'vc_link',
					'heading' => __( 'URL (Link)', 'anton' ),
					'param_name' => 'link_banner',
					'description' => __( 'Add link to button.', 'anton' ),
				),
				vc_map_add_css_animation(),
				array(
					"type" => "textfield",
					"heading" => esc_html__("Extra class name", 'anton'),
					"param_name" => "el_class",
					"description" => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'anton')
				)
		   	)
		));


		$allpages = array( esc_html__( ' --- Do not show --- ', 'anton' ) => '' );
		if ( is_admin() ) {
			$args = array(
				'sort_order' => 'desc',
				'sort_column' => 'date',
				'post_type' => 'page',
				'post_status' => 'publish'
			);
			$pages = get_pages($args);
			if ( !empty($pages) ) {
				foreach ($pages as $page) {
					$allpages[$page->post_title] = $page->post_name;
				}
			}
		}

		}
	}	

	/**
	  * Register Woocommerce Vendor which will register list of shortcodes
	  */
	function anton_fnc_init_vc_woocommerce_vendor(){

		$vendor = new Anton_VC_Woocommerce();
		add_action( 'vc_after_set_mode', array(
			$vendor,
			'load'
		) );

	}
	add_action( 'after_setup_theme', 'anton_fnc_init_vc_woocommerce_vendor' , 9 );   
}	


if( class_exists("WPBakeryShortCode") ){
	
	class WPBakeryShortCode_PBR_Tabs_Products extends WPBakeryShortCode {

		public function getListQuery( $atts ){ 
			$this->atts  = $atts; 
			$list_query = array();
			$types = explode(',', $this->atts['show_tab']);
			foreach ($types as $type) {
				$list_query[$type] = $this->getTabTitle($type);
			}


			return $list_query;
		}

		public function getTabTitle($type){ 
			switch ($type) {
				case 'recent':
					return array('title'=>esc_html__('Latest Products', 'anton'),'title_tab'=>esc_html__('Latest', 'anton'));
				case 'featured_product':
					return array('title'=>esc_html__('Featured Products', 'anton'),'title_tab'=>esc_html__('Featured', 'anton'));
				case 'top_rate':
					return array('title'=> esc_html__('Top Rated Products', 'anton'),'title_tab'=>esc_html__('Top Rated', 'anton'));
				case 'best_selling':
					return array('title'=>esc_html__('BestSeller Products', 'anton'),'title_tab'=>esc_html__('BestSeller', 'anton'));
				case 'on_sale':
					return array('title'=>esc_html__('Special Products', 'anton'),'title_tab'=>esc_html__('Special', 'anton'));
			}
		}
	}

	//====================================================
	class WPBakeryShortCode_Pbr_product_deals extends WPBakeryShortCode {}
	class WPBakeryShortCode_Pbr_products_onsale extends WPBakeryShortCode {}
	class WPBakeryShortCode_Pbr_products extends WPBakeryShortCode {}	 
	class WPBakeryShortCode_Pbr_today_deal extends WPBakeryShortCode {}
	class WPBakeryShortCode_Pbr_product_categories_tab extends WPBakeryShortCode {}
	class WPBakeryShortCode_Pbr_Category extends WPBakeryShortCode {}
	class WPBakeryShortCode_pbr_banner_link extends WPBakeryShortCode {}

	class WPBakeryShortCode_pbr_custom_content extends WPBakeryShortCode {}
	class WPBakeryShortCode_Pbr_video_link extends WPBakeryShortCode {}
 }
	