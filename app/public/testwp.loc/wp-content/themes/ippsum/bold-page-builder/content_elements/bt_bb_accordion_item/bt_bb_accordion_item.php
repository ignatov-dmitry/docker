<?php

class bt_bb_accordion_item extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon' => '',
			'title' => ''
		) ), $atts, $this->shortcode ) );
		
		$class = array( $this->shortcode );

		if ( $icon != '' ) {
			$class[] = "btWithIcon";
		}
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$icon_html = bt_bb_icon::get_html( $icon, '' );
		

		$output = '<div class="' . implode( ' ', $class ) . '">';
			if ( $icon != '' ) {
				$output .= '<div class="bt_bb_accordion_item_title_content">' . $icon_html . '<div class="bt_bb_accordion_item_title">' . esc_attr( $title ) . '</div></div>';
			} else {
				$output .= '<div class="bt_bb_accordion_item_title_content"><div class="bt_bb_accordion_item_title">' . $title . '</div></div>';
			}
			$output .= '<div class="bt_bb_accordion_item_content">' . wpautop( wptexturize( do_shortcode( $content ) ) ) . '</div>';
		$output .= '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
		
		return $output;

	}
	
	function add_params() {
		// removes default params from BT_BB_Element
	}

	function map_shortcode() {

		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			require_once( dirname(__FILE__) . '/../../content_elements_misc/fa_icons.php' );
			require_once( dirname(__FILE__) . '/../../content_elements_misc/s7_icons.php' );
			$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
		}

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Accordion Item', 'ippsum' ), 'toggle' => true, 'description' => esc_html__( 'Single accordion element', 'ippsum' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_section' => false, 'bt_bb_row' => false, 'bt_bb_column' => false, 'bt_bb_column_inner' => false, 'bt_bb_tabs' => false, 'bt_bb_tab_item' => false, 'bt_bb_accordion' => false, 'bt_bb_accordion_item' => false, 'bt_bb_cost_calculator_item' => false, 'bt_cc_group' => false, 'bt_cc_multiply' => false, 'bt_cc_item' => false, 'bt_bb_content_slider_item' => false, 'bt_bb_google_maps_location' => false, '_content' => false ), 'accept_all' => true, 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'ippsum' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'ippsum' ), 'preview' => true )			
			)
		) );
	}
}