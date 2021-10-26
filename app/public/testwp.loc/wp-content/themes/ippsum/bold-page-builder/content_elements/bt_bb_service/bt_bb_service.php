<?php

class bt_bb_service extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon'         		=> '',
			'supertitle'   		=> '',
			'title'        		=> '',
			'text'         		=> '',
			'url'          		=> '',
			'target'       		=> '',
			'color_scheme' 		=> '',
			'style'        		=> '',
			'icon_position' 	=> '',
			'icon_align' 		=> '',
			'supertitle_style'  => '',
			'text_style'		=> '',
			'border'        	=> '',
			'size'         		=> '',
			'shape'        		=> ''
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
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}		

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $icon_position != '' ) {
			$class[] = $this->prefix . 'icon_position' . '_' . $icon_position;
		}

		if ( $icon_align != '' ) {
			$class[] = $this->prefix . 'icon_align' . '_' . $icon_align;
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $supertitle_style != '' ) {
			$class[] = $this->prefix . 'supertitle_style' . '_' . $supertitle_style ;
		}

		if ( $text_style != '' ) {
			$class[] = $this->prefix . 'text_style' . '_' . $text_style ;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $supertitle == '' ) {
			$class[] = 'NoSupertitle';
		}
		
		
		$link = bt_bb_get_url( $url );

		$icon_title = wp_strip_all_tags($title);
		
		$icon = bt_bb_icon::get_html( $icon, '', $link, $icon_title, $target );

		if ( $link != '' ) {
			if ( $title != '' ) $title = '<a href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '">' . $title . '</a>';
		} 

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		if ( $icon_position == 'on_top' ) {

			$output = $icon;

			$output .= '<div class="' . esc_attr( $this->shortcode ) . '_inner">';
				

				$output .= '<div class="' . esc_attr( $this->shortcode ) . '_content">';
					if ( $supertitle != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_content_supertitle">' . $supertitle . '</div>';
					if ( $title != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_content_title">' . $title . '</div>';
				$output .= '</div>';
			$output .= '</div>';
		
		} else {

			$output = '<div class="' . esc_attr( $this->shortcode ) . '_inner">';
				$output .= $icon;

				$output .= '<div class="' . esc_attr( $this->shortcode ) . '_content">';
					if ( $supertitle != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_content_supertitle">' . $supertitle . '</div>';
					if ( $title != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_content_title">' . $title . '</div>';
				$output .= '</div>';
			$output .= '</div>';
		}

		if ( $text != '' ) $output .= '<div class="' . esc_attr( $this->shortcode ) . '_content_text">' . nl2br( $text ) . '</div>';

		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . $output . '</div>';
		
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

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Service', 'ippsum' ), 'description' => esc_html__( 'Icon with text', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'ippsum' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'supertitle', 'type' => 'textfield', 'heading' => esc_html__( 'Supertitle', 'ippsum' ) ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'ippsum' ) ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'ippsum' ), 'group' => esc_html__( 'URL', 'ippsum' ), 'description' => esc_html__( 'Enter full or local URL (eg. https://www.bold-themes.com or /pages/about-us) or post slug (eg. about-us)', 'ippsum' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'ippsum' ), 'group' => esc_html__( 'URL', 'ippsum' ),
					'value' => array(
						esc_html__( 'Self (open in same tab)', 'ippsum' ) => '_self',
						esc_html__( 'Blank (open in new tab)', 'ippsum' ) => '_blank',
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'ippsum' ), 'preview' => true, 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Extra small', 'ippsum' ) 				=> 'xsmall',
						esc_html__( 'Small', 'ippsum' ) 					=> 'small',
						esc_html__( 'Normal', 'ippsum' ) 					=> 'normal',
						esc_html__( 'Large', 'ippsum' ) 					=> 'large',
						esc_html__( 'Extra large', 'ippsum' ) 				=> 'xlarge',
						esc_html__( 'Huge', 'ippsum' ) 					=> 'huge'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'ippsum' ) ),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon style', 'ippsum' ), 'preview' => true, 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Outline', 'ippsum' ) 					=> 'outline',
						esc_html__( 'Filled', 'ippsum' ) 					=> 'filled',
						esc_html__( 'Borderless', 'ippsum' ) 				=> 'borderless'
					)
				),
				array( 'param_name' => 'icon_position', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon position', 'ippsum' ), 'preview' => true, 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default (next to title)', 'ippsum' ) 	=> '',
						esc_html__( 'On top (above title)', 'ippsum' ) 	=> 'on_top'
					)
				),
				array( 'param_name' => 'icon_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon align', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Center', 'ippsum' ) 				=> '',
						esc_html__( 'Top', 'ippsum' ) 					=> 'top',
						esc_html__( 'Bottom', 'ippsum' ) 				=> 'bottom'
					)
				),
				array( 'param_name' => 'border', 'type' => 'dropdown', 'heading' => esc_html__( 'Show border', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 						=> '',
						esc_html__( 'Yes (accent color)', 'ippsum' ) 		=> 'accent'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon shape', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Circle', 'ippsum' ) 					=> 'circle',
						esc_html__( 'Square', 'ippsum' ) 					=> 'square',
						esc_html__( 'Rounded Square', 'ippsum' ) 			=> 'round'
					)
				),
				array( 'param_name' => 'supertitle_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Supertitle style', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Transparent 50%', 'ippsum' ) 		=> 'transparent',
						esc_html__( 'Accent color', 'ippsum' ) 		=> 'accent'
					)
				),
				array( 'param_name' => 'text_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Text style', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Transparent 80%', 'ippsum' ) 		=> 'transparent'
					)
				)
			)
		) );
	}
}