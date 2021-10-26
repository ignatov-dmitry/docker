<?php

class bt_bb_card_icon extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'      					=> '',
			'colored_icon'         			=> 'no_icon',
			'colored_icon_color_scheme' 	=> '',
			'title'							=> '',
			'html_tag'      				=> 'h3',
			'text'							=> '',

			'url'    						=> '',
			'url_text'    					=> '',
			'target' 						=> '',

			'shape'							=> '',
			'border'						=> '',
			'shadow'						=> '',
			'hover_style'					=> '',
			'title_size'					=> '',
			'icon_size'						=> '',
			'icon_color'					=> '',
			'icon_position'					=> '',
			'icon_style'					=> '',
			'color_scheme' 					=> '',
			'icon_background_color'			=> '',
		) ), $atts, $this->shortcode ) );


		$title = html_entity_decode( $title, ENT_QUOTES, 'UTF-8' );
		$text = html_entity_decode( $text, ENT_QUOTES, 'UTF-8' );


		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$text = nl2br( $text );
		$title = nl2br( $title );

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $hover_style != '' ) {
			$class[] = $this->prefix . 'hover_style' . '_' . $hover_style;
		}

		if ( $icon_style != '' ) {
			$class[] = $this->prefix . 'icon_style' . '_' . $icon_style;
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $shadow != '' ) {
			$class[] = $this->prefix . 'shadow' . '_' . $shadow;
		}

		if ( $title_size != '' ) {
			$class[] = $this->prefix . 'title_size' . '_' . $title_size;
		}

		if ( $icon_size != '' ) {
			$class[] = $this->prefix . 'icon_size' . '_' . $icon_size;
		}

		if ( $icon_color != '' ) {
			$class[] = $this->prefix . 'icon_color' . '_' . $icon_color;
		}

		if ( $icon_position != '' ) {
			$class[] = $this->prefix . 'icon_position' . '_' . $icon_position;
		}

		$el_icon_style = '';
		if ( $icon_background_color != '' ) {
			$el_icon_style = $el_icon_style . ';' . 'background-color:' . $icon_background_color . ';';
		}

		if ( $text != '' ) {
			$class[] = 'WithText';
		}

		if ( $url != '' ) {
			$class[] = 'WithLink';
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $colored_icon_color_scheme != '' ) {
			$class[] = $this->prefix . 'colored_icon_color_scheme_' . bt_bb_get_color_scheme_id( $colored_icon_color_scheme );
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );		
		$class_attr = implode( ' ', $class );
		
		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}

		$icon_style_attr = '';
		if ( $el_icon_style != '' ) {
			$icon_style_attr = ' ' . 'style="' . esc_attr( $el_icon_style ) . '"';
		}

		
		$icon_html = bt_bb_icon::get_html( $icon, '' );


		$url_title = strip_tags( str_replace( array("\n", "\r"), ' ', $title ) );
		$link = bt_bb_get_permalink_by_slug( $url );


		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '"' . $style_attr . '>';
		
			// TITLE, TEXT
			$output .= '<div class="' . esc_attr( $this->shortcode . '_content' ) . '">';
				
				// ICON
				if ( $icon != '' && $colored_icon == '' || $colored_icon == 'no_icon'  ) {
					
					if ( $url != '') {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . $icon_html . '<a/></div>';
					} else {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';
					}
				}


				// COLORED ICON
				if ( $colored_icon != '' && $colored_icon != 'no_icon' ) {
					if ( $url != '') {
						$output .= '<a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '"><div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '" ' . $icon_style_attr . '>';
							$output .= bt_bb_get_svg_icon_html( $colored_icon );
						$output .= '</div></a>';
					} else {
						$output .= '<div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '" ' . $icon_style_attr . '>';
							$output .= bt_bb_get_svg_icon_html( $colored_icon );
						$output .= '</div>';
					}
					
				}

				$output .= '<div class="' . esc_attr( $this->shortcode . '_text_inner' ) . '">';
				
					if ( $url != '') {
						if ( $title != '' ) $output .= '<'. $html_tag . ' class="' . esc_attr( $this->shortcode . '_title' ) . '"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '">' . wp_kses_post( $title ) . '</a></' . $html_tag . '>';
					} else {
						if ( $title != '' ) $output .= '<'. $html_tag . ' class="' . esc_attr( $this->shortcode . '_title' ) . '">' . wp_kses_post( $title ) . '</' . $html_tag . '>';
					}


					if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '"><p>' . wp_kses_post( $text ) . '</p></div>';


					// ARROW - URL TEXT
					if ( $url != '') {

						if ( $url_text == '' ) {
							$output .= '<div class="' . esc_attr( $this->shortcode . '_arrow' ) . '"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '"><span></span></a></div>';
						} else {
							$output .= '<div class="bt_bb_button bt_bb_style_clean bt_bb_size_small bt_bb_width_inline bt_bb_icon_position_right bt_bb_color_scheme_3 btWithIcon bt_bb_shape_inherit bt_bb_align_inherit"><a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" title="' . esc_attr( $url_title )  . '"><span class="bt_bb_button_text">' . esc_attr( $url_text ) . '</span><span data-ico-dripicons="" class="bt_bb_icon_holder"></span></a></div>';
						}
					}


				$output .= '</div>';

			$output .= '</div>';

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

		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Card Icon', 'ippsum' ), 'description' => esc_html__( 'Card with icon, title and text', 'ippsum' ),
			'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'ippsum' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'colored_icon', 'type' => 'dropdown', 'default' => 'no_icon', 'heading' => esc_html__( 'Colored Icon', 'ippsum' ), 'description' => esc_html__( 'If colored icon is chosen from the list, regular icon will not be displayed', 'ippsum' ), 'value' => $svg_icons_arr ),
				

				array( 'param_name' => 'title', 'type' => 'textfield', 'preview' => true, 'heading' => esc_html__( 'Title', 'ippsum' ) 
				),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'ippsum' ) ),
				array( 'param_name' => 'html_tag', 'type' => 'dropdown', 'default' => 'h3', 'heading' => esc_html__( 'HTML tag', 'ippsum' ),
					'value' => array(
						esc_html__( 'h1', 'ippsum' ) 		=> 'h1',
						esc_html__( 'h2', 'ippsum' ) 		=> 'h2',
						esc_html__( 'h3', 'ippsum' ) 		=> 'h3',
						esc_html__( 'h4', 'ippsum' ) 		=> 'h4',
						esc_html__( 'h5', 'ippsum' ) 		=> 'h5',
						esc_html__( 'h6', 'ippsum' ) 		=> 'h6'
				) ),



				array( 'param_name' => 'url', 'preview' => true, 'type' => 'textfield', 'group' => esc_html__( 'URL', 'ippsum' ), 'heading' => esc_html__( 'URL', 'ippsum' ) ),
				array( 'param_name' => 'url_text', 'type' => 'textfield', 'heading' => esc_html__( 'URL Text', 'ippsum' ), 'description' => esc_html__( 'If URL text is defined, linked icon (arrow) will not be displayed', 'ippsum' ), 'group' => esc_html__( 'URL', 'ippsum' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'group' => esc_html__( 'URL', 'ippsum' ), 'heading' => esc_html__( 'Target', 'ippsum' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'ippsum' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'ippsum' ) => '_blank',
				) ),



				array( 'param_name' => 'icon_position', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Icon position', 'ippsum' ),
					'value' => array(
						esc_html__( 'On side', 'ippsum' ) 				=> '',
						esc_html__( 'On top', 'ippsum' ) 				=> 'on_top'
				) ),
				array( 'param_name' => 'icon_size', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Icon size', 'ippsum' ),
					'value' => array(
						esc_html__( 'Small', 'ippsum' ) 				=> 'small',
						esc_html__( 'Medium', 'ippsum' ) 				=> '',
						esc_html__( 'Large', 'ippsum' ) 				=> 'large',
						esc_html__( 'Extra large', 'ippsum' ) 			=> 'extra_large'
				) ),
				array( 'param_name' => 'icon_color', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Icon color', 'ippsum' ),
					'value' => array(
						esc_html__( 'Inherit', 'ippsum' ) 				=> '',
						esc_html__( 'Accent color', 'ippsum' ) 		=> 'accent',
						esc_html__( 'Alternate color', 'ippsum' ) 		=> 'alternate'
				) ),
				array( 'param_name' => 'title_size', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Title size', 'ippsum' ),
					'value' => array(
						esc_html__( 'Small', 'ippsum' ) 				=> 'small',
						esc_html__( 'Medium', 'ippsum' ) 				=> '',
						esc_html__( 'Large', 'ippsum' ) 				=> 'large'
				) ),


				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Card color scheme', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true ),

				array( 'param_name' => 'icon_style', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Colored icon style', 'ippsum' ),
					'value' => array(
						esc_html__( 'Filled', 'ippsum' ) 				=> '',
						esc_html__( 'Borderless', 'ippsum' ) 			=> 'borderless'
				) ),
				array( 'param_name' => 'colored_icon_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Colored icon color scheme', 'ippsum' ), 'value' => $color_scheme_arr ),
				array( 'param_name' => 'icon_background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Colored icon background color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ) ),
				

				array( 'param_name' => 'border', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show border', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 					=> '',
						esc_html__( 'Yes', 'ippsum' ) 					=> 'visible'
				) ),
				
				array( 'param_name' => 'shadow', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show shadow', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 					=> '',
						esc_html__( 'Yes', 'ippsum' ) 					=> 'visible',
						esc_html__( 'Yes (show on hover)', 'ippsum' ) 	=> 'visible_hover'
				) ),
				array( 'param_name' => 'shape', 'group' => esc_html__( 'Design', 'ippsum' ), 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Card shape', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Inherit', 'ippsum' ) 				=> '',
						esc_html__( 'Square', 'ippsum' ) 				=> 'square',
						esc_html__( 'Soft rounded', 'ippsum' )			=> 'soft-rounded'
					)
				),
				array( 'param_name' => 'hover_style', 'type' => 'dropdown', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Card hover style', 'ippsum' ),
					'value' => array(
						esc_html__( 'None', 'ippsum' ) 					=> '',
						esc_html__( 'Light', 'ippsum' )					=> 'light',
						esc_html__( 'Dark', 'ippsum' )						=> 'dark',
						esc_html__( 'Accent', 'ippsum' )					=> 'accent',
						esc_html__( 'Accent gradient', 'ippsum' )			=> 'gradient'
				) )
				
				
			)
			)
		);
	}
}