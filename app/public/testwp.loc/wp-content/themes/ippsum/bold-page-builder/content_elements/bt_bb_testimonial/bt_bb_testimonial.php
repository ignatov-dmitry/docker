<?php

class bt_bb_testimonial extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'title'					=> '',
			'rating'				=> '',
			'text'					=> '',
			'image'					=> '',
			'name'					=> '',
			'details'				=> '',
			'image_position'		=> '',
			'image_border'			=> '',
			'border'				=> '',
			'shadow'				=> '',
			'shape'					=> '',
			'background_color'		=> '',
			'text_style'			=> '',
			'title_size'			=> 'medium'

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

		if ( $shadow != '' ) {
			$class[] = $this->prefix . 'shadow' . '_' . $shadow;
		}

		if ( $image_position != '' ) {
			$class[] = $this->prefix . 'image_position' . '_' . $image_position;
		}

		if ( $image_border != '' ) {
			$class[] = $this->prefix . 'image_border' . '_' . $image_border;
		}

		if ( $border != '' ) {
			$class[] = $this->prefix . 'border' . '_' . $border;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}

		if ( $text_style != '' ) {
			$class[] = $this->prefix . 'text_style' . '_' . $text_style;
		}

		if ( $background_color != '' ) {
			$class[] = $this->prefix . 'background_color' . '_' . $background_color;
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


		$output = '';

		// IMAGE ON TOP
		if ( $image_position == 'on_top' ) {
			if ( $image != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" size="boldthemes_small_square" shape="hard-rounded" caption="' . esc_attr( $title ) . '"]' ) . '</div>';
		}

		// TITLE
		if ( $title != '' ) $output .= do_shortcode('[bt_bb_headline headline="' . esc_attr( $title ) . '" html_tag="h4" size="' . esc_attr( $title_size ) . '"]');

		// RATING STARS
		if ( $rating != '' ) {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_ratings' ) . '">';
				for ($i = 1; $i <= intval( $rating ); $i++) {
					$output .= '<div class="' . esc_attr( $this->shortcode . '_icon' ) . '"><span></span></div>';
				}
			$output .= '</div>';
		}


		// TEXT
		if ( $text != '' ) {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_text' ) . '"><span>' . $text . '</span></div>';
		}

		// IMAGE & NAME
		$output .= '<div class="' . esc_attr( $this->shortcode . '_text_box' ) . '">';

			// IMAGE
			if ( $image_position == '' ) {
				if ( $image != '' ) $output .=  '<div class="' . esc_attr( $this->shortcode . '_image') . '">' . do_shortcode( '[bt_bb_image image="' . esc_attr( $image ) . '" size="boldthemes_small_square" shape="hard-rounded" caption="' . esc_attr( $title ) . '"]' ) . '</div>';
			}
		
			// NAME
			if ( ( $name != '' ) && ( $details != '') ) {
				$output .= do_shortcode('[bt_bb_headline superheadline="' . esc_attr( $name ) . '" html_tag="h6" size="small" subheadline="' . esc_attr( $details ) . '"]');
			}

		$output .= '</div>';


		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . '>' . ( $output ) . '</div>';

		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );
			
		return $output;

	}


	function map_shortcode() {

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Testimonial', 'ippsum' ), 'description' => esc_html__( 'Testimonial with ratings, text and title', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'title', 'type' => 'textarea', 'preview' => true, 'heading' => esc_html__( 'Title', 'ippsum' ) ),
				array( 'param_name' => 'rating', 'type' => 'dropdown', 'heading' => esc_html__( 'Rating', 'ippsum' ),
					'value' => array(
						esc_html__( 'None', 'ippsum' ) 				=> '',
						esc_html__( '1 star', 'ippsum' ) 				=> '1',
						esc_html__( '2 stars', 'ippsum' ) 				=> '2',
						esc_html__( '3 stars', 'ippsum' ) 				=> '3',
						esc_html__( '4 stars', 'ippsum' ) 				=> '4',
						esc_html__( '5 stars', 'ippsum' ) 				=> '5'
					)
				),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'ippsum' ) ),
				array( 'param_name' => 'image', 'type' => 'attach_image', 'preview' => true, 'heading' => esc_html__( 'Image', 'ippsum' ) 
				),
				array( 'param_name' => 'name', 'type' => 'textfield', 'heading' => esc_html__( 'Name', 'ippsum' ) ),
				array( 'param_name' => 'details', 'type' => 'textfield', 'heading' => esc_html__( 'Details', 'ippsum' ) ),

				array( 'param_name' => 'image_position', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Image position', 'ippsum' ),
					'value' => array(
						esc_html__( 'Below text', 'ippsum' ) 			=> '',
						esc_html__( 'On top', 'ippsum' ) 				=> 'on_top'
					)
				),
				array( 'param_name' => 'image_border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Image border', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 					=> '',
						esc_html__( 'Yes', 'ippsum' ) 					=> 'visible'
					)
				),
				array( 'param_name' => 'shadow', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show shadow', 'ippsum' ),
					'value' => array(
						esc_html__( 'No (default)', 'ippsum' ) 		=> '',
						esc_html__( 'Yes', 'ippsum' ) 					=> 'visible'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Shape', 'ippsum' ),
					'value' => array(
						esc_html__( 'Square (default)', 'ippsum' ) 	=> '',
						esc_html__( 'Round', 'ippsum' ) 				=> 'round'
					)
				),
				array( 'param_name' => 'border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show border', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 					=> '',
						esc_html__( 'Yes', 'ippsum' ) 					=> 'visible'
					)
				),
				array( 'param_name' => 'background_color', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Transparent (default)', 'ippsum' ) 				=> '',
						esc_html__( 'Dark font, light background', 'ippsum' ) 			=> 'light',
						esc_html__( 'Light font, dark background', 'ippsum' ) 			=> 'dark',
						esc_html__( 'Dark font, gray background', 'ippsum' ) 			=> 'gray',
						esc_html__( 'Light font, accent background', 'ippsum' ) 		=> 'accent',
						esc_html__( 'Light font, alternate background', 'ippsum' ) 	=> 'alternate',
						esc_html__( 'Alternate font, light background', 'ippsum' ) 	=> 'light_alternate'
					)
				),
				array( 'param_name' => 'title_size', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'default' => 'medium', 'heading' => esc_html__( 'Title size', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Small', 'ippsum' ) 				=> 'small',
						esc_html__( 'Medium', 'ippsum' ) 				=> 'medium',
						esc_html__( 'Large', 'ippsum' ) 				=> 'normal'
					)
				),
				array( 'param_name' => 'text_style', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Text style', 'ippsum' ),
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 				=> '',
						esc_html__( 'Transparent 70%', 'ippsum' ) 		=> 'transparent'
					)
				)
			))
		);
	}
}