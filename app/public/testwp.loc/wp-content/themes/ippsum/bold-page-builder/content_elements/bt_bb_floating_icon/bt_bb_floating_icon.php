<?php

class bt_bb_floating_icon extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'icon'      					=> '',
			'color'   						=> '',
			'color_icon'         			=> '',
			'size'   						=> '',
			'horizontal_position'  			=> 'left',
			'vertical_position'  			=> 'top',
			'animation_style'  				=> 'ease_out',
			'animation_delay'  				=> 'default',
			'animation_duration'  			=> '',
			'animation_speed'  				=> '1.0',
			'animation_direction'  			=> '',
			'lazy_load'  					=> 'no'
		) ), $atts, $this->shortcode ) );
		
		wp_enqueue_script(
			'bt_bb_floating_icon',
			get_template_directory_uri() . '/bold-page-builder/content_elements/bt_bb_floating_icon/bt_bb_floating_icon.js',
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

		if ( $color != '' ) {
			$class[] = $this->shortcode . '_color' . '_' . $color;
		}

		if ( $color_icon != '' ) {
			$el_style = $el_style . 'color:' . $color_icon . ';';
		}

		if ( $size != '' ) {
			$class[] = $this->shortcode . '_size' . '_' . $size;
		}

		if ( $horizontal_position != '' ) {
			$class[] = $this->shortcode . '_horizontal_position' . '_' . $horizontal_position;
		}

		if ( $vertical_position != '' ) {
			$class[] = $this->shortcode . '_vertical_position' . '_' . $vertical_position;
		}

		if ( $animation_delay != '' ) {
			$class[] = $this->shortcode . '_animation_delay' . '_' . $animation_delay;
		}

		if ( $animation_duration != '' ) {
			$class[] = $this->shortcode . '_animation_duration' . '_' . $animation_duration;
		}

		if ( $animation_style != '' ) {
			$class[] = $this->shortcode . '_animation_style' . '_' . $animation_style;
		}

		if ( $animation_direction != '' ) {
			$class[] = $this->shortcode . '_animation_direction' . '_' . $animation_direction;
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

		$icon_html = bt_bb_icon::get_html( $icon, '' );

		$output = '';

		if ( $icon != '' ) {
			$output .= '<div class="' . esc_attr( $this->shortcode . '_icon') . '" data-speed="' . esc_attr( $animation_speed ) . '" data-direction="' . esc_attr( $animation_direction ) . '" >' . $icon_html . '</div>';
		}
		
		$output = '<div' . $id_attr . ' class="' . esc_attr( implode( ' ', $class ) ) . '"' . $style_attr . ' data-speed="' . esc_attr( $animation_speed ) . '" data-direction="' . esc_attr( $animation_direction ) . '" >' . ( $output ) . '</div>';

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

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Floating icon', 'ippsum' ), 'description' => esc_html__( 'Absolute positioned floating icon', 'ippsum' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode, 'as_child' => array( 'only' => 'bt_bb_image, bt_bb_column, bt_bb_column_inner' ),
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'ippsum' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'vertical_position', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Vertical position', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 					=> 'default',
						esc_html__( 'Top (absolute)', 'ippsum' ) 			=> 'top',
						esc_html__( 'Middle (absolute)', 'ippsum' ) 		=> 'middle',
						esc_html__( 'Bottom (absolute)', 'ippsum' ) 		=> 'bottom'
					)
				),
				array( 'param_name' => 'horizontal_position', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'heading' => esc_html__( 'Horizontal position', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 					=> 'default',
						esc_html__( 'Left (absolute)', 'ippsum' ) 			=> 'left',
						esc_html__( 'Center (absolute)', 'ippsum' ) 		=> 'center',
						esc_html__( 'Right (absolute)', 'ippsum' ) 		=> 'right'
					)
				),


				array( 'param_name' => 'size', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Small', 'ippsum' ) 					=> 'small',
						esc_html__( 'Medium', 'ippsum' ) 					=> 'medium',
						esc_html__( 'Normal', 'ippsum' ) 					=> '',
						esc_html__( 'Large', 'ippsum' ) 					=> 'large',
						esc_html__( 'Extra Large', 'ippsum' ) 				=> 'extralarge'
					)
				),
				array( 'param_name' => 'color', 'default' => '', 'group' => esc_html__( 'Design', 'ippsum' ), 'type' => 'dropdown', 'heading' => esc_html__( 'Icon color', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Accent color', 'ippsum' ) 			=> '',
						esc_html__( 'Alternate color', 'ippsum' ) 			=> 'alternate',
						esc_html__( 'Light color', 'ippsum' ) 				=> 'light',
						esc_html__( 'Dark color', 'ippsum' ) 				=> 'dark'
					)
				),
				array( 'param_name' => 'color_icon', 'type' => 'colorpicker', 'heading' => esc_html__( 'Choose color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'preview' => true ),
				
				
				array( 'param_name' => 'animation_style', 'preview' => true, 'default' => 'ease_out', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'ippsum' ), 'heading' => esc_html__( 'Animation style (check https://easings.net/en)', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Ease out (default)', 'ippsum' ) 		=> 'ease_out',
						esc_html__( 'Ease out sine', 'ippsum' ) 			=> 'ease_out_sine',
						esc_html__( 'Ease in', 'ippsum' ) 					=> 'ease_in',
						esc_html__( 'Ease in sine', 'ippsum' ) 			=> 'ease_in_sine',
						esc_html__( 'Ease in out', 'ippsum' ) 				=> 'ease_in_out',
						esc_html__( 'Ease in out sine', 'ippsum' ) 		=> 'ease_in_out_sine',
						esc_html__( 'Ease in out bounce', 'ippsum' ) 		=> 'ease_in_out_back'
					)
				),
				array( 'param_name' => 'animation_delay', 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'ippsum' ), 'heading' => esc_html__( 'Animation delay', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 					=> 'default',
						esc_html__( '0ms', 'ippsum' ) 						=> '0',
						esc_html__( '100ms', 'ippsum' ) 					=> '100',
						esc_html__( '200ms', 'ippsum' ) 					=> '200',
						esc_html__( '300ms', 'ippsum' ) 					=> '300',
						esc_html__( '400ms', 'ippsum' ) 					=> '400',
						esc_html__( '500ms', 'ippsum' ) 					=> '500',
						esc_html__( '600ms', 'ippsum' ) 					=> '600',
						esc_html__( '700ms', 'ippsum' ) 					=> '700',
						esc_html__( '800ms', 'ippsum' ) 					=> '800',
						esc_html__( '900ms', 'ippsum' ) 					=> '900',
						esc_html__( '1000ms', 'ippsum' ) 					=> '1000'
					)
				),
				array( 'param_name' => 'animation_duration', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'ippsum' ), 'heading' => esc_html__( 'Animation duration', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Default', 'ippsum' ) 					=> 'default',
						esc_html__( '0ms', 'ippsum' ) 						=> '0',
						esc_html__( '100ms', 'ippsum' ) 					=> '100',
						esc_html__( '200ms', 'ippsum' ) 					=> '200',
						esc_html__( '300ms', 'ippsum' ) 					=> '300',
						esc_html__( '400ms', 'ippsum' ) 					=> '400',
						esc_html__( '500ms', 'ippsum' ) 					=> '500',
						esc_html__( '600ms', 'ippsum' ) 					=> '600',
						esc_html__( '700ms', 'ippsum' ) 					=> '700',
						esc_html__( '800ms', 'ippsum' ) 					=> '800',
						esc_html__( '900ms', 'ippsum' ) 					=> '900',
						esc_html__( '1000ms', 'ippsum' ) 					=> '1000',
						esc_html__( '1100ms', 'ippsum' ) 					=> '1100',
						esc_html__( '1200ms', 'ippsum' ) 					=> '1200',
						esc_html__( '1300ms', 'ippsum' ) 					=> '1300',
						esc_html__( '1400ms', 'ippsum' ) 					=> '1400',
						esc_html__( '1500ms', 'ippsum' ) 					=> '1500',
						esc_html__( '2000ms', 'ippsum' ) 					=> '2000',
						esc_html__( '2500ms', 'ippsum' ) 					=> '2500',
						esc_html__( '3000ms', 'ippsum' ) 					=> '3000',
						esc_html__( '3500ms', 'ippsum' ) 					=> '3500',
						esc_html__( '4000ms', 'ippsum' ) 					=> '4000',
						esc_html__( '5000ms', 'ippsum' ) 					=> '5000',
						esc_html__( '6000ms', 'ippsum' ) 					=> '6000'
					)
				),
				array( 'param_name' => 'animation_speed', 'preview' => true, 'default' => '1.0', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'ippsum' ), 'heading' => esc_html__( 'Animation s', 'ippsum' ), 
					'value' => array(
						esc_html__( '0.4 (very short)', 'ippsum' ) 		=> '0.4',
						esc_html__( '0.6', 'ippsum' ) 						=> '0.6',
						esc_html__( '0.8', 'ippsum' ) 						=> '0.8',
						esc_html__( '1.0', 'ippsum' ) 						=> '1.0',
						esc_html__( '1.2 (default)', 'ippsum' ) 			=> '1.2',
						esc_html__( '1.4', 'ippsum' ) 						=> '1.4',
						esc_html__( '1.6 (long)', 'ippsum' ) 				=> '1.6',
						esc_html__( '1.8', 'ippsum' ) 						=> '1.8',
						esc_html__( '2.0 (very long)', 'ippsum' ) 			=> '2.0',
						esc_html__( '2.5 (very very long)', 'ippsum' ) 	=> '2.5'
					)
				),
				array( 'param_name' => 'animation_direction', 'preview' => true, 'default' => '', 'type' => 'dropdown', 'group' => esc_html__( 'Animation', 'ippsum' ), 'heading' => esc_html__( 'Animation direction', 'ippsum' ), 
					'value' => array(
						esc_html__( 'Top & bottom', 'ippsum' ) 			=> '',
						esc_html__( 'Left & right', 'ippsum' ) 			=> 'left_right',
						esc_html__( 'Rotate', 'ippsum' ) 					=> 'rotate'
					)
				)
			)
		) );
	}
}