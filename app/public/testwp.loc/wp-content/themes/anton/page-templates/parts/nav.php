<nav  data-duration="<?php echo anton_fnc_theme_options('megamenu-duration',400); ?>" class="hidden-xs hidden-sm pbr-megamenu <?php echo anton_fnc_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega">
	    
    <button aria-expanded="true" data-target=".navbar-mega-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
     
    <?php
        $args = array(  
        	'theme_location' => 'primary',
            'container_class' => 'collapse navbar-collapse navbar-mega-collapse',
            'menu_class' => 'nav navbar-nav megamenu',
            'fallback_cb' => '',
            'menu_id' => 'primary-menu'
        );
        if(class_exists('PBR_bootstrap_navwalker')){
			$args['walker'] = new PBR_bootstrap_navwalker();
        }
                        
        wp_nav_menu($args);
    ?>
</nav>