<header id="header_mobile" class="header-mobile hidden-lg hidden-md no-space-row">
    <div class="header-top row">
        <div class="pbr-mainmenu col-sm-4 col-xs-4">
            <button data-toggle="offcanvas" class="btn btn-offcanvas btn-toggle-canvas offcanvas" type="button">
               <i class="icon-bars"></i>
            </button>
        </div>
        <div class="search_cart col-sm-8 col-xs-8">
            <div id="acount_user" class="acount-user">
                <?php if( is_user_logged_in() ){ ?>
                    <?php $current_user = wp_get_current_user(); ?>
                    <div class="user-out">
                        <span class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            <i class="icon-users"></i> <span><?php echo esc_html( $current_user->display_name); ?></span>
                        </span>
                        <div class="dropdown-menu">
                            <?php
                                $args = array(
                                    'theme_location'  => 'tpaccount',
                                    'menu_class'      => 'tp_account',
                                    'fallback_cb'     => '',
                                    'menu_id'         => ''
                                );
                                wp_nav_menu($args);
                            ?>    
                            <li><a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>"><?php esc_html_e( 'Logout', 'anton' ); ?></a></li>                     
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="user-login">
                        <span class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
                            <i class="icon-users"></i> 
                        </span>
                        <?php do_action('opal-account-buttons'); ?>                              
                    </div>
                <?php } ?>
            </div>
            
            

            <?php do_action( "anton_template_header_right" ); ?>

            <div id="vertical_menu" class="vertical_menu hidden-sm hidden-xs">
                <div class="icon-bars"></div>
            </div>
        </div>
    </div>
    <div class="logo-mobile text-center padding-30">
        <?php get_template_part( 'page-templates/parts/logo' ); ?>
    </div>
</header><!-- /header -->