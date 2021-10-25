<?php $job = get_post_meta( get_the_ID(), 'mastor_testimonial_job', true); ?>
<div class="testimonials-body">
    <div class="testimonials-description"><?php the_content() ?></div>                
    <div class="testimonials-avatar radius-x">
        <a href="#"><?php the_post_thumbnail('widget', '', 'class="radius-x"');?></a>
    </div>
    <div class="testimonials-meta">
	    <h5 class="testimonials-name">
	         <?php the_title(); ?>
	    </h5>  
	    <?php if(!empty($job) ): ?>
        	<div class="job"><?php echo trim($job); ?></div>
    	<?php endif; ?>  
    </div>            
</div>