<?php

class bt_bb_price_list extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon'		   					=> '',
			'colored_icon'         			=> 'no_icon',
			'title'       	 				=> '',
			'currency'     					=> '',
			'currency_position'				=> '',
			'price'        					=> '',
			'price_text'   					=> '',			
			'items'        					=> '',
			
			'style' 	   					=> '',
			'shape' 	   					=> '',
			'highlight' 	 				=> '',
			'colored_icon_color_scheme' 	=> '',
			'icon_background_color'			=> '',
			'background_color'  			=> '',
			'color_scheme' 					=> ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		
		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $highlight != '' ) {
			$class[] = $this->prefix . 'highlight';
		}


		$el_icon_style = '';
		if ( $icon_background_color != '' ) {
			$el_icon_style = $el_icon_style . ';' . 'background-color:' . $icon_background_color . ';';
		}



		if ( $colored_icon_color_scheme != '' ) {
			$class[] = $this->prefix . 'colored_icon_color_scheme_' . bt_bb_get_color_scheme_id( $colored_icon_color_scheme );
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $background_color != '' ) {
			$el_style = $el_style . ';' . 'background-color:' . $background_color . ';';
		}

		

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );		
		$class_attr = implode( ' ', $class );
		
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

		$icon_html = bt_bb_icon::get_html( $icon, '' );
		$content = do_shortcode( $content );
		

		$output = '<div' . $id_attr . ' class="' . esc_attr( $class_attr ) . '"' . $style_attr . '>';

			// ICON
			if ( $icon != '' && $colored_icon == '' || $colored_icon == 'no_icon'  ) $output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '">' . $icon_html . '</div>';

			// COLORED ICON
				if ( $colored_icon != '' && $colored_icon != 'no_icon' ) {
					$output .= '<div class="' . esc_attr( $this->shortcode . '_colored_icon' ) . '" ' . $icon_style_attr . '>';
						$output .= bt_bb_get_svg_icon_html( $colored_icon );
					$output .= '</div>';
				}
		
			// TITLE
			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_title">' . $title . '</div>';
			
			// PRICE
			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_price">';

				if ( ( $currency != '' ) && ( $currency_position == '' ) ) $output .= '<span class="' . esc_attr( $this->shortcode ) . '_currency">' . $currency . '</span>';

				if ( $price != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_amount">' . do_shortcode( "[bt_bb_counter number='" . $price . "']" ) . '</div>';

				if ( ( $currency != '' ) && ( $currency_position != '' ) ) $output .= '<span class="' . esc_attr( $this->shortcode ) . '_currency">' . $currency . '</span>';
				
				if ( $price_text != '' ) $output .= '<span class="' . esc_attr( $this->shortcode ) . '_price_text">' . $price_text . '</span>';

			$output .= '</div>';

			// LIST
			if ( $items != '' ) {
				$items_arr = preg_split( '/$\R?^/m', $items );
				$output .= '<ul>';
					foreach ( $items_arr as $item ) {
						if ( $item != '' ) {
							$li_class =	substr($item, 0, 1) == '+' ? 'included' : 'excluded';					
							$item =	substr($item, 0, 1) == '+' ? ltrim($item, '+')   :  $item;

							$output .= '<li class="' .  esc_attr( $li_class ) . '">' .  wp_kses_post( $item ) . '</li>';
						}
					}
				$output .= '</ul>';
			}

			// CONTENT
			if ( $content != '' ) $output .= '<div class="' . esc_attr( $this->shortcode . '_content_inner' ) . '"><div>' . ( $content ) . '</div></div>';

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
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Price List', 'ippsum' ), 'description' => esc_html__( 'List of items with total price', 'ippsum' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_separator' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'preview' => true, 'heading' => esc_html__( 'Icon', 'ippsum' ), 'value' => $icon_arr ),
				array( 'param_name' => 'colored_icon', 'type' => 'dropdown', 'default' => 'no_icon', 'heading' => esc_html__( 'Colored Icon', 'ippsum' ), 'description' => esc_html__( 'If colored icon is chosen from the list, regular icon will not be displayed', 'ippsum' ), 'value' => $svg_icons_arr ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'currency', 'type' => 'textfield', 'heading' => esc_html__( 'Currency', 'ippsum' ) ),
				array( 'param_name' => 'currency_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Currency position', 'ippsum' ),
					'value' => array(
						esc_html__( 'Left', 'ippsum' ) 				=> '',
						esc_html__( 'Right', 'ippsum' ) 				=> 'right'	
				) ),
				array( 'param_name' => 'price', 'type' => 'textfield', 'heading' => esc_html__( 'Price', 'ippsum' ) ),
				array( 'param_name' => 'price_text', 'type' => 'textfield', 'heading' => esc_html__( 'Price text', 'ippsum' ) ),

				array( 'param_name' => 'items', 'type' => 'textarea', 'heading' => esc_html__( 'Items', 'ippsum' ), 'description' => esc_html__( 'Type sentences separated by new line. In order to show what is included in price add + before text (ex. +Lorem ipsum).', 'ippsum' ) ),
				

				array( 'param_name' => 'style', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 					=> '',
						esc_html__( 'With Border on bottom', 'ippsum' ) 	=> 'border',
						esc_html__( 'Shadow', 'ippsum' ) 					=> 'shadow'		
				) ),
				array( 'param_name' => 'shape', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'ippsum' ),
					'value' => array(
						esc_html__( 'Square', 'ippsum' ) 					=> '',
						esc_html__( 'Rounded', 'ippsum' ) 					=> 'rounded'	
				) ),
				array( 'param_name' => 'highlight', 'type' => 'checkbox', 'group' => esc_html__( 'Design', 'ippsum' ), 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'highlight' ), 'heading' => esc_html__( 'Highlight', 'ippsum' ), 'preview' => true ),
				
				

				array( 'param_name' => 'icon_background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Colored icon background color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ) ),

				array( 'param_name' => 'colored_icon_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Icon color scheme', 'ippsum' ),
					'value' => $color_scheme_arr ),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Background color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'color_scheme', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true ),			
			)
		) );
	}
}