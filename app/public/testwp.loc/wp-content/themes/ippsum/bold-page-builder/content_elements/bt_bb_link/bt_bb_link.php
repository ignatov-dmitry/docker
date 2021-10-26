<?php

class bt_bb_link extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'text'					=> '',
			'url'					=> '',
			'target'				=> '',
			'style'					=> '',
			'colors'				=> '',
			'size'					=> ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );
		
		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size_' . $size ;
		}
		
		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . esc_attr( $el_id ) . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . esc_attr( $el_style ) . '"';
		}

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $colors != '' ) {
			$class[] = $this->prefix . 'colors' . '_' . $colors;
		}
		
		if ( $target == '' ) {
			$target = '_self';
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		
		$output = $this->get_html( $text, $url, $target );
		
		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}
	
	function get_html( $text, $url, $target ) {
		
		$text_output = '';

		if ( $text != '' ) {
			$text_output = '<span class="bt_bb_link_text">' . $text . '</span>';
		}

		$link = bt_bb_get_url( $url );

		// IMPORTANT: esc_attr must be used instead of esc_url
		
		if ( $link != '' ) {
			$output = '<a href="' . esc_attr( $link ) . '" target="' . esc_attr( $target ) . '" class="bt_bb_link_content" title="' . esc_attr( $text ) . '">';
				$output .= $text_output;
			$output .= '</a>';
		} else {
			$output = '<div class="bt_bb_link_content">';
				$output .= $text_output;
			$output .= '</div>';
		}
		
		
		return $output;
	}	

	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Link', 'ippsum' ), 'description' => esc_html__( 'Text with link', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'text', 'type' => 'textfield', 'heading' => esc_html__( 'Text', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'ippsum' ), 'description' => esc_html__( 'Enter full or local URL (eg. https://www.bold-themes.com or /pages/about-us) or post slug (eg. about-us)', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'ippsum' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'ippsum' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'ippsum' ) => '_blank',
					)
				),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'ippsum' ),
					'value' => array(
						esc_html__( 'Hidden Underline', 'ippsum' ) 	=> '',
						esc_html__( 'Visible Underline', 'ippsum' ) 	=> 'underline'
					)
				),
				array( 'param_name' => 'colors', 'type' => 'dropdown', 'heading' => esc_html__( 'Colors', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 		=> '',
						esc_html__( 'All Light', 'ippsum' ) 	=> 'light'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Size', 'ippsum' ),
					'value' => array(
						esc_html__( 'Small', 'ippsum' ) 	=> 'small',
						esc_html__( 'Normal', 'ippsum' ) 	=> '',
						esc_html__( 'Large', 'ippsum' ) 	=> 'large'
					)
				)
			)
		) );
	} 
}