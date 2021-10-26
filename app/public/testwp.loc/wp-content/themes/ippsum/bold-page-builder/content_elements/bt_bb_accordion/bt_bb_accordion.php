<?php

class bt_bb_accordion extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'color_scheme' => '',
			'style'        => '',
			'shape'        => '',
			'icon_size'    => '',
			'closed'       => ''
		) ), $atts, $this->shortcode ) );

		wp_enqueue_script(
			'bt_bb_accordion',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_accordion/bt_bb_accordion.js',
			array( 'jquery' ),
			'',
			true
		);

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

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}		

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $icon_size != '' ) {
			$class[] = $this->prefix . 'icon_size' . '_' . $icon_size;
		}

		$data_attr = '';
		if ( $closed == 'closed' ) {
			$data_attr = ' ' . 'data-closed=closed';
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$content = do_shortcode( $content );

		$output = '';

		$output .= '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . $data_attr . '>' . $content . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();			
		
		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Accordion', 'ippsum' ), 'description' => esc_html__( 'Accordion container', 'ippsum' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_accordion_item' => true ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true ),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Outline', 'ippsum' ) 	=> 'outline',
						esc_html__( 'Filled', 'ippsum' ) 	=> 'filled',
						esc_html__( 'Simple', 'ippsum' ) 	=> 'simple'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'ippsum' ),
					'value' => array(
						esc_html__( 'Square', 'ippsum' ) 	=> 'square',
						esc_html__( 'Rounded', 'ippsum' ) 	=> 'rounded',
						esc_html__( 'Round', 'ippsum' ) 	=> 'round'
					)
				),
				array( 'param_name' => 'icon_size', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'ippsum' ),
					'value' => array(
						esc_html__( 'Small', 'ippsum' ) 	=> 'small',
						esc_html__( 'Medium', 'ippsum' ) 	=> 'medium',
						esc_html__( 'Large', 'ippsum' ) 	=> ''
					)
				),
				array( 'param_name' => 'closed', 'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'closed' ), 'heading' => esc_html__( 'All items closed initially', 'ippsum' ), 'preview' => true )
			)
		) );
	}
}