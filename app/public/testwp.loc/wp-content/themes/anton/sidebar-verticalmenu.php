<div id="pbr-off-vertical" class="sidebar-vertical"> 
    <div class="pbr-off-vertical-body">
        <div class="vertical-head">
            <button type="button" class="btn btn-close btn-toggle-vertical" data-toggle="vertical">
                <i class="fa fa-close"></i> 
            </button>
            <span><?php esc_html_e( 'Menu', 'anton' ); ?></span>
        </div>
        <nav class="navbar navbar-vertical navbar-static">
            <?php
            $args = array(  
                'theme_location' => 'verticalmenu',
                'container_class' => 'navbar-collapse navbar-vertical-collapse',
                'menu_class' => 'nav navbar-nav',
                'fallback_cb' => '',
                'menu_id'         => 'main-menu-vertical'
            );
            if(class_exists('PBR_Megamenu_Offcanvas')){
                $args['walker'] = new PBR_Megamenu_Offcanvas();
            }
            wp_nav_menu($args);
            ?>
        </nav>
    </div>
</div>