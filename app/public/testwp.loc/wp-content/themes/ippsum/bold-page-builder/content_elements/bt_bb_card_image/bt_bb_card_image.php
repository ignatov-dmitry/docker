<?php

class bt_bb_card_image extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'image'      					=> '',
			'lazy_load'  					=> 'no',
			'icon'							=> '',
			'superheadline'					=> '',
			'title'							=> '',
			'html_tag'      				=> 'h3',
			'text'							=> '',

			'url'    						=> '',
			'url_text'    					=> '',
			'target' 						=> '',
			'url_color'    					=> '',

			'colored_icon'         			=> 'no_icon',
			'colored_icon_color_scheme' 	=> '',
			'icon_background_color'			=> '',
			'color_scheme' 					=> '',
			'border'      					=> '',
			'shape'							=> '',
			'background_color'				=> '',
			'shadow'						=> '',
			'hover_style'					=> ''
			
		) ), $atts, $this->shortcode ) );

		wp_enqueue_script(
			'bt_bb_card_image',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_card_image/bt_bb_card_image.js',
			array( 'jquery' ),
			'',
			true
		);

		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );
		
		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $shadow != '' ) {
			$class[] = $this->prefix . 'shadow' . '_' . $shadow;
		}

		if ( $url_color != '' ) {
			$class[] = $this->prefix . 'url_color' . '_' . $url_color;
		}

		if ( $image == '' ) {
			$class[] = 'btNoImage';
		}

		if ( $hover_style != '' ) {
			$class[] = $this->prefix . 'hover_style' . '_' . $hover_style;
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $colored_icon_color_scheme != '' ) {
			$class[] = $this->prefix . 'colored_icon_color_scheme_' . bt_bb_get_color_scheme_id( $colored_icon_color_scheme );
		}

		$el_icon_style = '';
		if ( $icon_background_color != '' ) {
			$el_icon_style = $el_icon_style . ';' . 'background-color:' . $icon_background_color . ';';
		}

		
		if ( $background_color != '' ) {
			$el_style = $el_style . ';' . 'background-color:' . $background_color . ';';
		}

		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}
	
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		$icon_style_attr = '';
		if ( $el_icon_style != '' ) {
			$icon_style_attr = ' ' . 'style="' . esc_attr( $el_icon_style ) . '"';
		}

		$show_image_caption = '';
		if ( $show_image_caption == '' ) {
			$show_image_caption = $title;
		}

		$icon_html = bt_bb_icon::get_html( $icon, '' );

		
		$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $title ) );
		$link = bt_bb_get_permalink_by_slug( $url );

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );


		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '"' . $style_attr . '>';
		
			// IMAGE
			if ( $image != '' ) {	
				$output .=  '<div class="' . esc_attr( $this->shortcode . '_background') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" size="boldthemes_large_3x4" caption="' . esc_attr( $show_image_caption ) . '" lazy_load="' . esc_attr( $lazy_load ) . '"]' ) . '</div>';
			}
		
			// TEXT BOX
			$output .= '<div class="' . esc_attr( $this->shortcode . '_text_box' ) . '">';

				// ICON
				if ( $icon != '' && $colored_icon == '' || $colored_icon == 'no_icon'  ) {

					if ( $url != '') {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . $icon_html . '</a></div>';
					} else {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
					}
				}

				// COLORED ICON
				if ( $colored_icon != '' && $colored_icon != 'no_icon' ) {
					if ( $url != '') {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '" ' . $icon_style_attr . '><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">';
							$output .= bt_bb_get_svg_icon_html( $colored_icon );
						$output .= '</a></div>';
					} else {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '" ' . $icon_style_attr . '>';
							$output .= bt_bb_get_svg_icon_html( $colored_icon );
						$output .= '</div>';
					}
				}

				$output .= '<div class="' . esc_attr( $this->shortcode . '_inner' ) . '">';
				
					// HEADLINE
					if ( ( $title != '' ) || ( $superheadline != '') ) {
						

						if ( $url != '') {
							$output .= do_shortcode('[bt_bb_headline headline="' . esc_attr( $title ) . '" html_tag="'. esc_attr( $html_tag ) .'" superheadline="' . esc_attr( $superheadline ) . '" size="medium" url="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '"]');
						} else {
							$output .= do_shortcode('[bt_bb_headline headline="' . esc_attr( $title ) . '" html_tag="'. esc_attr( $html_tag ) .'" superheadline="' . esc_attr( $superheadline ) . '" size="medium"]');
						}
					}

					// TEXT
					if ( $text != '' ) {
						$text_arr = preg_split( '/$\R?^/m', $text );
						$output .= '<ul class="' . esc_attr( $this->shortcode . '_text' ) . '">';
							foreach ( $text_arr as $item ) {
								if ( $item != '' ) {
									$li_class =	substr($item, 0, 1) == '+' ? 'included' : '';					
									$item =	substr($item, 0, 1) == '+' ? ltrim($item, '+')   :  $item;

									$output .= '<li class="' .  esc_attr( $li_class ) . '">' .  wp_kses_post( $item ) . '</li>';
								}
							}
						$output .= '</ul>';
					}

					// ARROW - URL TEXT
					if ( $url != '') {

						if ( $url_text == '' ) {
							$output .= '<div class="' . esc_attr( $this->shortcode . '_arrow' ) . '"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '"><span></span></a></div>';
						} else {
							$output .= '<div class="bt_bb_button bt_bb_style_outline bt_bb_size_small bt_bb_width_inline bt_bb_icon_position_right bt_bb_color_scheme_8 btWithIcon bt_bb_shape_inherit bt_bb_align_inherit"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '"><span class="bt_bb_button_text">' . esc_attr( $url_text ) . '</span><span data-ico-dripicons="" class="bt_bb_icon_holder"></span></a></div>';
						}
					}

				$output .= '</div>'; // END OF INNER
					
			$output .= '</div>'; // END OF TEXT BOX
			
		$output .= '</div>';
		

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			require_once( dirname(__FILE__) . '/../../content_elements_misc/fa_icons.php' );
			require_once( dirname(__FILE__) . '/../../content_elements_misc/s7_icons.php' );
			$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
		}

		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		$svg_icons_arr = bt_bb_get_svg_icons_param_array();
		
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Card Image', 'ippsum' ), 'description' => esc_html__( 'Card with image and text', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'ippsum' ) 
				),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load this image', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 				=> 'no',
						esc_html__( 'Yes', 'ippsum' ) 				=> 'yes'
					)
				),
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'preview' => true, 'heading' => esc_html__( 'Icon', 'ippsum' ), 'value' => $icon_arr ),
				array( 'param_name' => 'colored_icon', 'type' => 'dropdown', 'default' => 'no_icon', 'heading' => esc_html__( 'Colored Icon', 'ippsum' ), 'description' => esc_html__( 'If colored icon is chosen from the list, regular icon will not be displayed', 'ippsum' ), 'value' => $svg_icons_arr ),
				array( 'param_name' => 'superheadline', 'type' => 'textfield', 'heading' => esc_html__( 'Superheadline', 'ippsum' ) ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'ippsum' ), 'description' => esc_html__( 'Type sentences separated by new line. In order to show what is included add + before text (ex. +Lorem ipsum).', 'ippsum' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'default' => 'h3', 'heading' => esc_html__( 'HTML tag', 'ippsum' ),
					'value' => array(
						esc_html__( 'h1', 'ippsum' ) 				=> 'h1',
						esc_html__( 'h2', 'ippsum' )	 			=> 'h2',
						esc_html__( 'h3', 'ippsum' ) 				=> 'h3',
						esc_html__( 'h4', 'ippsum' ) 				=> 'h4',
						esc_html__( 'h5', 'ippsum' ) 				=> 'h5',
						esc_html__( 'h6', 'ippsum' ) 				=> 'h6'
				) ),

				array( 'param_name' => 'url', 'preview' => true, 'type' => 'textfield', 'group' => esc_html__( 'URL', 'ippsum' ), 'heading' => esc_html__( 'URL', 'ippsum' ) ),
				array( 'param_name' => 'url_text', 'type' => 'textfield', 'heading' => esc_html__( 'URL Text', 'ippsum' ), 'group' => esc_html__( 'URL', 'ippsum' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'ippsum' ), 'heading' => esc_html__( 'Target', 'ippsum' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'ippsum' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'ippsum' ) => '_blank',
				) ),
				array( 'param_name' => 'url_color', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'ippsum' ), 'heading' => esc_html__( 'URL Text color scheme', 'ippsum' ),
					'value' => array(
						esc_html__( 'Alternate color', 'ippsum' ) 		=> '',
						esc_html__( 'Accent color', 'ippsum' ) 		=> 'accent'
				) ),


				array( 'param_name' => 'border', 'type' => 'dropdown', 'default' => '', 'description' => esc_html__( 'If title is entered, border will be visible above', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show Border', 'ippsum' ),
					'value' => array(
						esc_html__( 'Yes', 'ippsum' ) 				=> '',
						esc_html__( 'No', 'ippsum' )	 			=> 'hide'
				) ),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Shape', 'ippsum' ),
					'value' => array(
						esc_html__( 'Square', 'ippsum' ) 			=> '',
						esc_html__( 'Soft rounded', 'ippsum' )		=> 'soft-rounded'
				) ),
				array( 'param_name' => 'shadow', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Shadow', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 						=> '',
						esc_html__( 'Yes', 'ippsum' )						=> 'visible',
						esc_html__( 'Yes (show on hover)', 'ippsum' )		=> 'visible_hover'
				) ),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Card background color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true ),
				array( 'param_name' => 'colored_icon_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Colored icon color scheme', 'ippsum' ), 'value' => $color_scheme_arr ),
				array( 'param_name' => 'icon_background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Colored icon background color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ) ),
				array( 'param_name' => 'hover_style', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Hover style', 'ippsum' ),
					'value' => array(
						esc_html__( 'Dark', 'ippsum' ) 					=> '',
						esc_html__( 'Light', 'ippsum' )					=> 'light'
					) 
				) )
			)
		);
	}
}