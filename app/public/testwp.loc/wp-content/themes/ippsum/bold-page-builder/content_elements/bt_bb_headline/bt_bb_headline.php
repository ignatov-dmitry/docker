<?php

class bt_bb_headline extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'headline'      		=> '',
			'html_tag'      		=> '',
			'font'          		=> '',
			'font_subset'   		=> '',
			'size'     				=> '',
			'font_size'     		=> '',
			'font_weight'   		=> '',
			'supertitle_font_weight' => '',
			'subtitle_font_weight' 	=> '',
			'color_scheme'  		=> '',
			'color'         		=> '',
			'supertitle_position'   => '',
			'supertitle_style'   	=> '',
			'dash'          		=> '',
			'align'         		=> '',
			'url'           		=> '',
			'target'        		=> '',
			'superheadline' 		=> '',
			'subheadline'   		=> ''
		) ), $atts, $this->shortcode ) );

		$superheadline = html_entity_decode( $superheadline, ENT_QUOTES, 'UTF-8' );
		$subheadline = html_entity_decode( $subheadline, ENT_QUOTES, 'UTF-8' );
		$headline = html_entity_decode( $headline, ENT_QUOTES, 'UTF-8' );

		if ( $font != '' && $font != 'inherit' ) {
			require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
			bt_bb_enqueue_google_font( $font, $font_subset );
		}

		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		
		$html_tag_style = "";
		$html_tag_style_arr = array();
		if ( $font != '' && $font != 'inherit' ) {
			$el_style = $el_style . ';' . 'font-family:\'' . urldecode( $font ) . '\'';
			$html_tag_style_arr[] = 'font-family:\'' . urldecode( $font ) . '\'';
		}
		if ( $font_size != '' ) {
			$html_tag_style_arr[] = 'font-size:' . $font_size  ;
		}
		if ( count( $html_tag_style_arr ) > 0 ) {
			$html_tag_style = ' style="' . implode( '; ', $html_tag_style_arr ) . '"';
		}
		
		if ( $font_weight != '' ) {
			$class[] = $this->prefix . 'font_weight_' . $font_weight ;
		}

		if ( $supertitle_font_weight != '' ) {
			$class[] = $this->prefix . 'supertitle_font_weight_' . $supertitle_font_weight ;
		}

		if ( $supertitle_style != '' ) {
			$class[] = $this->prefix . 'supertitle_style_' . $supertitle_style ;
		}

		if ( $subtitle_font_weight != '' ) {
			$class[] = $this->prefix . 'subtitle_font_weight_' . $subtitle_font_weight ;
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $color != '' ) {
			$el_style = $el_style . ';' . 'color:' . $color . ';border-color:' . $color . ';';
		}

		if ( $dash != '' ) {
			$class[] = $this->prefix . 'dash' . '_' . $dash;
		}
		
		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $headline == '' ) {
			$class[] = 'btNoHeadline';
		}
		
		if ( $target == '' ) {
			$target = '_self';
		}

		$superheadline_inside = '';
		$superheadline_outside = '';
		
		if ( $superheadline != '' ) {
			$class[] = $this->prefix . 'superheadline';
			if ( $supertitle_position == 'outside' ) { 
				$superheadline_outside = '<span class="' . esc_attr( $this->shortcode ) . '_superheadline"><span>' . $superheadline . '</span></span>';
			} else {
				$superheadline_inside = '<span class="' . esc_attr( $this->shortcode ) . '_superheadline"><span>' . $superheadline . '</span></span>';
			}
			
		}
		
		if ( $subheadline != '' ) {
			$class[] = $this->prefix . 'subheadline';
			$subheadline = '<div class="' . esc_attr( $this->shortcode ) . '_subheadline">' . $subheadline . '</div>';
			$subheadline = nl2br( $subheadline );
		}
		

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		if ( $headline != '' ) {
			if ( $url != '' ) {
				$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $headline ) );
				$link = bt_bb_get_url( $url );
				// IMPORTANT: esc_attr must be used instead of esc_url(_raw)
				$headline = '<a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . $headline . '</a>';
			}		
			$headline = '<span class="' . esc_attr( $this->shortcode ) . '_content"><span>' . $headline . '</span></span>';			
		}
		
		$headline = nl2br( $headline );

		$output = '<header' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>';
		if ( $superheadline_outside != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_superheadline_outside' . '">' . $superheadline_outside . '</div>';
		if ( $headline != '' || $superheadline_inside != '' ) $output .= '<' . $html_tag . $html_tag_style . '>' . $superheadline_inside . $headline . '</' . $html_tag . '>';
		$output .= $subheadline . '</header>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/fonts.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Headline', 'ippsum' ), 'description' => esc_html__( 'Headline with custom Google fonts', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'highlight' => true,
			'params' => array(
				array( 'param_name' => 'superheadline', 'type' => 'textfield', 'heading' => esc_html__( 'Superheadline', 'ippsum' ) ),
				array( 'param_name' => 'headline', 'type' => 'textarea', 'heading' => esc_html__( 'Headline', 'ippsum' ), 'preview' => true, 'preview_strong' => true ),
				array( 'param_name' => 'subheadline', 'type' => 'textarea', 'heading' => esc_html__( 'Subheadline', 'ippsum' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'heading' => esc_html__( 'HTML tag', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'h1', 'ippsum' ) 		=> 'h1',
						esc_html__( 'h2', 'ippsum' ) 		=> 'h2',
						esc_html__( 'h3', 'ippsum' ) 		=> 'h3',
						esc_html__( 'h4', 'ippsum' ) 		=> 'h4',
						esc_html__( 'h5', 'ippsum' ) 		=> 'h5',
						esc_html__( 'h6', 'ippsum' ) 		=> 'h6'
				) ),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'ippsum' ), 'description' => esc_html__( 'Predefined heading sizes, independent of html tag', 'ippsum' ),
					'value' => array(
						esc_html__( 'Inherit', 'ippsum' ) 		=> 'inherit',
						esc_html__( 'Extra Small', 'ippsum' ) 	=> 'extrasmall',
						esc_html__( 'Small', 'ippsum' ) 		=> 'small',
						esc_html__( 'Medium', 'ippsum' ) 		=> 'medium',
						esc_html__( 'Normal', 'ippsum' ) 		=> 'normal',
						esc_html__( 'Large', 'ippsum' ) 		=> 'large',
						esc_html__( 'Extra large', 'ippsum' ) 	=> 'extralarge',
						esc_html__( 'Huge', 'ippsum' ) 		=> 'huge'
					)
				),				
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Alignment', 'ippsum' ),
					'value' => array(
						esc_html__( 'Inherit', 'ippsum' ) 	=> 'inherit',
						esc_html__( 'Center', 'ippsum' ) 	=> 'center',
						esc_html__( 'Left', 'ippsum' ) 	=> 'left',
						esc_html__( 'Right', 'ippsum' ) 	=> 'right'
					)
				),


				array( 'param_name' => 'dash', 'type' => 'dropdown', 'heading' => esc_html__( 'Dash', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'None', 'ippsum' ) 			=> 'none',
						esc_html__( 'Top', 'ippsum' ) 				=> 'top',
						esc_html__( 'Bottom', 'ippsum' ) 			=> 'bottom',
						esc_html__( 'Top and bottom', 'ippsum' ) 	=> 'top_bottom'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true ),
				array( 'param_name' => 'color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'supertitle_position', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'outside' ), 'heading' => esc_html__( 'Put supertitle outside H tag', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'supertitle_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle style', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Transparent 50%', 'ippsum' ) 		=> 'transparent',
						esc_html__( 'Accent color', 'ippsum' ) 		=> 'accent'
					)
				),
				

				array( 'param_name' => 'font', 'type' => 'dropdown', 'heading' => esc_html__( 'Font', 'ippsum' ), 'group' => esc_html__( 'Font', 'ippsum' ), 'preview' => true,
					'value' => array( esc_html__( 'Inherit', 'ippsum' ) => 'inherit' ) + $font_arr
				),
				array( 'param_name' => 'font_subset', 'type' => 'textfield', 'heading' => esc_html__( 'Font subset', 'ippsum' ), 'group' => esc_html__( 'Font', 'ippsum' ), 'value' => 'latin,latin-ext', 'description' => 'E.g. latin,latin-ext,cyrillic,cyrillic-ext' ),
				array( 'param_name' => 'font_size', 'type' => 'textfield', 'heading' => esc_html__( 'Custom font size', 'ippsum' ), 'group' => esc_html__( 'Font', 'ippsum' ), 'description' => 'E.g. 20px or 1.5rem' ),
				array( 'param_name' => 'font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'ippsum' ), 'group' => esc_html__( 'Font', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Thin', 'ippsum' ) 				=> 'thin',
						esc_html__( 'Lighter', 'ippsum' ) 				=> 'lighter',
						esc_html__( 'Light', 'ippsum' ) 				=> 'light',
						esc_html__( 'Normal', 'ippsum' ) 				=> 'normal',
						esc_html__( 'Medium', 'ippsum' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'ippsum' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'ippsum' ) 				=> 'bold',
						esc_html__( 'Bolder', 'ippsum' ) 				=> 'bolder',
						esc_html__( 'Black', 'ippsum' ) 				=> 'black'
					)
				),
				array( 'param_name' => 'supertitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle font weight', 'ippsum' ), 'group' => esc_html__( 'Font', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Thin', 'ippsum' ) 				=> 'thin',
						esc_html__( 'Lighter', 'ippsum' ) 				=> 'lighter',
						esc_html__( 'Light', 'ippsum' ) 				=> 'light',
						esc_html__( 'Normal', 'ippsum' ) 				=> 'normal',
						esc_html__( 'Medium', 'ippsum' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'ippsum' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'ippsum' ) 				=> 'bold',
						esc_html__( 'Bolder', 'ippsum' ) 				=> 'bolder',
						esc_html__( 'Black', 'ippsum' ) 				=> 'black'
					)
				),
				array( 'param_name' => 'subtitle_font_weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Subtitle font weight', 'ippsum' ), 'group' => esc_html__( 'Font', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Thin', 'ippsum' ) 				=> 'thin',
						esc_html__( 'Lighter', 'ippsum' ) 				=> 'lighter',
						esc_html__( 'Light', 'ippsum' ) 				=> 'light',
						esc_html__( 'Normal', 'ippsum' ) 				=> 'normal',
						esc_html__( 'Medium', 'ippsum' ) 				=> 'medium',
						esc_html__( 'Semi bold', 'ippsum' ) 			=> 'semi-bold',
						esc_html__( 'Bold', 'ippsum' ) 				=> 'bold',
						esc_html__( 'Bolder', 'ippsum' ) 				=> 'bolder',
						esc_html__( 'Black', 'ippsum' ) 				=> 'black'
					)
				),
				

				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'ippsum' ), 'group' => esc_html__( 'URL', 'ippsum' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'ippsum' ), 'group' => esc_html__( 'URL', 'ippsum' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'ippsum' ) 	=> '_self',
						esc_html__( 'Blank (open in new tab)', 'ippsum' ) 	=> '_blank'
					)
				)
			)
		) );
	}
}