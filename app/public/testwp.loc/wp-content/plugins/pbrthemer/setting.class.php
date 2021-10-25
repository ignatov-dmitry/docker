<?php   
class PbrThemerSetting
{
    private $tmp_posttype;
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct(){
        
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        add_action('admin_menu', array( $this, 'register_custom_menu_page' ));
        add_action( 'admin_menu', array( $this, 'add_posttype_page' ) );
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_filter( 'tgmpa_notice_action_links', array( $this, 'edit_tgmpa_notice_action_links' ) );

        if( is_dir( PBR_THEMER_IMPORT_FOLDER ) ){
            add_action('admin_menu', array( $this, 'admin_import_page'));
        }
        add_action( 'admin_menu', array( $this, 'edit_admin_menus' ), 999 ); 
        add_action( 'admin_init', array( $this, 'admin_init' ) );

    }

    public function register_custom_menu_page() {
        add_menu_page( 
            esc_html__( 'WPOPAL', 'pbrthemer' ),
            esc_html__('WPOPAL', 'pbrthemer' ),
            'manage_options',
            'wpopal_setting',
            array($this, 'pbr_menu_page'),
            plugins_url( 'pbrthemer/assets/css/logo.png' ),
            2
        );
    }

    public function edit_admin_menus() {
        global $submenu;
        if (current_user_can( 'edit_theme_options' )){
            $submenu['wpopal_setting'][0][0] = esc_attr__( 'Welcome', 'pbrthemer' );
        }
    }

    /**
     * Add Import Page Menu to Sidebar Menu in Admin Page.
     */
    public function admin_import_page() {

        add_submenu_page(
            'wpopal_setting', 
            esc_html__('Import Demos', 'pbrthemer'),
            esc_html__('Import Demos', 'pbrthemer'),
            'manage_options', 
            'pbrthemer_options_import_page',
            array('PbrThemer_Import', 'render_admin_import_page')
        );
    }

    /**
     * Add options page
     */
    public function add_posttype_page()
    { 
        // This page will be under "WPOPAL Settings"
        add_submenu_page( 
            'wpopal_setting', 
            esc_html__('Posttypes', 'pbrthemer'),
            esc_html__('Posttypes', 'pbrthemer'),
            'manage_options', 
            'pbrframework-setting-admin',
            array( $this, 'create_admin_page' )
        );
    }

    public function pbr_menu_page() {
        require_once PBR_THEMER_PLUGIN_THEMER_DIR . 'admin/welcome.php';
    }

    public function plugins_screen() {
        require_once PBR_THEMER_PLUGIN_THEMER_DIR . 'admin/plugins.php';
    }

    public function add_plugin_page(){
        global $pagenow;
        add_submenu_page( 
            'wpopal_setting',
            esc_html__('Plugins', 'pbrthemer'),
            esc_html__('Plugins', 'pbrthemer'),
            'manage_options',
            'opal-theme-plugins',
            array( $this, 'plugins_screen' )
        );

        // Redirect to Opal welcome page after activating theme.
        if (is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) && $_GET['activated'] == 'true'){

            // Add do action
            do_action( 'otf_activate' );

            // Redirect
            wp_redirect( admin_url( 'admin.php?page=wpopal_setting' ) );
        }

    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    { 
        // Set class property
        $this->options = get_option( 'pbr_themer_posttype' );
        ?>
        <div class="wrap">
        
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'pbr_postype_group' );   
                do_settings_sections( 'pbrframework-setting-admin' );
                submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init() {        

        $this->options = get_option( 'pbr_themer_posttype' );  
        register_setting(
            'pbr_postype_group', // Option group
            'pbr_themer_posttype', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            __('Post Types Settings', 'pbrthemer'), // Title
            array( $this, 'print_section_info' ), // Callback
            'pbrframework-setting-admin' // Page
        );  
             
        $filepath = PBR_THEMER_PLUGIN_THEMER_DIR.'posttypes/settings/*.php';

        $files  = glob( $filepath );
        $output = array();
        $posttypes = array(); 
        
        foreach( $files as $file ){
            $output[str_replace(".php","",basename($file))] = $file;
            $posttypes[] = str_replace(".php","",basename($file));
        }
        $posttypes = apply_filters( 'pbrthemer_load_posttype_files', $posttypes );


        foreach( $output as $posttype => $file ){
            if(in_array($posttype, $posttypes)){
                include( $file ); 
            }
        }
   
        do_action( 'pbrthemer_add_setting_field' ); 
    }   

   

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        
        foreach( $input as $key => $value ){
            $new_input[$key] = sanitize_text_field( $value );
        }
        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info(){
        print 'Enter your settings below:';
    }

    /**
     * Actions to run on initial theme activation.
     *
     * @return void
     */
    public function admin_init() {

        if (current_user_can( 'edit_theme_options' )){

            if (isset( $_GET['opal-deactivate'] ) && 'deactivate-plugin' === $_GET['opal-deactivate']){
                check_admin_referer( 'opal-deactivate', 'opal-deactivate-nonce' );

                $plugins = TGM_Plugin_Activation::$instance->plugins;

                foreach ($plugins as $plugin) {
                    if (isset( $_GET['plugin'] ) && $plugin['slug'] == $_GET['plugin']){
                        deactivate_plugins( $plugin['file_path'] );
                    }
                }
            }
            if (isset( $_GET['opal-activate'] ) && 'activate-plugin' === $_GET['opal-activate']){
                check_admin_referer( 'opal-activate', 'opal-activate-nonce' );

                $plugins = TGM_Plugin_Activation::$instance->plugins;

                foreach ($plugins as $plugin) {
                    if (isset( $_GET['plugin'] ) && $plugin['slug'] == $_GET['plugin']){
                        activate_plugin( $plugin['file_path'] );

                        wp_safe_redirect( admin_url( 'admin.php?page=opal-theme-plugins' ) );
                        exit;
                    }
                }
            }
        }
    }


    /**
     * Removes install link for Fusion Builder, if Fusion Core was not updated to 3.0
     *
     * @since 5.0.0
     *
     * @param array $action_links The action link(s) for a required plugin.
     *
     * @return array The action link(s) for a required plugin.
     */
    public function edit_tgmpa_notice_action_links($action_links) {
        $current_screen = get_current_screen();

        if ('opal-theme-plugins' == $current_screen->id){
            $link_template = '<a id="manage-plugins" class="button-primary" style="margin-top:1em;" href="#opal-install-plugins">' . esc_attr__( 'Manage Plugins Below', 'opal-theme-framework' ) . '</a>';
            $action_links  = array( 'install' => $link_template );
        } else{
            $link_template = '<a id="manage-plugins" class="button-primary" style="margin-top:1em;" href="' . esc_url( self_admin_url( 'admin.php?page=opal-theme-plugins' ) ) . '#opal-install-plugins">' . esc_attr__( 'Go Manage Plugins', 'opal-theme-framework' ) . '</a>';
            $action_links  = array( 'install' => $link_template );
        }

        return $action_links;
    }

    public function plugin_link($item) {
        $installed_plugins = get_plugins();

        $item['sanitized_plugin'] = $item['name'];

        $actions = array();

        // We have a repo plugin.
        if (!$item['version']){
            $item['version'] = TGM_Plugin_Activation::$instance->does_plugin_have_update( $item['slug'] );
        }

        $disable_class = '';
        $data_version  = '';


        // We need to display the 'Install' hover link.
        if (!isset( $installed_plugins[$item['file_path']] )){
            if (!$disable_class){
                $url = esc_url( wp_nonce_url(
                    add_query_arg(
                        array(
                            'page'          => rawurlencode( TGM_Plugin_Activation::$instance->menu ),
                            'plugin'        => rawurlencode( $item['slug'] ),
                            'plugin_name'   => rawurlencode( $item['sanitized_plugin'] ),
                            'tgmpa-install' => 'install-plugin',
                            'return_url'    => 'opal-theme-plugins',
                        ),
                        TGM_Plugin_Activation::$instance->get_tgmpa_url()
                    ),
                    'tgmpa-install',
                    'tgmpa-nonce'
                ) );
            } else{
                $url = '#';
            }
            $actions = array(
                'install' => '<a href="' . $url . '" class="button button-primary' . $disable_class . '"' . $data_version . ' title="' . sprintf( esc_attr__( 'Install %s', 'opal-theme-framework' ), $item['sanitized_plugin'] ) . '">' . esc_attr__( 'Install', 'opal-theme-framework' ) . '</a>',
            );
        } elseif (is_plugin_inactive( $item['file_path'] )){
            // We need to display the 'Activate' hover link.
            $url = esc_url( add_query_arg(
                array(
                    'plugin'              => rawurlencode( $item['slug'] ),
                    'plugin_name'         => rawurlencode( $item['sanitized_plugin'] ),
                    'opal-activate'       => 'activate-plugin',
                    'opal-activate-nonce' => wp_create_nonce( 'opal-activate' ),
                ),
                admin_url( 'admin.php?page=opal-theme-plugins' )
            ) );

            $actions = array(
                'activate' => '<a href="' . $url . '" class="button button-primary"' . $data_version . ' title="' . sprintf( esc_attr__( 'Activate %s', 'opal-theme-framework' ), $item['sanitized_plugin'] ) . '">' . esc_attr__( 'Activate', 'opal-theme-framework' ) . '</a>',
            );
        } elseif (version_compare( $installed_plugins[$item['file_path']]['Version'], $item['version'], '<' )){
            $disable_class = '';
            // We need to display the 'Update' hover link.
            $url     = wp_nonce_url(
                add_query_arg(
                    array(
                        'page'         => rawurlencode( TGM_Plugin_Activation::$instance->menu ),
                        'plugin'       => rawurlencode( $item['slug'] ),
                        'tgmpa-update' => 'update-plugin',
                        'version'      => rawurlencode( $item['version'] ),
                        'return_url'   => 'opal-theme-plugins',
                    ),
                    TGM_Plugin_Activation::$instance->get_tgmpa_url()
                ),
                'tgmpa-update',
                'tgmpa-nonce'
            );
            $actions = array(
                'update' => '<a href="' . $url . '" class="button button-primary' . $disable_class . '" title="' . sprintf( esc_attr__( 'Update %s', 'opal-theme-framework' ), $item['sanitized_plugin'] ) . '">' . esc_attr__( 'Update', 'opal-theme-framework' ) . '</a>',
            );
        } elseif (is_plugin_active( $item['file_path'] )){
            $url     = esc_url( add_query_arg(
                array(
                    'plugin'                => rawurlencode( $item['slug'] ),
                    'plugin_name'           => rawurlencode( $item['sanitized_plugin'] ),
                    'opal-deactivate'       => 'deactivate-plugin',
                    'opal-deactivate-nonce' => wp_create_nonce( 'opal-deactivate' ),
                ),
                admin_url( 'admin.php?page=opal-theme-plugins' )
            ) );
            $actions = array(
                'deactivate' => '<a href="' . $url . '" class="button button-primary" title="' . sprintf( esc_attr__( 'Deactivate %s', 'opal-theme-framework' ), $item['sanitized_plugin'] ) . '">' . esc_attr__( 'Deactivate', 'opal-theme-framework' ) . '</a>',
            );
        }

        return $actions;
    }

}

if( is_admin() )
    $my_settings_page = new PbrThemerSetting();