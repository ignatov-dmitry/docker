<?php
 /**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     EngoTheme <engotheme@gmail.com>
 * @copyright  Copyright (C) 2015 engotheme.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.engotheme.com
 * @support  https://engotheme.com/
 */

/**
 * ENGOTHEME Category Drop Down List Class
 * modified dropdown-pages from wp-includes/class-wp-customize-control.php
 *
 * @since ENGOTHEME v1.0
 */
if(  class_exists("WP_Customize_Control") ){

     
    
    class Anton_Sidebar_DropDown extends WP_Customize_Control{
     
        public function render_content(){
            
            global $wp_registered_sidebars;
            
            $output = array();
            
            $output[] = '<option value="">'.esc_html__( 'No Sidebar', 'anton' ).'</option>';

            foreach( $wp_registered_sidebars as $sidebar ){ 
                $selected = ($this->value() == $sidebar['id'])?' selected="selected" ': '';
                $output[] = '<option value="'.$sidebar['id'].'" '.$selected.'>'.$sidebar['name'].'</option>';
            }

            $dropdown = '<select>'.implode( " ", $output ).'</select>';
            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

            printf( 
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
     
        }
    }

    ///
    class Anton_Layout_DropDown extends WP_Customize_Control{
        public $type="PBR_Layout";
        public function render_content(){
            
            $layouts = array(
                'fullwidth' => esc_html__('Full width', 'anton'),
                'leftmain' => esc_html__('Left - Main Sidebar', 'anton'),
                'mainright' => esc_html__('Main - Right Sidebar', 'anton'),
        
            );
             printf( 
                '<label class="customize-control-select"><span class="customize-control-title">%s</span>',
                 $this->label
               
            );
            ?>
            <div class="page-layout">
               

            <?php
            $output = array();
            
            foreach( $layouts as $key => $layout ){ 
                $v = $this->value() ? $this->value() : 'fullwidth' ;   
                $selected = ( $v == $key)?' selected="selected" ': '';
                $output[] = '<option value="'.$key.'" '.$selected.'>'.$layout.'</option>';
            }

            $dropdown = '<select>'.implode( " ", $output ).'</select>';
            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

            printf( 
                '%s</label>',
                
                $dropdown
            ).'</div>';
        }
    }

}
if ( class_exists( 'WP_Customize_Control' ) ) {
    class Anton_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
        public $type = 'dropdown-categories';	

        public function render_content() {
            $dropdown = wp_dropdown_categories( 
                array( 
                    'name'             => '_customize-dropdown-categories-' . $this->id,
                    'echo'             => 0,
                    'hide_empty'       => false,
                    'show_option_none' => '&mdash; ' . esc_html__('Select', 'anton') . ' &mdash;',
                    'hide_if_empty'    => false,
                    'selected'         => $this->value(),
                )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

            printf( 
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

/**
 * ENGOTHEME TextArea Control Class
 * create custom textarea input field
 *
 * @since ENGOTHEME v0.5
 **/

if ( class_exists( 'WP_Customize_Control' ) ) {
    # Adds textarea support to the theme customizer
    class Anton_TextAreaControl extends WP_Customize_Control {
        public $type = 'textarea'; # can change to 'number' for input[type=number] field
        public function __construct( $manager, $id, $args = array() ) {
            $this->statuses = array( '' => esc_html__( 'Default', 'anton' ) );
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {
            echo '<label>
                <span class="customize-control-title">' . esc_html( $this->label ) . '</span>
                <textarea rows="5" style="width:100%;" ';
            $this->link();
            echo '>' . esc_textarea( $this->value() ) . '</textarea>
                </label>';
        }
    }

}

if (  class_exists( 'WP_Customize_Control' ) ) {
     

    /**
     * Class to create a custom tags control
     */
    class Anton_Text_Editor_Custom_Control extends WP_Customize_Control
    {
          /**
           * Render the content on the theme customizer page
           */
          public function render_content()
           {
                ?>
                    <label>
                      <span class="customize-text_editor"><?php echo esc_html( $this->label ); ?></span>
                      <?php
                        $settings = array(
                          'textarea_name' => $this->id
                          );

                        wp_editor($this->value(), $this->id, $settings );
                      ?>
                    </label>
                <?php
           }
    }

}

/**
 * ENGOTHEME Google Front Control Class
 *
 * @since ENGOTHEME v2.1
 **/
if ( class_exists( 'WP_Customize_Control' ) ) {
    # Adds textarea support to the theme customizer
    class Anton_GoogleFontControl extends WP_Customize_Control {
    
        private $fonts = false;

        public function __construct($manager, $id, $args = array(), $options = array()){
            $this->fonts = get_transient( 'google_font_names_');

            if ( ! is_array( $this->fonts ) )
                $this->fonts = $this->get_font_names();

            if ( ! $this->fonts ) return;
            
            parent::__construct( $manager, $id, $args );

        }
    
        public function render_content() {
            if(!empty($this->fonts)) { ?>
                <label>
                    <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                <?php
                foreach ( $this->fonts as $key => $value ) {
                    printf('<option value="%s">%s</option>',
                        $key,
                        $value);
                }
                ?>
                    </select>
                </label>
            <?php
            }
        }

        public function get_font_names() {
            
            $font_name_list = get_transient( 'google_font_names_');

            if ( $font_name_list )
                return $font_name_list;

            $json_name_list = @wp_remote_get( 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity' );

            if ( !isset( $json_name_list ) )
                return;

            $decoded_name_list = @json_decode( $json_name_list[ 'body'] );

            $font_name_list[ 'none' ] = 'none';

            if ( is_object( $decoded_name_list ) )
                foreach ( $decoded_name_list->items as $font_name )
                    $font_name_list[ str_replace( ' ', '+', $font_name->family ) ] = $font_name->family;

            set_transient( 'google_font_names_', $font_name_list, 60 * 60 *24 );
            return $font_name_list;
        }
    }
}
?>
<?php
/**
 * Cropshop Customizer support
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */

/**
 * Implement Customizer additions and adjustments.
 *
 * @since Anton 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function anton_fnc_customize_register( $wp_customize ) {
	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'anton' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = esc_html__( 'Display Site Title &amp; Tagline', 'anton' );

	// Add custom description to Colors and Background controls or sections.
	if ( property_exists( $wp_customize->get_control( 'background_color' ), 'description' ) ) {
		$wp_customize->get_control( 'background_color' )->description = esc_html__( 'May only be visible on wide screens.', 'anton' );
		$wp_customize->get_control( 'background_image' )->description = esc_html__( 'May only be visible on wide screens.', 'anton' );
	} else {
		$wp_customize->get_section( 'colors' )->description           = esc_html__( 'Background may only be visible on wide screens.', 'anton' );
		$wp_customize->get_section( 'background_image' )->description = esc_html__( 'Background may only be visible on wide screens.', 'anton' );
	} 

    $wp_customize->add_setting('link_color', array( 
        'default'    => get_option('link_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('link_color', array( 
        'label'    => esc_html__('Link Color', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('text_color', array( 
        'default'    => get_option('text_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('text_color', array( 
        'label'    => esc_html__('Text Color', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('color_price', array( 
        'default'    => get_option('color_price'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('color_price', array( 
        'label'    => esc_html__('Color Price', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('color_price_old', array( 
        'default'    => get_option('color_price_old'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control('color_price_old', array( 
        'label'    => esc_html__('Color Price Old', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('topbar_bg', array( 
        'default'    => get_option('topbar_bg'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('topbar_bg', array( 
        'label'    => esc_html__('Topbar Background', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('topbar_color', array( 
        'default'    => get_option('footer_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('topbar_color', array( 
        'label'    => esc_html__('Topbar Text Color', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('topbar_bgcart', array( 
        'default'    => get_option('footer_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('topbar_bgcart', array( 
        'label'    => esc_html__('Topbar bg cart', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('page_bg', array( 
        'default'    => get_option('page_bg'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('page_bg', array( 
        'label'    => esc_html__('Page Container Background', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
        'default'   => '#FFFFFF'
    ) );

    $wp_customize->add_setting('footer_bg', array( 
        'default'    => get_option('footer_bg'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('footer_bg', array( 
        'label'    => esc_html__('Footer Background', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('footer_heading_color', array( 
        'default'    => get_option('footer_heading_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('footer_heading_color', array( 
        'label'    => esc_html__('Footer Heading Color', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('footer_color', array( 
        'default'    => get_option('footer_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('footer_color', array( 
        'label'    => esc_html__('Footer Text Color', 'anton'),
        'section'  => 'colors',
        'type'      => 'color',
    ) );

    $wp_customize->add_setting('header_image_link', array( 
        'default'    => get_option('footer_color'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'esc_url_raw',
        'default'   => '#'
    ) );
    
    $wp_customize->add_control('header_image_link', array( 
        'label'    => esc_html__('Image Link', 'anton'),
        'section'  => 'header_image',
        'type'      => 'text',
        'default'   => '#'
    ) );
}

add_action( 'customize_register', 'anton_fnc_customize_register' );

function anton_fnc_sanitize_textarea( $content ){
    return wp_kses_post( trim( $content ) );
}
/**
 *
 */
add_action( 'customize_register', 'anton_fnc_cst_customizer' );

function anton_fnc_cst_customizer($wp_customize){

    # General Settings
    // Panel Header
    $wp_customize->add_section('pbr_cst_general_settings', array(
        'title'      => esc_html__('General Settings', 'anton'),
        'description'    => esc_html__('Website General Settings', 'anton'),
        'transport'  => 'postMessage',
        'priority'   => 10,
    ));

    // Parameter Options
    $wp_customize->add_setting('blogname', array( 
        'default'    => get_option('blogname'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('blogname', array( 
        'label'    => esc_html__('Site Title', 'anton'),
        'section'  => 'pbr_cst_general_settings',
        'priority' => 1,
    ) );
     
    //
    $wp_customize->add_setting('blogdescription', array( 
        'default'    => get_option('blogdescription'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('blogdescription', array( 
        'label'    => esc_html__('Tagline', 'anton'),
        'section'  => 'pbr_cst_general_settings',
        'priority' => 2,
    ) );

    // 
    $wp_customize->add_setting('display_header_text', array( 
        'default'    => 1,
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );    
    $wp_customize->add_control( 'display_header_text', array(
        'settings' => 'header_textcolor',
        'label'    => esc_html__( 'Show Title & Tagline', 'anton' ),
        'section'  => 'pbr_cst_general_settings',
        'type'     => 'checkbox',
        'priority' => 4,
    ) );


    /* 
     * Custom Logo 
     */
    if ( version_compare( $GLOBALS['wp_version'], '4.5', '<' ) ) {
         $wp_customize->add_setting('pbr_theme_options[logo]', array(
            'default'    => '',
            'type'       => 'option',
            'capability' => 'manage_options',
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pbr_theme_options[logo]', array(
            'label'    => esc_html__('Logo', 'anton'),
            'section'  => 'pbr_cst_general_settings',
            'settings' => 'pbr_theme_options[logo]',
            'priority' => 10,
        ) ) );
     }

    // Copyright
    $wp_customize->add_setting('pbr_theme_options[copyright_text]', array(
        'default'    => 'Copyright 2018 - Mixtheme - All Rights Reserved.',
        'type'       => 'option',
        'transport'=>'refresh',
         'sanitize_callback' => 'anton_fnc_sanitize_textarea',
    ) );

    $wp_customize->add_control( new Anton_TextAreaControl( $wp_customize, 'pbr_theme_options[copyright_text]', array(
        'label'    => esc_html__('Copyright text', 'anton'),
        'section'  => 'pbr_cst_general_settings',
        'settings' => 'pbr_theme_options[copyright_text]',
        'priority' => 12,
    ) ) );

    /* 
     * Custom Logo 
     */
     $wp_customize->add_setting('pbr_theme_options[breadcrumb_image]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pbr_theme_options[breadcrumb_image]', array(
        'label'    => esc_html__('Breadcrumb Image', 'anton'),
        'section'  => 'pbr_cst_general_settings',
        'settings' => 'pbr_theme_options[breadcrumb_image]',
        'priority' => 10,
    ) ) );
   /***************************************************************************
    * Theme Settings 
    ***************************************************************************/

  
   /**
     * General Setting
     */
    $wp_customize->add_section( 'ts_general_settings', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Themes And Layouts Setting', 'anton' ),
        'description' => '',
    ) );

    //
    $wp_customize->add_setting( 'pbr_theme_options[skin]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => 'default',
         'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'pbr_theme_options[skin]', array(
        'label'      => esc_html__( 'Active Skin', 'anton' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
        'choices'    => anton_fnc_cst_skins(),
    ) );

     $wp_customize->add_setting( 'pbr_theme_options[headerlayout]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'pbr_theme_options[headerlayout]', array(
        'label'      => esc_html__( 'Header Layout Style', 'anton' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
         'choices' => array(''=>'Default'), 
         'choices'    => anton_fnc_get_header_layouts(),
    ) );


    $wp_customize->add_setting( 'pbr_theme_options[footer-style]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => 'default'   ,
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
     $wp_customize->add_control( 'pbr_theme_options[footer-style]', array(
        'label'      => esc_html__( 'Footer Styles Builder', 'anton' ),
        'section'    => 'ts_general_settings',
        'type'       => 'select',
        'choices'    => anton_fnc_get_footer_profiles()
    ) );
     
 

    /******************************************************************
     * Social share
     ******************************************************************/
    $wp_customize->add_section( 'social_share_settings', array(
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Social Share setting', 'anton' ),
        'description' => '',
    ) );

    // Share facebook
    anton_fnc_social_config( $wp_customize, 'facebook_share_blog', esc_html__('Share facebook ', 'anton'), 'social_share_settings');
    //share twitter
    anton_fnc_social_config( $wp_customize, 'twitter_share_blog', esc_html__('Share twitter ', 'anton'), 'social_share_settings');
    //share linkedin
    anton_fnc_social_config( $wp_customize, 'linkedin_share_blog', esc_html__('Share linkedin ', 'anton'), 'social_share_settings');
    //share tumblr
    anton_fnc_social_config( $wp_customize, 'tumblr_share_blog', esc_html__('Share tumblr ', 'anton'), 'social_share_settings');
    //share google plus
    anton_fnc_social_config( $wp_customize, 'google_share_blog', esc_html__('Share google plus ', 'anton'), 'social_share_settings');
    //share pinterest
    anton_fnc_social_config( $wp_customize, 'pinterest_share_blog', esc_html__('Share pinterest ', 'anton'), 'social_share_settings');
    //share mail
    anton_fnc_social_config( $wp_customize, 'mail_share_blog', esc_html__('Share mail ', 'anton'), 'social_share_settings');


    /******************************************************************
     * Navigation
     ******************************************************************/

     # Sticky Top Bar Option
    $wp_customize->add_setting('pbr_theme_options[verticalmenu]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('pbr_theme_options[verticalmenu]', array(
        'settings'  => 'pbr_theme_options[verticalmenu]',
        'label'     => esc_html__('Vertical Megamenu', 'anton'),
        'section'   => 'nav',
        'type'      => 'select',
        'choices' => anton_fnc_get_menugroups(),
    ) );
    


    # Sticky Top Bar Option
    $wp_customize->add_setting('pbr_theme_options[megamenu-is-sticky]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('pbr_theme_options[megamenu-is-sticky]', array(
        'settings'  => 'pbr_theme_options[megamenu-is-sticky]',
        'label'     => esc_html__('Sticky Top Bar', 'anton'),
        'section'   => 'nav',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );   
 
    $wp_customize->add_setting( 'pbr_theme_options[megamenu-duration]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '300',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'pbr_theme_options[megamenu-duration]', array(
        'label'      => esc_html__(  'Megamenu Duration', 'anton' ),
        'section'    => 'nav',
        'type'    => 'text'
    ) );

    /*****************************************************************
     * Front Page Settings Panel
     *****************************************************************/   
    $wp_customize->add_section( 'static_front_page', array(
        'title'          => esc_html__( 'Front Page Settings', 'anton' ),
        'priority'       => 120,
        'description'    => esc_html__( 'Your theme supports a static front page.', 'anton'),
    ) );

    $wp_customize->add_setting( 'pbr_theme_options[sidebar_position]', array(
        'default' => 'left',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
 
    $wp_customize->add_control( 'pbr_theme_options[sidebar_position]', array(
        'type' => 'radio',
        'label' => 'Sidebar Position',
        'section' => 'static_front_page',
        'priority' => 1,
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
        ),
    ) );

    $wp_customize->add_setting( 'show_on_front', array(
        'default'        => get_option( 'show_on_front' ),
        'capability'     => 'manage_options',
        'type'           => 'option',
        //  'theme_supports' => 'static-front-page',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'show_on_front', array(
        'label'   => esc_html__( 'Front page displays', 'anton' ),
        'section' => 'static_front_page',
        'type'    => 'radio',
        'choices' => array(
            'posts' => esc_html__( 'Your latest posts', 'anton' ),
            'page'  => esc_html__( 'A static page', 'anton' ),
        ),
    ) );
    
    $wp_customize->add_setting( 'page_on_front', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'page_on_front', array(
        'label'      => esc_html__( 'Front page', 'anton' ),
        'section'    => 'static_front_page',
        'type'       => 'dropdown-pages',
    ) );

    $wp_customize->add_setting( 'page_for_posts', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        //  'theme_supports' => 'static-front-page',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'page_for_posts', array(
        'label'      => esc_html__( 'Posts page', 'anton' ),
        'section'    => 'static_front_page',
        'type'       => 'dropdown-pages',
    ) );


    /* 
     /*****************************************************************
     * Front Page Settings Panel
     *****************************************************************/   
    $wp_customize->add_section( 'pages_setting', array(
        'title'          => esc_html__( 'Pages Settings', 'anton' ),
        'priority'       => 120,
        'description'    => esc_html__( 'Your theme supports a static front page.', 'anton'),
    ) );

     
    $wp_customize->add_setting( 'pbr_theme_options[404_post]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => ''   ,
        'sanitize_callback' => 'sanitize_text_field'
        //  'theme_supports' => 'static-front-page',
    ) );
    
     $wp_customize->add_control( 'pbr_theme_options[404_post]', array(
        'label'      => esc_html__( '404 Page', 'anton' ),
        'section'    => 'pages_setting',
        'type'       => 'dropdown-pages',
    ) );

     // 
}


function anton_fnc_social_config( $wp_customize, $id, $name_social, $section){
    $wp_customize->add_setting('pbr_theme_options['.$id.']', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('pbr_theme_options['.$id.']', array(
        'settings'  => 'pbr_theme_options['.$id.']',
        'label'     => $name_social,
        'section'   => $section,
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
}



 
add_action( 'customize_register', 'anton_fnc_blog_settings' );
function anton_fnc_blog_settings( $wp_customize ){
    
    $wp_customize->add_panel( 'panel_blog', array(
        'priority' => 80,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Blog & Post', 'anton' ),
        'description' =>esc_html__( 'Make default setting for page, general', 'anton' ),
    ) );


    /**
     * General Setting
     */
    $wp_customize->add_section( 'blog_general_settings', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'General Setting', 'anton' ),
        'description' => '',
        'panel' => 'panel_blog',
    ) );

    
    

    /**
     * Archive Setting
     */
    $wp_customize->add_section( 'archive_general_settings', array(
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Archive & Categgory Setting', 'anton' ),
        'description' => '',
        'panel' => 'panel_blog',
    ) );

    $wp_customize->add_setting('pbr_theme_options[blog-archive-column]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '1',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'pbr_theme_options[blog-archive-column]', array(
        'label'      => esc_html__( 'Select column', 'anton' ),
        'section'    => 'archive_general_settings',
        'type'       => 'select',
        'choices'     => array(
            '1' => esc_html__('1 column', 'anton' ),
            '2' => esc_html__('2 columns', 'anton' ),
            '3' => esc_html__('3 columns', 'anton' ),
            '4' => esc_html__('4 columns', 'anton' ),
            '6' => esc_html__('6 columns', 'anton' ),
        )
    ) );

      ///  Archive layout setting
    $wp_customize->add_setting( 'pbr_theme_options[blog-archive-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'mainright',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Anton_Layout_DropDown( $wp_customize, 'pbr_theme_options[blog-archive-layout]', array(
        'settings'  => 'pbr_theme_options[blog-archive-layout]',
        'label'     => esc_html__('Archive Layout', 'anton'),
        'section'   => 'archive_general_settings',
        'priority' => 1

    ) ) );

   

   
    $wp_customize->add_setting( 'pbr_theme_options[blog-archive-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'blog-sidebar-left',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    
    $wp_customize->add_control( new Anton_Sidebar_DropDown( $wp_customize, 'pbr_theme_options[blog-archive-left-sidebar]', array(
        'settings'  => 'pbr_theme_options[blog-archive-left-sidebar]',
        'label'     => esc_html__('Archive Left Sidebar', 'anton'),
        'section'   => 'archive_general_settings' ,
         'priority' => 2
    ) ) );

     /// 
    $wp_customize->add_setting( 'pbr_theme_options[blog-archive-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 'blog-sidebar-right',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Anton_Sidebar_DropDown( $wp_customize, 'pbr_theme_options[blog-archive-right-sidebar]', array(
        'settings'  => 'pbr_theme_options[blog-archive-right-sidebar]',
        'label'     => esc_html__('Archive Right Sidebar', 'anton'),
        'section'   => 'archive_general_settings',
         'priority' => 2 
    ) ) );

    /**
     * Single post Setting
     */
    $wp_customize->add_section( 'blog_single_settings', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => esc_html__( 'Single post Setting', 'anton' ),
        'description' => '',
        'panel' => 'panel_blog',
    ) );

    
    $wp_customize->add_setting('pbr_theme_options[blog-show-share-post]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 0,
        'checked' => 0,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('pbr_theme_options[blog-show-share-post]', array(
        'settings'  => 'pbr_theme_options[blog-show-share-post]',
        'label'     => esc_html__('Show share post', 'anton'),
        'section'   => 'blog_single_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );

    $wp_customize->add_setting('pbr_theme_options[blog-show-related-post]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('pbr_theme_options[blog-show-related-post]', array(
        'settings'  => 'pbr_theme_options[blog-show-related-post]',
        'label'     => esc_html__('Show related post', 'anton'),
        'section'   => 'blog_single_settings',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
    

    $wp_customize->add_setting( 'pbr_theme_options[blog-items-show]', array(
        'type'       => 'option',
        'default'    => 4,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'pbr_theme_options[blog-items-show]', array(
        'label'      => esc_html__( 'Number of related posts to show', 'anton' ),
        'section'    => 'blog_single_settings',
        'type'       => 'select',
        'choices'     => array(
            '2' => esc_html__('2 posts', 'anton' ),
            '3' => esc_html__('3 posts', 'anton' ),
            '4' => esc_html__('4 posts', 'anton' ),
            '6' => esc_html__('6 posts', 'anton' ),
        )
    ) );   


       ///  single layout setting
    $wp_customize->add_setting( 'pbr_theme_options[blog-single-layout]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Anton_Layout_DropDown( $wp_customize,  'pbr_theme_options[blog-single-layout]', array(
        'settings'  => 'pbr_theme_options[blog-single-layout]',
        'label'     => esc_html__('Single Blog Layout', 'anton'),
        'section'   => 'blog_single_settings' 
    ) ) );

   
    $wp_customize->add_setting( 'pbr_theme_options[blog-single-left-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Anton_Sidebar_DropDown( $wp_customize,  'pbr_theme_options[blog-single-left-sidebar]', array(
        'settings'  => 'pbr_theme_options[blog-single-left-sidebar]',
        'label'     => esc_html__('Single blog Left Sidebar', 'anton'),
        'section'   => 'blog_single_settings' 
    ) ) );

     $wp_customize->add_setting( 'pbr_theme_options[blog-single-right-sidebar]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new Anton_Sidebar_DropDown( $wp_customize,  'pbr_theme_options[blog-single-right-sidebar]', array(
        'settings'  => 'pbr_theme_options[blog-single-right-sidebar]',
        'label'     => esc_html__('Single blog Right Sidebar', 'anton'),
        'section'   => 'blog_single_settings' 
    ) ) );



}


/**
 * Sanitize the Featured Content layout value.
 *
 * @since Anton 1.0
 *
 * @param string $layout Layout type.
 * @return string Filtered layout type (grid|slider).
 */
function anton_fnc_sanitize_layout( $layout ) {
	if ( ! in_array( $layout, array( 'grid', 'slider' ) ) ) {
		$layout = 'grid';
	}

	return $layout;
}

/**
 * Bind JS handlers to make Customizer preview reload changes asynchronously.
 *
 * @since Anton 1.0
 */
function anton_fnc_customize_preview_js() {
	wp_enqueue_script( 'anton_fnc_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'anton_fnc_customize_preview_js' );

/**
 * Add contextual help to the Themes and Post edit screens.
 *
 * @since Anton 1.0
 */
function anton_fnc_contextual_help() {
	if ( 'admin_head-edit.php' === current_filter() && 'post' !== $GLOBALS['typenow'] ) {
		return;
	}

	get_current_screen()->add_help_tab( array(
		'id'      => 'anton',
		'title'   => esc_html__( 'Anton', 'anton' ),
		'content' =>
			'<ul>' .
				'<li>' . sprintf( wp_kses_post( __( 'The home page features your choice of up to 6 posts prominently displayed in a grid or slider, controlled by a <a href="%1$s">tag</a>; you can change the tag and layout in <a href="%2$s">Appearance &rarr; Customize</a>. If no posts match the tag, <a href="%3$s">sticky posts</a> will be displayed instead.', 'anton' ) ), esc_url( add_query_arg( 'tag', _x( 'featured', 'featured content default tag slug', 'anton' ), admin_url( 'edit.php' ) ) ), admin_url( 'customize.php' ), admin_url( 'edit.php?show_sticky=1' ) ) . '</li>' .
				'<li>' . sprintf( wp_kses_post( __( 'Enhance your site design by using <a href="%s">Featured Images</a> for posts you&rsquo;d like to stand out (also known as post thumbnails). This allows you to associate an image with your post without inserting it. Cropshop uses featured images for posts and pages&mdash;above the title&mdash;and in the Featured Content area on the home page.', 'anton' ) ), 'https://codex.wordpress.org/Post_Thumbnails#Setting_a_Post_Thumbnail' ) . '</li>' .
				'<li>' . sprintf( wp_kses_post( __( 'For an in-depth tutorial, and more tips and tricks, visit the <a href="%s">Anton documentation</a>.', 'anton' ) ), 'http://engotheme.com/guides/anton/' ) . '</li>' .
			'</ul>',
	) );
}
add_action( 'admin_head-themes.php', 'anton_fnc_contextual_help' );
add_action( 'admin_head-edit.php',   'anton_fnc_contextual_help' );
