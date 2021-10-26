<?php

class bt_bb_section extends BT_BB_Element {
    
        function  bb_exist() {
            if ( file_exists( WP_PLUGIN_DIR . '/bold-page-builder/bold-builder.php' ) ) { return true; }
            return false;
        }

	function handle_shortcode( $atts, $content ) {
                if ( !$this->bb_exist() ) { return false; }
            
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'layout'                		=> '',
			'full_screen'           		=> '',
			'vertical_align'        		=> '',
			'top_spacing'           		=> '',
			'bottom_spacing'        		=> '',
			'color_scheme'          		=> '',
			'background_color'      		=> '',
			'background_image'      		=> '',
			'lazy_load'  					=> 'no',
			'background_overlay'    		=> '',
			'background_video_yt'   		=> '',
			'yt_video_settings'     		=> '',
			'background_video_mp4'  		=> '',
			'background_video_ogg'  		=> '',
			'background_video_webm' 		=> '',
			'show_video_on_mobile' 			=> '',
			'parallax'              		=> '',
			'parallax_offset'       		=> '',

			'top_section_coverage_image'    => '',
			'bottom_section_coverage_image' => '',
			'top_background_color' 			=> '',
			'bottom_background_color' 		=> '',

			'allow_content_outside'         => 'no'
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		wp_enqueue_script(
			'bt_bb_elements',
			 plugins_url() . '/bold-page-builder/content_elements/bt_bb_section/bt_bb_elements.js',
			 array( 'jquery' ),
			 '',
			 true
		);
		
		$show_video_on_mobile = ( $show_video_on_mobile == 'show_video_on_mobile' || $show_video_on_mobile == 'yes' ) ? 1 : 0;

		if ( $top_spacing != '' ) {
			$class[] = $this->prefix . 'top_spacing' . '_' . $top_spacing;
		}

		if ( $bottom_spacing != '' ) {
			$class[] = $this->prefix . 'bottom_spacing' . '_' . $bottom_spacing;
		}

		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}
		
		if ( $background_color != '' ) {
			$el_style = $el_style . ';' . 'background-color:' . $background_color . ';';
		}

		$el_bottom_style = '';
		if ( $bottom_background_color != '' ) {
			$el_bottom_style = $el_bottom_style . ';' . 'background:' . $bottom_background_color . ';';
		}

		$el_top_style = '';
		if ( $top_background_color != '' ) {
			$el_top_style = $el_top_style . ';' . 'background:' . $top_background_color . ';';
		}

		if ( $layout != '' ) {
			$class[] = $this->prefix . 'layout' . '_' . $layout;
		}

		if ( $full_screen == 'yes' ) {
			$class[] = $this->prefix . 'full_screen';
		}

		if ( $bottom_section_coverage_image != '' ) {
			$class[] = $this->prefix . 'bottom_coverage' . '_' . $bottom_section_coverage_image;
		}

		if ( $top_section_coverage_image != '' ) {
			$class[] = $this->prefix . 'top_coverage' . '_' . $top_section_coverage_image;
		}

		if ( $vertical_align != '' ) {
			$class[] = $this->prefix . 'vertical_align' . '_' . $vertical_align;
		}
		$background_data_attr = '';

		if ( $background_image != '' ) {
			$background_image = wp_get_attachment_image_src( $background_image, 'full' );
		}

		$background_image_url = '';
		$data_parallax_attr = '';

		if ( $background_image ) {
			$background_image_url = isset($background_image[0]) ? $background_image[0] : '';
		}
		if ( $background_image_url != '' ) {
			if ( $lazy_load == 'yes' ) {
				$blank_image_src = BT_BB_Root::$path . 'img/blank.gif';
				$background_image_style = 'background-image:url(\'' . $blank_image_src . '\');';
				$background_data_attr .= ' data-background_image_src="\'' . $background_image_url . '\'"';
				$class[] = 'btLazyLoadBackground';
			} else {
				$background_image_style = 'background-image:url(\'' . $background_image_url . '\');';
				
			}
			$el_style = $background_image_style . $el_style;	
			$class[] = $this->prefix . 'background_image';

			if ( $parallax != '' ) {
				$data_parallax_attr = 'data-parallax="' . esc_attr( $parallax ) . '" data-parallax-offset="' . esc_attr( intval( $parallax_offset ) ) . '"';
				$class[] = $this->prefix . 'parallax';
			}
		}

		if ( $background_overlay != '' ) {
			$class[] = $this->prefix . 'background_overlay' . '_' . $background_overlay;
		}

		$id_attr = '';
		if ( $el_id == '' ) {
			$el_id = uniqid( 'bt_bb_section' );
		}
		$id_attr = 'id="' . esc_attr( $el_id ) . '"';

		$background_video_attr = '';

		$video_html = '';

		if ( $background_video_yt != '' ) {
			wp_enqueue_style( 'bt_bb_style_yt', plugins_url() . '/bold-page-builder/content_elements/bt_bb_section/YTPlayer.css' );
			wp_enqueue_script( 
				'bt_bb_yt',
				plugins_url() . '/bold-page-builder/content_elements/bt_bb_section/jquery.mb.YTPlayer.min.js',
				array( 'jquery' ),
				'',
				true
			);

			$class[] = $this->prefix . 'background_video_yt';

			if ( $yt_video_settings == '' ) {
				$yt_video_settings = 'showControls:false,showYTLogo:false,startAt:0,loop:true,mute:true,stopMovieOnBlur:false,opacity:1';
				// $yt_video_settings = '';
			}
			
			$yt_video_settings .= $show_video_on_mobile ? ',useOnMobile:true' : ',useOnMobile:false';
			
			$yt_video_settings .= '';
			// $yt_video_settings .= ',cc_load_policy:false,showAnnotations:false,optimizeDisplay:true,anchor:\'center,center\'';

			$background_video_attr = ' ' . 'data-property="{videoURL:\'' . $background_video_yt . '\',containment:\'#' . $el_id . '\',' . $yt_video_settings . '}"';
			
			$video_html .= '<div class="' . esc_attr( $this->prefix ) . 'background_video_yt_inner" ' . $background_video_attr . ' ></div>';
			
			$proxy = new BT_BB_YT_Video_Proxy( $this->prefix, $el_id );
			add_action( 'wp_footer', array( $proxy, 'js_init' ) );

		} else if ( ( $background_video_mp4 != '' || $background_video_ogg != '' || $background_video_webm != '' ) && ! ( wp_is_mobile() && ! $show_video_on_mobile ) ) {
			$class[] = $this->prefix . 'video';
			$video_html = '<video autoplay loop muted playsinline onplay="bt_bb_video_callback( this )">';
			if ( $background_video_mp4 != '' ) {
				$video_html .= '<source src="' . esc_url_raw( $background_video_mp4 ) . '" type="video/mp4">';
			}
			if ( $background_video_ogg != '' ) {
				$video_html .= '<source src="' . esc_url_raw( $background_video_ogg ) . '" type="video/ogg">';
			}
			if ( $background_video_webm != '' ) {
				$video_html .= '<source src="' . esc_url_raw( $background_video_webm ) . '" type="video/webm">';
			}
			$video_html .= '</video>';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );
		$class_attr = implode( ' ', $class );


		if ( $el_class != '' ) {
			$class_attr = $class_attr . ' ' . $el_class;
		}

		if ( $allow_content_outside == 'yes' ) {
			$class_attr = $class_attr . ' ' . $this->shortcode . '_allow_content_outside';
		}

		$bottom_style_attr = '';
		if ( $el_bottom_style != '' ) {
			$bottom_style_attr = 'style="' . esc_attr( $el_bottom_style ) . '"';
		}

		$top_style_attr = '';
		if ( $el_top_style != '' ) {
			$top_style_attr = 'style="' . esc_attr( $el_top_style ) . '"';
		}

		$top_section_coverage_image_output = '';
			if ( $top_section_coverage_image != '' ) {  
				$top_section_coverage_image_output = 
					'<div class="' . esc_attr( $this->shortcode ) . '_top_coverage" ' . $top_style_attr . '></div>';
			}

		$bottom_section_coverage_image_output = '';
			if ( $bottom_section_coverage_image != '' ) {  
				$bottom_section_coverage_image_output = 
					'<div class="' . esc_attr( $this->shortcode ) . '_bottom_coverage" ' . $bottom_style_attr . '></div>';
			}


		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = 'style="' . esc_attr( $el_style ) . '"';
		}

		$output = '<section ' . $id_attr . ' ' . $data_parallax_attr . $background_data_attr . ' class="' . esc_attr( $class_attr ) . '" ' . $style_attr . '>';
			$output .= $video_html;
			$output .= '<div class="' . esc_attr( $this->prefix ) . 'port">';
				$output .= '<div class="' . esc_attr( $this->prefix ) . 'cell">';
					$output .= '<div class="' . esc_attr( $this->prefix ) . 'cell_inner">';
						$output .= do_shortcode( $content );
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';

			$output .= $top_section_coverage_image_output;
			$output .= $bottom_section_coverage_image_output;

		$output .= '</section>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		if ( !$this->bb_exist() ) { return false; }
		require_once( WP_PLUGIN_DIR   . '/bold-page-builder/content_elements_misc/misc.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Section', 'ippsum' ), 'description' => esc_html__( 'Basic root element', 'ippsum' ), 'root' => true, 'container' => 'vertical', 'accept' => array( 'bt_bb_row' => true ), 'toggle' => true, 'auto_add' => 'bt_bb_row', 'show_settings_on_create' => false,
			'params' => array( 
				array( 'param_name' => 'layout', 'type' => 'dropdown', 'default' => 'boxed_1200', 'heading' => esc_html__( 'Layout', 'ippsum' ), 'group' => esc_html__( 'General', 'ippsum' ), 'weight' => 0, 'preview' => true,
					'value' => array(
						esc_html__( 'Boxed (800px)', 'ippsum' ) 			=> 'boxed_800',
						esc_html__( 'Boxed (900px)', 'ippsum' ) 			=> 'boxed_900',
						esc_html__( 'Boxed (1000px)', 'ippsum' ) 			=> 'boxed_1000',
						esc_html__( 'Boxed (1100px)', 'ippsum' ) 			=> 'boxed_1100',
						esc_html__( 'Boxed (1200px)', 'ippsum' ) 			=> 'boxed_1200',
						esc_html__( 'Boxed (1300px)', 'ippsum' ) 			=> 'boxed_1300',
						esc_html__( 'Boxed (1400px)', 'ippsum' ) 			=> 'boxed_1400',
						esc_html__( 'Boxed (1500px)', 'ippsum' ) 			=> 'boxed_1500',
						esc_html__( 'Boxed (1600px)', 'ippsum' ) 			=> 'boxed_1600',
						esc_html__( 'Boxed right (1200px)', 'ippsum' ) 	=> 'boxed_right_1200',
						esc_html__( 'Boxed left (1200px)', 'ippsum' ) 		=> 'boxed_left_1200',
						esc_html__( 'Wide', 'ippsum' ) 					=> 'wide'
					)
				),
				array( 'param_name' => 'top_spacing', 'type' => 'dropdown', 'heading' => esc_html__( 'Top spacing', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'No spacing', 'ippsum' ) 		=> '',
						esc_html__( 'Extra small', 'ippsum' ) 		=> 'extra_small',
						esc_html__( 'Small', 'ippsum' ) 			=> 'small',		
						esc_html__( 'Normal', 'ippsum' ) 			=> 'normal',
						esc_html__( 'Medium', 'ippsum' ) 			=> 'medium',
						esc_html__( 'Large', 'ippsum' ) 			=> 'large',
						esc_html__( 'Extra large', 'ippsum' ) 		=> 'extra_large',
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
				array( 'param_name' => 'full_screen', 'type' => 'dropdown', 'heading' => esc_html__( 'Full screen', 'ippsum' ), 
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 	=> '',
						esc_html__( 'Yes', 'ippsum' ) 	=> 'yes'
					)
				),
				array( 'param_name' => 'vertical_align', 'type' => 'dropdown', 'heading' => esc_html__( 'Vertical align (for fullscreen section)', 'ippsum' ), 'preview' => true,
					'value' => array(
						esc_html__( 'Top', 'ippsum' )     => 'top',
						esc_html__( 'Middle', 'ippsum' )  => 'middle',
						esc_html__( 'Bottom', 'ippsum' )  => 'bottom'
					)
				),



				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'ippsum' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'ippsum' )  ),
				array( 'param_name' => 'background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Background color', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 'preview' => true ),
				array( 'param_name' => 'background_image', 'type' => 'attach_image',  'preview' => true, 'heading' => esc_html__( 'Background image', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ) ),
				array( 'param_name' => 'lazy_load', 'type' => 'dropdown', 'default' => 'yes', 'heading' => esc_html__( 'Lazy load background image', 'ippsum' ),
					'value' => array(
						esc_html__( 'No', 'ippsum' ) 	=> 'no',
						esc_html__( 'Yes', 'ippsum' ) 	=> 'yes'
					)
				),
				array( 'param_name' => 'background_overlay', 'type' => 'dropdown', 'heading' => esc_html__( 'Background overlay', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ), 
					'value' => array(
						esc_html__( 'No overlay', 'ippsum' )    				=> '',
						esc_html__( 'Light stripes', 'ippsum' ) 				=> 'light_stripes',
						esc_html__( 'Dark stripes', 'ippsum' )  				=> 'dark_stripes',
						esc_html__( 'Light solid', 'ippsum' )	  				=> 'light_solid',
						esc_html__( 'Dark solid', 'ippsum' )	  				=> 'dark_solid',
						esc_html__( 'Light top & bottom gradient', 'ippsum' )	=> 'light_gradient',
						esc_html__( 'Light top gradient', 'ippsum' )			=> 'light_top_gradient',
						esc_html__( 'Light bottom gradient', 'ippsum' )		=> 'light_bottom_gradient',
						esc_html__( 'Dark gradient', 'ippsum' )				=> 'dark_gradient',
						esc_html__( 'Accent top gradient', 'ippsum' )			=> 'accent_top_gradient',
						esc_html__( 'Accent right gradient', 'ippsum' )		=> 'accent_right_gradient',
						esc_html__( 'Accent left gradient', 'ippsum' )			=> 'accent_left_gradient',
						esc_html__( 'Accent bottom gradient', 'ippsum' )		=> 'accent_bottom_gradient',
					)
				),
				array( 'param_name' => 'parallax', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax (e.g. 0.7)', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ) ),
				array( 'param_name' => 'parallax_offset', 'type' => 'textfield', 'heading' => esc_html__( 'Parallax offset in px (e.g. -100)', 'ippsum' ), 'group' => esc_html__( 'Design', 'ippsum' ) ),



				array( 'param_name' => 'top_section_coverage_image', 'type' => 'dropdown',  'heading' => esc_html__( 'Top Section Coverage Image', 'ippsum' ), 'group' => esc_html__( 'Coverage', 'ippsum' ),
					'value' => array(
						esc_html__( 'None', 'ippsum' )    				=> '',
						esc_html__( 'Left triangle', 'ippsum' ) 			=> 'left_triangle',
						esc_html__( 'Right triangle', 'ippsum' ) 			=> 'right_triangle',
						esc_html__( 'Left large triangle', 'ippsum' ) 		=> 'left_large_triangle',
						esc_html__( 'Right large triangle', 'ippsum' ) 	=> 'right_large_triangle'
					)
				),
				array( 'param_name' => 'top_background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Top background color', 'ippsum' ), 'group' => esc_html__( 'Coverage', 'ippsum' ) ),
				array( 'param_name' => 'bottom_section_coverage_image', 'type' => 'dropdown',  'heading' => esc_html__( 'Bottom Section Coverage Image', 'ippsum' ), 'group' => esc_html__( 'Coverage', 'ippsum' ),
					'value' => array(
						esc_html__( 'None', 'ippsum' )    					=> '',
						esc_html__( 'Left triangle', 'ippsum' ) 			=> 'left_triangle',
						esc_html__( 'Right triangle', 'ippsum' ) 			=> 'right_triangle',
						esc_html__( 'Left large triangle', 'ippsum' ) 		=> 'left_large_triangle',
						esc_html__( 'Right large triangle', 'ippsum' ) 	=> 'right_large_triangle'
					)
				),
				array( 'param_name' => 'bottom_background_color', 'type' => 'colorpicker', 'heading' => esc_html__( 'Bottom background color', 'ippsum' ), 'group' => esc_html__( 'Coverage', 'ippsum' ) ),
				array( 'param_name' => 'allow_content_outside', 'type' => 'dropdown', 'default' => 'no', 'heading' => esc_html__( 'Show content over top or bottom covering image', 'ippsum' ), 'group' => esc_html__( 'Coverage', 'ippsum' ),
					'value' => array(
							esc_html__( 'No (content to be underneath top and bottom covering image)', 'ippsum' ) => 'no',
							esc_html__( 'Yes (content will cover both covering images)', 'ippsum' ) => 'yes'
					)
				),



				array( 'param_name' => 'background_video_yt', 'type' => 'textfield', 'heading' => esc_html__( 'YouTube background video', 'ippsum' ), 'group' => esc_html__( 'Video', 'ippsum' ) ),
				array( 'param_name' => 'yt_video_settings', 'type' => 'textfield', 'heading' => esc_html__( 'YouTube video settings (e.g. startAt:20, mute:true, stopMovieOnBlur:false)', 'ippsum' ), 'group' => esc_html__( 'Video', 'ippsum' ) ),
				array( 'param_name' => 'background_video_mp4', 'type' => 'textfield', 'heading' => esc_html__( 'MP4 background video', 'ippsum' ), 'group' => esc_html__( 'Video', 'ippsum' ) ),
				array( 'param_name' => 'background_video_ogg', 'type' => 'textfield', 'heading' => esc_html__( 'OGG background video', 'ippsum' ), 'group' => esc_html__( 'Video', 'ippsum' ) ),
				array( 'param_name' => 'background_video_webm', 'type' => 'textfield', 'heading' => esc_html__( 'WEBM background video', 'ippsum' ), 'group' => esc_html__( 'Video', 'ippsum' ) ),
				array( 'param_name' => 'show_video_on_mobile',  'type' => 'checkbox', 'value' => array( esc_html__( 'Yes', 'ippsum' ) => 'yes' ), 'default' => '', 'heading' => esc_html__( 'Show Video on Mobile Devices', 'ippsum' ), 'group' => esc_html__( 'Video', 'ippsum' ) )
			)
		) );
	} 
}

class BT_BB_YT_Video_Proxy {
	function __construct( $prefix, $el_id ) {
		$this->prefix = $prefix;
		$this->el_id = $el_id;
	}
	public function js_init() {
		// wp_register_script( 'boldthemes-script-bt-bb-section-js-init', '' );
		// wp_enqueue_script( 'boldthemes-script-bt-bb-section-js-init' );
		// wp_add_inline_script( 'boldthemes-script-bt-bb-section-js-init', 'jQuery(function() { jQuery( "#' . esc_html( $this->el_id ) . ' .' . esc_html( $this->prefix ) . 'background_video_yt_inner" ).YTPlayer();});' );
		wp_add_inline_script( 'bt_bb_yt', 'jQuery(function() { jQuery( "#' . esc_html( $this->el_id ) . ' .' . esc_html( $this->prefix ) . 'background_video_yt_inner" ).YTPlayer();});' );
    }

}
