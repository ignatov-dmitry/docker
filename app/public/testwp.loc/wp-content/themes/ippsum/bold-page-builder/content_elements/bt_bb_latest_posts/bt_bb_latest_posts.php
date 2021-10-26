<?php

class bt_bb_latest_posts extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'rows'            		=> '',
			'columns'         		=> '',
			'gap'             		=> '',
			'size'   				=> '',

			'category'        		=> '',
			'target'          		=> '',
			'shape'     			=> '',
			'show_category'   		=> '',
			'show_date'       		=> '',
			'show_author'     		=> '',
			'show_comments'   		=> '',
			'show_excerpt'    		=> '',
			'lazy_load'  			=> 'no',
			'supertitle_style'   	=> '',
			'color_scheme' 			=> '',
			'style' 	=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}	
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}
		
		if ( $columns != '' ) {
			$class[] = $this->prefix . 'columns' . '_' . $columns;
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		if ( $supertitle_style != '' ) {
			$class[] = $this->prefix . 'supertitle_style_' . $supertitle_style ;
		}

		if ( $gap != '' ) {
			$class[] = $this->prefix . 'gap' . '_' . $gap;
		}
		
		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}


		$date_design_format         = 'j F';
		$date_design_format_day     = 'j';
		$date_design_format_month   = 'F';

		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$number = $rows * $columns;
		
		$posts = bt_bb_get_posts( $number, 0, $category );
		
		$output = '';

		foreach( $posts as $post_item ) {

			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item">';
				$post_thumbnail_id = get_post_thumbnail_id( $post_item['ID'] );

				if ( $post_thumbnail_id != '' ) {
					$img = wp_get_attachment_image_src( $post_thumbnail_id, $size );
					if ( $lazy_load == 'yes' ) {
						$img_src = BT_BB_Root::$path . 'img/blank.gif';
						$img_class = 'btLazyLoadImage';
						$data_img = ' data-image_src="' . esc_attr( $img[0] ) . '" ';
					} else {
						$img_src = $img[0];
						$img_class = '';
						$data_img = '';
					}
					$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_image"><a href="' . esc_url_raw( $post_item['permalink'] ) . '" target="' . esc_attr( $target ) . '"><img src="' . esc_url_raw( $img_src ) . '" alt="' . esc_attr( $post_item['title'] ) . '" title="' . esc_attr( $post_item['title'] ) . '" class="' . esc_attr( $img_class ) . '" ' . $data_img .  '></a></div>';
				}

				$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_content">';
				
					

					if ( $show_date == 'show_date' || $show_author == 'show_author' || $show_author == 'show_comments' || $show_category == 'show_category' ) {
				
						$meta_output = '<div class="' . esc_attr( $this->shortcode ) . '_item_meta">';

							if ( $show_category == 'show_category' ) {
								$meta_output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_category">';
									$meta_output .= $post_item['category_list'];
								$meta_output .= '</div>';
							}

							if ( $show_author == 'show_author' ) {
								$meta_output .= '<span class="' . esc_attr( $this->shortcode ) . '_item_author">';
									$meta_output .= esc_html__( 'by', 'ippsum' ) . ' ' . $post_item['author'];
								$meta_output .= '</span>';
							}

							
							if ( $show_date == 'show_date' ) {
								$meta_output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_date">';
									
									if ( $date_design_format_day != '' && $date_design_format_month != '' ) {
										

										$meta_output .= '<span class="' . esc_attr( $this->shortcode ) . '_item_date_month">';
											$meta_output .= get_the_date( $date_design_format_month, $post_item['ID'] );
										$meta_output .= '</span>';

										$meta_output .= '<span class="' . esc_attr( $this->shortcode ) . '_item_date_day">';
											$meta_output .= get_the_date( $date_design_format_day, $post_item['ID'] );
										$meta_output .= '</span>';


									} else {
										$meta_output .= get_the_date( $date_design_format, $post_item['ID'] );
									}  

								$meta_output .= '</div>';
							}

							

							if ( $show_comments == 'show_comments' && $post_item['comments'] != '' ) {
								$meta_output .= '<span class="' . esc_attr( $this->shortcode ) . '_item_comments">';
									$meta_output .= $post_item['comments'];
								$meta_output .= '</span>';
							}
				
						$meta_output .= '</div>';
		
						$output .= $meta_output;
		
					}

					$output .= '<h5 class="' . esc_attr( $this->shortcode ) . '_item_title">';
						$output .= '<a href="' . esc_url_raw( $post_item['permalink'] ) . '" target="' . esc_attr( $target ) . '">' . $post_item['title'] . '</a>';
					$output .= '</h5>';
					
					if ( $show_excerpt == 'show_excerpt' ) {
						$output .= '<div class="' . esc_attr( $this->shortcode ) . '_item_excerpt">';
							$output .= $post_item['excerpt'];
						$output .= '</div>';
					}

					// ARROW - URL TEXT
					if ( $style == 'accent') {

						$output .= '<div class="' . esc_attr( $this->shortcode . '_arrow' ) . '"><a href="' . esc_url_raw( $post_item['permalink'] ) . '" target="' . esc_attr( $target ) . '"><span></span></a></div>';
					}

				$output .= '</div>';
				
			$output .= '</div>';
		}

		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . $output . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Latest Posts', 'ippsum' ), 'description' => esc_html__( 'List of latest posts', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'rows', 'type' => 'textfield', 'value' => '1', 'heading' => esc_html__( 'Rows', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'columns', 'type' => 'dropdown', 'value' => '3', 'heading' => esc_html__( 'Columns', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( '1', 'ippsum' ) => '1',
						esc_html__( '2', 'ippsum' ) => '2',
						esc_html__( '3', 'ippsum' ) => '3',
						esc_html__( '4', 'ippsum' ) => '4',
						esc_html__( '6', 'ippsum' ) => '6'
					)
				),
				array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Gap', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Normal', 'ippsum' ) 	=> 'normal',
						esc_html__( 'No gap', 'ippsum' ) 	=> 'no_gap',
						esc_html__( 'Small', 'ippsum' ) 	=> 'small',
						esc_html__( 'Large', 'ippsum' ) 	=> 'large'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'ippsum' ), 'preview' => true,
					'value' => bt_bb_get_image_sizes()
				),
				array( 'param_name' => 'category', 'type' => 'textfield', 'heading' => esc_html__( 'Category', 'ippsum' ), 'description' => esc_html__( 'Enter category slug or leave empty to show all', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'ippsum' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'ippsum' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'ippsum' ) => '_blank',
					)
				),
				
				array( 'param_name' => 'show_category', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'show_category' ), 'heading' => esc_html__( 'Show category', 'ippsum' ), 'preview' => true
				),
				array( 'param_name' => 'show_date', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'show_date' ), 'heading' => esc_html__( 'Show date', 'ippsum' ), 'preview' => true
				),
				array( 'param_name' => 'show_author', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'show_author' ), 'heading' => esc_html__( 'Show author', 'ippsum' ), 'preview' => true
				),
				array( 'param_name' => 'show_comments', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'show_comments' ), 'heading' => esc_html__( 'Show number of comments', 'ippsum' ), 'preview' => true
				),
				array( 'param_name' => 'show_excerpt', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'show_excerpt' ), 'heading' => esc_html__( 'Show excerpt', 'ippsum' ), 'preview' => true
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load images', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) => 'no',
						esc_html__( 'Yes', 'ippsum' ) => 'yes'
					)
				),

				
				
				array( 'param_name' => 'style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'default' => '', 'heading' => esc_html__( 'Style', 'ippsum' ),
					'value' => array(
						esc_html__( 'White background, light grey background on hover', 'ippsum' ) => '',
						esc_html__( 'Light grey background, white background on hover', 'ippsum' ) => 'grey',
						esc_html__( 'Accent border, accent arrow on hover', 'ippsum' ) 			=> 'accent'
					)
				),
				array( 'param_name' => 'shape', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'ippsum' ),
					'value' => array(
						esc_html__( 'Square', 'ippsum' ) 	=> 'square',
						esc_html__( 'Rounded', 'ippsum' ) 	=> 'rounded'
					)
				),
				array( 'param_name' => 'supertitle_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Details style', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Transparent 60%', 'ippsum' ) 		=> 'transparent'
					)
				),
				array( 'param_name' => 'color_scheme', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Text color scheme', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true )
			)
		) );
	} 
}