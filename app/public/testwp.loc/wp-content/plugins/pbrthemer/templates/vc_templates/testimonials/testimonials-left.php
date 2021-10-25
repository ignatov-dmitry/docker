<?php 
$job = get_post_meta( get_the_ID(), 'mastor_testimonial_job', true); 
$rating = get_post_meta( get_the_ID(), 'mastor_testimonial_rating', true);
?>
<div class="testimonials-left">
    <div class="testimonials-body">
        <div class="testimonials-profile">
            <div class="profile-group pull-left">
                <div class="testimonials-avatar radius-x">
                    <?php the_post_thumbnail('widget', '', 'class="radius-x"');?>
                </div> 
                <h4 class="name"> <?php the_title(); ?></h4>
                <?php if(!empty( $job)): ?>
                    <div class="job"><?php echo trim($job); ?></div>
                <?php endif; ?>
            </div>
            <div class="pull-right rating rating_<?php echo esc_attr( $rating ); ?>"></div>
        </div> 
        <div class="clearfix"></div>
        <div class="testimonials-quote"><?php the_content() ?></div>                   
    </div>
</div>