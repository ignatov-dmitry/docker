<?php
/**
 * The Header for our theme: Top has Logo left + search right . Below is horizal main menu
 *
 * Displays all of the <head> div and everything up till <div id="main">
 *
 * @package ENGOTHEME
 * @subpackage Anton
 * @since Anton 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site"><div class="pbr-page-inner row-offcanvas row-offcanvas-left">
	<header id="pbr-masthead" class="pbr-header-v2" role="banner">		
		<?php do_action( 'anton_template_header_before' ); ?>
		<div class="container">
			<div class="header-top">
				<?php if ( is_active_sidebar( 'text-header' ) ) : ?>
                    <div class="text-header" >
                        <?php dynamic_sidebar('text-header'); ?>
                    </div>
                <?php endif; ?>

                <?php if (function_exists('pbr_themer_get_template_part')) { ?>
				<div id="acount-user">
					<?php if( is_user_logged_in() ){ 
						$current_user = wp_get_current_user();
						?>
	                    <div class="user-out">
	                        <span class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
	                            <i class="pe-7s-user"></i>
	                            <span><?php echo esc_html( $current_user->display_name); ?></span>
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
	                            <a href="<?php echo esc_url(wp_logout_url( home_url() )); ?>"><?php esc_html_e( 'Logout', 'anton' ); ?></a>                   
	                        </div>
	                    </div>
	                <?php } else { ?>
	                    <div class="user-login">
	                        <span class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">
	                            <i class="pe-7s-user"></i> 
	                        </span>
	                        <?php do_action('opal-account-buttons'); ?>	                        	
	                    </div>
	                <?php } ?>
				</div>
				<?php } ?>
				
			</div>
			<div class="header-wrapper-inner no-space-row clearfix">	
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 text-center">
					<?php get_template_part( 'page-templates/parts/logo' ); ?>
				</div>
				<div id="pbr-mainmenu" class="pbr_mainmenu_v2 col-lg-8 col-md-8">
					<div class="inner navbar-mega-simple navbar-mega-large"><?php get_template_part( 'page-templates/parts/nav' ); ?></div>
				</div>
				<div class="pbr-mainmenu-mobile hidden-lg hidden-md col-sm-4 col-xs-4">
		            <button data-toggle="offcanvas" class="btn btn-offcanvas btn-toggle-canvas offcanvas" type="button">
		               <i class="icon-bars"></i>
		            </button>
		        </div>
				<div class="col-lg-2 col-md-2 col-sm-8 col-xs-8">
					<div class="search_cart">	
						<div id="search_popup" class="search-popup search_modal">
			                <a href="#" class="tp_btn_search" data-toggle="modal" data-target="#myModal">
			                    <span class="pe-7s-search"></span>
			                </a>
			                <div id="myModal" class="modal fade" role="dialog">
			                    <div class="modal-dialog modal-lg">
			                        <div class="modal-content">
			                            <button type="button" class="close" data-dismiss="modal">&times;</button>
			                            <?php get_search_form(); ?>
			                        </div>                                
			                    </div>
			                </div>
			            </div>

		                <?php do_action( "anton_template_header_right" ); ?>
						
						<?php if ( has_nav_menu( 'verticalmenu' ) ) { ?>
						<div id="vertical_menu" class="vertical_menu hidden-sm hidden-xs">
							<button data-toggle="vertical" class="btn btn-vertical btn-toggle-vertical" type="button">
				               <i class="icon-bars"></i>
				            </button>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>			
		</div>	
	</header><!-- #masthead -->

	<?php do_action( 'anton_template_header_after' ); ?>
	
	<div id="main" class="site-main">