<?php
class Pbrthemer_Shortcode_Base extends WPBakeryShortCode {
    public function __construct( $settings ){
        parent::__construct($settings);
        if( !file_exists( get_template_directory().'/vc_templates/'.$this->settings['base'] ) ){
            $this->html_template = PBR_THEMER_PLUGIN_THEMER_DIR.'templates/vc_templates/'.$this->settings['base'].'.php';
        }
    }
}