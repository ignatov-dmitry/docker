<?php
    $subject = get_post_meta( get_the_ID(), 'mastor_testimonial_subject', true);
    $rating = get_post_meta( get_the_ID(), 'mastor_testimonial_rating', true);
    $job = get_post_meta( get_the_ID(), 'mastor_testimonial_job', true);
?>
<div class="testimonials-v6">
    <div class="testimonials-body">
        <?php if ( !empty($subject) ): ?>
            <h3><?php echo trim( $subject ); ?></h3>
        <?php endif; ?>
        <p class="testimonials-description"><?php the_content() ?></p>                            
        <ul class="testimonials-avatar list-unstyled">
            <li class="active">
                 <div class="radius-x"><?php the_post_thumbnail('widget', '', 'class="radius-x"');?></div>
            </li>                       
        </ul>
        <?php echo trim( $rating ); ?>
        <h5 class="testimonials-name">
            <?php the_title(); ?>
        </h5>
        <?php if(!empty( $job)): ?>  
            <p class="text-muted testimonials-position"><?php echo trim($job); ?></p>
        <?php endif; ?>  
    </div>                      
</div>