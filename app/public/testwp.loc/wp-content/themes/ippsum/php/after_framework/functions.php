<?php


/* New image sizes */

function ippsum_custom_image_sizes () {
	
	/* large */
	add_image_size( 'boldthemes_large_3x4', 990, 1320, true );
	
	/* medium */
	add_image_size( 'boldthemes_medium_3x4', 640, 960, true );
	
	/* small */
	add_image_size( 'boldthemes_small_3x4', 360, 480, true );

}

add_action( 'after_setup_theme', 'ippsum_custom_image_sizes', 11);



// COLOR SCHEME

if ( is_file( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' ) ) {
	require_once( dirname(__FILE__) . '/../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
}
if ( function_exists('bt_bb_get_color_scheme_param_array') ) {
	$color_scheme_arr = bt_bb_get_color_scheme_param_array();
} else {
	$color_scheme_arr = array();
}


// ROW - NEGATIVE MARGIN, BORDER, SHAPE, ANIMATION

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_row', array(
		array( 'param_name' => 'border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show border', 'ippsum' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No', 'ippsum' ) 						=> '',
				esc_html__( 'Top (Accent color)', 'ippsum' ) 		=> 'accent_top',
				esc_html__( 'Bottom (Accent color)', 'ippsum' ) 	=> 'accent'
			)
		),
		array( 'param_name' => 'animation', 'type' => 'dropdown', 'heading' => esc_html__( 'Animation', 'ippsum' ), 'preview' => true,
			'value' => array(
				esc_html__( 'No Animation', 'ippsum' ) 			=> 'no_animation',
				esc_html__( 'Fade In', 'ippsum' ) 					=> 'fade_in',
				esc_html__( 'Move Up', 'ippsum' ) 					=> 'move_up',
				esc_html__( 'Move Left', 'ippsum' ) 				=> 'move_left',
				esc_html__( 'Move Right', 'ippsum' ) 				=> 'move_right',
				esc_html__( 'Move Down', 'ippsum' ) 				=> 'move_down',
				esc_html__( 'Zoom in', 'ippsum' ) 					=> 'zoom_in',
				esc_html__( 'Zoom out', 'ippsum' ) 				=> 'zoom_out',
				esc_html__( 'Fade In / Move Up', 'ippsum' ) 		=> 'fade_in move_up',
				esc_html__( 'Fade In / Move Left', 'ippsum' ) 		=> 'fade_in move_left',
				esc_html__( 'Fade In / Move Right', 'ippsum' ) 	=> 'fade_in move_right',
				esc_html__( 'Fade In / Move Down', 'ippsum' ) 		=> 'fade_in move_down',
				esc_html__( 'Fade In / Zoom in', 'ippsum' ) 		=> 'fade_in zoom_in',
				esc_html__( 'Fade In / Zoom out', 'ippsum' ) 		=> 'fade_in zoom_out'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Shape', 'ippsum' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Square (default)', 'ippsum' ) 	=> '',
				esc_html__( 'Round', 'ippsum' ) 				=> 'round'
			)
		),
		array( 'param_name' => 'negative_margin', 'type' => 'dropdown', 'heading' => esc_html__( 'Negative margin', 'ippsum' ), 'group' => esc_html__( 'General', 'ippsum' ), 'preview' => true,
		'value' => array(
				esc_html__( 'No margin', 'ippsum' ) 	=> '',
				esc_html__( 'Small', 'ippsum' ) 		=> 'small',
				esc_html__( 'Normal', 'ippsum' ) 		=> 'normal',
				esc_html__( 'Medium', 'ippsum' ) 		=> 'medium',
				esc_html__( 'Large', 'ippsum' ) 		=> 'large',
				esc_html__( 'Extra Large', 'ippsum' ) 	=> 'extralarge',
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
	));
}

function ippsum_bt_bb_row_class( $class, $atts ) {
	if ( isset( $atts['border'] ) && $atts['border'] != '' ) {
		$class[] = 'bt_bb_border' . '_' . $atts['border'];
	}
	if ( isset( $atts['animation'] ) && $atts['animation'] != '' ) {
		$class[] = 'bt_bb_animation' . '_' . $atts['animation'];
		$class[] = 'animate';
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['negative_margin'] ) && $atts['negative_margin'] != '' ) {
		$class[] = 'bt_bb_negative_margin' . '_' . $atts['negative_margin'];
	}
	return $class;
}

add_filter( 'bt_bb_row_class', 'ippsum_bt_bb_row_class', 10, 2 );


// COLUMN - PADDING, INNER COLOR SCHEME, BOTTOM BORDER, SHADOW, SHAPE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'ippsum' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Normal', 'ippsum' ) 		=> 'normal',
				esc_html__( 'Double', 'ippsum' ) 		=> 'double',
				esc_html__( 'Text Indent', 'ippsum' ) 	=> 'text_indent',
				esc_html__( '0px', 'ippsum' ) 			=> '0',
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
		array( 'param_name' => 'border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show border bottom', 'ippsum' ),
			'value' => array(
				esc_html__( 'No', 'ippsum' ) 						=> '',
				esc_html__( 'Yes (Accent border)', 'ippsum' ) 		=> 'accent'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Shape', 'ippsum' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Square (default)', 'ippsum' ) 	=> '',
				esc_html__( 'Round', 'ippsum' ) 				=> 'round'
			)
		),
		array( 'param_name' => 'shadow', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show shadow', 'ippsum' ),
			'value' => array(
				esc_html__( 'No (default)', 'ippsum' ) 		=> '',
				esc_html__( 'Yes', 'ippsum' ) 					=> 'visible',
				esc_html__( 'Yes (on hover)', 'ippsum' ) 		=> 'visible_hover'
			)
		),
		array( 'param_name' => 'inner_color_scheme', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Inner color scheme', 'ippsum' ), 'value' => $color_scheme_arr ),
	));
}

function ippsum_bt_bb_column_class( $class, $atts ) {
	if ( isset( $atts['inner_color_scheme'] ) && $atts['inner_color_scheme'] != '' ) {
		$class[] = 'bt_bb_inner_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['inner_color_scheme'] );
	}
	if ( isset( $atts['border'] ) && $atts['border'] != '' ) {
		$class[] = 'bt_bb_border' . '_' . $atts['border'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['shadow'] ) && $atts['shadow'] != '' ) {
		$class[] = 'bt_bb_shadow' . '_' . $atts['shadow'];
	}
	return $class;
}

add_filter( 'bt_bb_column_class', 'ippsum_bt_bb_column_class', 10, 2 );


// INNER COLUMN - PADDING, INNER COLOR SCHEME, BORDER, SHADOW

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_column_inner', 'padding' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_column_inner', array(
		array( 'param_name' => 'padding', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner padding', 'ippsum' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Normal', 'ippsum' ) 		=> 'normal',
				esc_html__( 'Double', 'ippsum' ) 		=> 'double',
				esc_html__( 'Text Indent', 'ippsum' ) 	=> 'text_indent',
				esc_html__( '0px', 'ippsum' ) 			=> '0',
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
		array( 'param_name' => 'border', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show border bottom', 'ippsum' ),
			'value' => array(
				esc_html__( 'No', 'ippsum' ) 						=> '',
				esc_html__( 'Yes (Accent border)', 'ippsum' ) 		=> 'accent'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Shape', 'ippsum' ), 'preview' => true,
			'value' => array(
				esc_html__( 'Square (default)', 'ippsum' ) 	=> '',
				esc_html__( 'Round', 'ippsum' ) 				=> 'round'
			)
		),
		array( 'param_name' => 'shadow', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Show shadow', 'ippsum' ),
			'value' => array(
				esc_html__( 'No (default)', 'ippsum' ) 		=> '',
				esc_html__( 'Yes', 'ippsum' ) 					=> 'visible',
				esc_html__( 'Yes (on hover)', 'ippsum' ) 		=> 'visible_hover'
			)
		),
		array( 'param_name' => 'inner_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Inner color scheme', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'value' => $color_scheme_arr ),
	));
}

function ippsum_bt_bb_column_inner_class( $class, $atts ) {
	if ( isset( $atts['inner_color_scheme'] ) && $atts['inner_color_scheme'] != '' ) {
		$class[] = 'bt_bb_inner_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['inner_color_scheme'] );
	}
	if ( isset( $atts['border'] ) && $atts['border'] != '' ) {
		$class[] = 'bt_bb_border' . '_' . $atts['border'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	if ( isset( $atts['shadow'] ) && $atts['shadow'] != '' ) {
		$class[] = 'bt_bb_shadow' . '_' . $atts['shadow'];
	}
	return $class;
}
add_filter( 'bt_bb_column_inner_class', 'ippsum_bt_bb_column_inner_class', 10, 2 );


// CUSTOM MENU - FONT WEIGHT

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_custom_menu', array(
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'ippsum' ),
			'value' => array(
				esc_html__( 'Default', 'ippsum' ) 				=> '',
				esc_html__( 'Thin', 'ippsum' ) 				=> 'thin',
				esc_html__( 'Lighter', 'ippsum' ) 				=> 'lighter',
				esc_html__( 'Light', 'ippsum' ) 				=> 'light',
				esc_html__( 'Normal', 'ippsum' ) 				=> 'normal',
				esc_html__( 'Medium', 'ippsum' ) 				=> 'medium',
				esc_html__( 'Semi bold', 'ippsum' ) 			=> 'semi-bold',
				esc_html__( 'Bold', 'ippsum' ) 				=> 'bold',
				esc_html__( 'Bolder', 'ippsum' ) 				=> 'bolder',
				esc_html__( 'Black', 'ippsum' ) 				=> 'black'
			)
		),
	));
}

function ippsum_bt_bb_custom_menu_class( $class, $atts ) {
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	return $class;
}

add_filter( 'bt_bb_custom_menu_class', 'ippsum_bt_bb_custom_menu_class', 10, 2 );


// BUTTON - WEIGHT, ICON STYLE, STYLE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_button', 'style' );
}


if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_button', array(
		
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'heading' => esc_html__( 'Font weight', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
			'value' => array(
				esc_html__( 'Default', 'ippsum' ) 		=> '',
				esc_html__( 'Thin', 'ippsum' ) 		=> 'thin',
				esc_html__( 'Lighter', 'ippsum' ) 		=> 'lighter',
				esc_html__( 'Light', 'ippsum' ) 		=> 'light',
				esc_html__( 'Normal', 'ippsum' ) 		=> 'normal',
				esc_html__( 'Medium', 'ippsum' ) 		=> 'medium',
				esc_html__( 'Semi bold', 'ippsum' ) 	=> 'semi-bold',
				esc_html__( 'Bold', 'ippsum' ) 		=> 'bold',
				esc_html__( 'Bolder', 'ippsum' ) 		=> 'bolder',
				esc_html__( 'Black', 'ippsum' ) 		=> 'black'
			)
		),
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'ippsum' ), 'preview' => true, 'group' => esc_html__( 'Design', 'ippsum' ),
			'value' => array(
				esc_html__( 'Outline', 'ippsum' ) 				=> 'outline',
				esc_html__( 'Filled', 'ippsum' ) 				=> 'filled',
				esc_html__( 'Filled + Gradient', 'ippsum' ) 	=> 'filled_gradient',
				esc_html__( 'Clean', 'ippsum' ) 				=> 'clean'
			)
		),
		array( 'param_name' => 'icon_style', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon style', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ),
			'value' => array(
				esc_html__( 'Borderless', 'ippsum' ) 		=> '',
				esc_html__( 'Filled', 'ippsum' ) 			=> 'filled'
			)
		),
	));
}

function ippsum_bt_bb_button_class( $class, $atts ) {
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	if ( isset( $atts['icon_style'] ) && $atts['icon_style'] != '' ) {
		$class[] = 'bt_bb_icon_style' . '_' . $atts['icon_style'];
	}
	if ( $atts['icon'] != '' ) {
		$class[] = 'btWithIcon';
	}
	return $class;
}
add_filter( 'bt_bb_button_class', 'ippsum_bt_bb_button_class', 10, 2 );



// ICON - TITLE COLOR, TEXT FONT WEIGHT, URL, POSITION

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_icon', 'text' );
}

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_icon', 'size' );
}


if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_icon', array(
		array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'ippsum' ) ),
		array( 'param_name' => 'size', 'type' => 'dropdown', 'default' => 'small', 'heading' => esc_html__( 'Size', 'ippsum' ), 'preview' => true, 'group' => esc_html__( 'Design', 'ippsum' ),
			'value' => array(
				esc_html__( 'Extra small', 'ippsum' ) 			=> 'xsmall',
				esc_html__( 'Small', 'ippsum' ) 				=> 'small',
				esc_html__( 'Normal', 'ippsum' ) 				=> 'normal',
				esc_html__( 'Large', 'ippsum' ) 				=> 'large',
				esc_html__( 'Extra large', 'ippsum' ) 			=> 'xlarge',
				esc_html__( 'Huge', 'ippsum' ) 				=> 'huge'
			)
		),
		array( 'param_name' => 'text_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Text color scheme', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'value' => $color_scheme_arr ),
		array( 'param_name' => 'weight', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Text font weight', 'ippsum' ),
			'value' => array(
				esc_html__( 'Default', 'ippsum' ) 				=> '',
				esc_html__( 'Thin', 'ippsum' ) 				=> 'thin',
				esc_html__( 'Lighter', 'ippsum' ) 				=> 'lighter',
				esc_html__( 'Light', 'ippsum' ) 				=> 'light',
				esc_html__( 'Normal', 'ippsum' ) 				=> 'normal',
				esc_html__( 'Medium', 'ippsum' ) 				=> 'medium',
				esc_html__( 'Semi bold', 'ippsum' ) 			=> 'semi-bold',
				esc_html__( 'Bold', 'ippsum' ) 				=> 'bold',
				esc_html__( 'Bolder', 'ippsum' ) 				=> 'bolder',
				esc_html__( 'Black', 'ippsum' ) 				=> 'black'
			)
		),

		array( 'param_name' => 'position', 'type' => 'dropdown', 'group' => esc_html__( 'Design', 'ippsum' ), 'heading' => esc_html__( 'Icon position', 'ippsum' ),
			'value' => array(
				esc_html__( 'Center', 'ippsum' ) 				=> '',
				esc_html__( 'Top', 'ippsum' ) 					=> 'top',
				esc_html__( 'Bottom', 'ippsum' ) 				=> 'bottom'
			)
		),
	));
}

function ippsum_bt_bb_icon_class( $class, $atts ) {
	if ( isset( $atts['text_color_scheme'] ) && $atts['text_color_scheme'] != '' ) {
		$class[] = 'bt_bb_text_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['text_color_scheme'] );
	}
	if ( isset( $atts['weight'] ) && $atts['weight'] != '' ) {
		$class[] = 'bt_bb_font_weight' . '_' . $atts['weight'];
	}
	if ( isset( $atts['position'] ) && $atts['position'] != '' ) {
		$class[] = 'bt_bb_position' . '_' . $atts['position'];
	}
	return $class;
}
add_filter( 'bt_bb_icon_class', 'ippsum_bt_bb_icon_class', 10, 2 );


// TAB - WIDTH, SHAPE

if ( function_exists( 'bt_bb_remove_params' ) ) {
	bt_bb_remove_params( 'bt_bb_tabs', 'shape' );
}

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_tabs', array(
		array( 'param_name' => 'width', 'type' => 'dropdown', 'heading' => esc_html__( 'Width', 'ippsum' ),
			'value' => array(
				esc_html__( 'Inline', 'ippsum' ) 		=> '',
				esc_html__( 'Full', 'ippsum' ) 		=> 'full'
			)
		),
	));
}

function ippsum_bt_bb_tabs_class( $class, $atts ) {
	if ( isset( $atts['width'] ) && $atts['width'] != '' ) {
		$class[] = 'bt_bb_width' . '_' . $atts['width'];
	}
	return $class;
}
add_filter( 'bt_bb_tabs_class', 'ippsum_bt_bb_tabs_class', 10, 2 );



// SLIDER - DOTS COLOR SCHEME, ALIGN NAVIGATION

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_content_slider', array(
		array( 'param_name' => 'dots_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Dots color scheme', 'ippsum' ), 'value' => $color_scheme_arr ),
		array( 'param_name' => 'align_navigation', 'type' => 'dropdown', 'heading' => esc_html__( 'Align navigation', 'ippsum' ),
			'value' => array(
				esc_html__( 'Inherit', 'ippsum' ) 				=> '',
				esc_html__( 'Left', 'ippsum' ) 				=> 'left',
				esc_html__( 'Right', 'ippsum' ) 				=> 'right',
				esc_html__( 'Center', 'ippsum' ) 				=> 'center'
			)
		),
	));
}

function ippsum_bt_bb_content_slider_class( $class, $atts ) {
	if ( isset( $atts['align_navigation'] ) && $atts['align_navigation'] != '' ) {
		$class[] = 'bt_bb_align_navigation' . '_' . $atts['align_navigation'];
	}
	if ( isset( $atts['dots_color_scheme'] ) && $atts['dots_color_scheme'] != '' ) {
		$class[] = 'bt_bb_dots_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['dots_color_scheme'] );
	}
	return $class;
}

add_filter( 'bt_bb_content_slider_class', 'ippsum_bt_bb_content_slider_class', 10, 2 );



// IMAGE SLIDER - DOTS COLOR SCHEME

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_slider', array(
		array( 'param_name' => 'dots_color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Dots color scheme', 'ippsum' ), 'value' => $color_scheme_arr ),
		array( 'param_name' => 'gap', 'type' => 'dropdown', 'heading' => esc_html__( 'Gap between images', 'ippsum' ),
			'value' => array(
				esc_html__( 'No', 'ippsum' ) 				=> '',
				esc_html__( 'Yes', 'ippsum' ) 				=> 'visible'
			)
		)
	));
}

function ippsum_bt_bb_slider_class( $class, $atts ) {
	if ( isset( $atts['dots_color_scheme'] ) && $atts['dots_color_scheme'] != '' ) {
		$class[] = 'bt_bb_dots_color_scheme' . '_' . bt_bb_get_color_scheme_id( $atts['dots_color_scheme'] );
	}
	if ( isset( $atts['gap'] ) && $atts['gap'] != '' ) {
		$class[] = 'bt_bb_gap' . '_' . $atts['gap'];
	}
	return $class;
}

add_filter( 'bt_bb_slider_class', 'ippsum_bt_bb_slider_class', 10, 2 );




// IMAGE - BORDER

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_image', array(
		array( 'param_name' => 'border', 'type' => 'dropdown', 'heading' => esc_html__( 'Border', 'ippsum' ),
			'value' => array(
				esc_html__( 'No', 'ippsum' ) 				=> '',
				esc_html__( 'Yes', 'ippsum' ) 				=> 'visible'
			)
		)
	));
}

function ippsum_bt_bb_image_class( $class, $atts ) {
	if ( isset( $atts['border'] ) && $atts['border'] != '' ) {
		$class[] = 'bt_bb_border' . '_' . $atts['border'];
	}
	return $class;
}

add_filter( 'bt_bb_image_class', 'ippsum_bt_bb_image_class', 10, 2 );



// GOOGLE MAP - STYLE

if ( function_exists( 'bt_bb_add_params' ) ) {
	bt_bb_add_params( 'bt_bb_google_maps', array(
		array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Style', 'ippsum' ),
			'value' => array(
				esc_html__( 'Default (content on left)', 'ippsum' ) 				=> '',
				esc_html__( 'Accent border (content on left)', 'ippsum' ) 	=> 'right'
			)
		),
		array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Shape', 'ippsum' ),
			'value' => array(
				esc_html__( 'Square', 'ippsum' ) 				=> '',
				esc_html__( 'Round', 'ippsum' ) 				=> 'round'
			)
		),
	));
}

function ippsum_bt_bb_google_maps_class( $class, $atts ) {
	if ( isset( $atts['style'] ) && $atts['style'] != '' ) {
		$class[] = 'bt_bb_style' . '_' . $atts['style'];
	}
	if ( isset( $atts['shape'] ) && $atts['shape'] != '' ) {
		$class[] = 'bt_bb_shape' . '_' . $atts['shape'];
	}
	return $class;
}

add_filter( 'bt_bb_google_maps_class', 'ippsum_bt_bb_google_maps_class', 10, 2 );