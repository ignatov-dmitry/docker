<?php

class bt_bb_separator extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'top_spacing'    => '',
			'bottom_spacing' => '',
			'text'			 => '',
			'border_style'   => '',
			'border_color'	 => '',
			'border_width'   => '',
			'text_color'	 => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}
		
		if ( $top_spacing != '' ) {
			$class[] = $this->prefix . 'top_spacing' . '_' . $top_spacing;
		}
		
		if ( $bottom_spacing != '' ) {
			$class[] = $this->prefix . 'bottom_spacing' . '_' . $bottom_spacing;
		}

		if ( $text != '' ) {
			$class[] = "btWithText";
		}
		
		if ( $border_style != '' ) {
			$class[] = $this->prefix . 'border_style' . '_' . $border_style;
		}

		if ( $border_color != '' ) {
			$class[] = $this->prefix . 'border_color' . '_' . $border_color;
		}

		if ( $text_color != '' ) {
			$class[] = $this->prefix . 'text_color' . '_' . $text_color;
		}

		if ( $border_width != '' ) {
			$el_style = $el_style . '; border-width: ' . $border_width;
			if ( $border_style == 'none' ) {
				$el_style = $el_style . '; border-color: transparent; border-style: solid;';
			}
		}
		
		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		if ( $text != '' ) {
			$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '><span class="' . esc_attr( $this->shortcode . '_text' ) . '">' . wp_kses_post( $text ) . '</span></div>';
		} else {
			$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '></div>';
		}
		

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}

	function map_shortcode() {
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Separator', 'ippsum' ), 'description' => esc_html__( 'Separator line', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array( 
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'ippsum' ) 	=> '',
						esc_html__( 'Extra small', 'ippsum' ) 	=> 'extra_small',
						esc_html__( 'Small', 'ippsum' ) 		=> 'small',		
						esc_html__( 'Normal', 'ippsum' ) 		=> 'normal',
						esc_html__( 'Medium', 'ippsum' )	 	=> 'medium',
						esc_html__( 'Large', 'ippsum' ) 		=> 'large',
						esc_html__( 'Extra large', 'ippsum' ) 	=> 'extra_large',
						esc_html__( '5px', 'ippsum' ) 			=> '5',
						esc_html__( '10px', 'ippsum' ) 		=> '10',
						esc_html__( '15px', 'ippsum' ) 		=> '15',
						esc_html__( '20px', 'ippsum' ) 		=> '20',
						esc_html__( '25px', 'ippsum' ) 		=> '25',
						esc_html__( '30px', 'ippsum' ) 		=> '30',
						esc_html__( '35px', 'ippsum' ) 		=> '35',
						esc_html__( '40px', 'ippsum' ) 		=> '40',
						esc_html__( '45px', 'ippsum' ) 		=> '45',
						esc_html__( '50px', 'ippsum' ) 		=> '50',
						esc_html__( '55px', 'ippsum' ) 		=> '55',
						esc_html__( '60px', 'ippsum' ) 		=> '60',
						esc_html__( '65px', 'ippsum' ) 		=> '65',
						esc_html__( '70px', 'ippsum' ) 		=> '70',
						esc_html__( '75px', 'ippsum' ) 		=> '75',
						esc_html__( '80px', 'ippsum' ) 		=> '80',
						esc_html__( '85px', 'ippsum' ) 		=> '85',
						esc_html__( '90px', 'ippsum' ) 		=> '90',
						esc_html__( '95px', 'ippsum' ) 		=> '95',
						esc_html__( '100px', 'ippsum' ) 		=> '100'
					)
				),
				array( 'param_name' => 'bottom_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Bottom spacing', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'ippsum' ) 	=> '',
						esc_html__( 'Extra small', 'ippsum' ) 	=> 'extra_small',
						esc_html__( 'Small', 'ippsum' ) 		=> 'small',		
						esc_html__( 'Normal', 'ippsum' ) 		=> 'normal',
						esc_html__( 'Medium', 'ippsum' ) 		=> 'medium',
						esc_html__( 'Large', 'ippsum' ) 		=> 'large',
						esc_html__( 'Extra large', 'ippsum' ) 	=> 'extra_large',
						esc_html__( '5px', 'ippsum' ) 			=> '5',
						esc_html__( '10px', 'ippsum' ) 		=> '10',
						esc_html__( '15px', 'ippsum' ) 		=> '15',
						esc_html__( '20px', 'ippsum' ) 		=> '20',
						esc_html__( '25px', 'ippsum' ) 		=> '25',
						esc_html__( '30px', 'ippsum' ) 		=> '30',
						esc_html__( '35px', 'ippsum' ) 		=> '35',
						esc_html__( '40px', 'ippsum' ) 		=> '40',
						esc_html__( '45px', 'ippsum' ) 		=> '45',
						esc_html__( '50px', 'ippsum' ) 		=> '50',
						esc_html__( '55px', 'ippsum' ) 		=> '55',
						esc_html__( '60px', 'ippsum' ) 		=> '60',
						esc_html__( '65px', 'ippsum' ) 		=> '65',
						esc_html__( '70px', 'ippsum' ) 		=> '70',
						esc_html__( '75px', 'ippsum' ) 		=> '75',
						esc_html__( '80px', 'ippsum' ) 		=> '80',
						esc_html__( '85px', 'ippsum' ) 		=> '85',
						esc_html__( '90px', 'ippsum' ) 		=> '90',
						esc_html__( '95px', 'ippsum' ) 		=> '95',
						esc_html__( '100px', 'ippsum' ) 		=> '100'
					)
				),
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'ippsum' ), 'preview' => true ),			
				array( 'param_name' => 'border_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Border style', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'None', 'ippsum' ) 		=> 'none',
						esc_html__( 'Solid', 'ippsum' ) 		=> 'solid',
						esc_html__( 'Dotted', 'ippsum' ) 		=> 'dotted',
						esc_html__( 'Dashed', 'ippsum' ) 		=> 'dashed'
					)
				),
				array( 'param_name' => 'border_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Border color', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 		=> '',
						esc_html__( 'Accent', 'ippsum' ) 		=> 'accent',
						esc_html__( 'Gray', 'ippsum' ) 		=> 'gray',
						esc_html__( 'Light', 'ippsum' ) 		=> 'light',
						esc_html__( 'Dark', 'ippsum' ) 		=> 'dark'
					)
				),
				array( 'param_name' => 'border_width', 'type' => 'textfield', 'heading' => esc_html__( 'Border width', 'ippsum' ), 'description' => esc_html__( 'E.g. 5px or 1em', 'ippsum' ) ),
				array( 'param_name' => 'text_color', 'type' => 'dropdown', 'heading' => esc_html__( 'Text color', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Accent', 'ippsum' ) 		=> '',
						esc_html__( 'Gray', 'ippsum' ) 		=> 'gray',
						esc_html__( 'Light', 'ippsum' ) 		=> 'light',
						esc_html__( 'Dark', 'ippsum' ) 		=> 'dark'
					)
				)
			)
		) );
	}
}