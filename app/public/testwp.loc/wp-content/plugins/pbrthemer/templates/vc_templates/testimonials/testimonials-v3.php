<?php $job = get_post_meta( get_the_ID(), 'mastor_testimonial_job', true); ?>
<div class="testimonials-body">
    <div class="testimonials-description"><?php echo wp_trim_words(get_the_content(), 25, '...') ?></div>
    <div class="flex">
         <p class="name"><?php the_title(); ?> </p> |
        <?php if(!empty($job) ): ?>
            <p class="job"><?php echo trim($job); ?></p>
        <?php endif; ?>
    </div>

</div>