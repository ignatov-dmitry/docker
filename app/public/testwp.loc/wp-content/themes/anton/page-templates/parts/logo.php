<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): ?>
	<div class="logo">
        <?php the_custom_logo(); ?>
	</div>
<?php else: ?>
	<?php $header = apply_filters( 'anton_fnc_get_header_layout', null ); ?>
    <div class="logo logo-theme">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo get_template_directory_uri() . '/images/logo'.$header.'.png'; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
        </a>
    </div>
<?php endif; ?>