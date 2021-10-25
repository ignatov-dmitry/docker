<div class="awe-page-loading">
   <div class="awe-loading-wrapper">
      <div class="awe-loading-icon">
         <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ): ?>
            <div id="pbr-logo" class="logo">
                 <?php the_custom_logo(); ?>
            </div>
         <?php else: ?>
             <div class="logo-loading">
                 <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                      <img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
                 </a>
             </div>
         <?php endif; ?>  
      </div>
      <div class="progress">
         <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
   </div>
</div> 