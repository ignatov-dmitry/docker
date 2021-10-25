<?php
    $subject = get_post_meta( get_the_ID(), 'mastor_testimonial_subject', true);
    $rating = get_post_meta( get_the_ID(), 'mastor_testimonial_rating', true);
    $job = get_post_meta( get_the_ID(), 'mastor_testimonial_job', true);
?>
<div class="testimonials-wrap">		
	<div class="testimonials-body">
		<?php if ( !empty($subject) ): ?>
            <h4><?php echo trim( $subject ); ?></h4>
        <?php endif; ?>
	    <div class="testimonials-avatar">
		    <?php the_post_thumbnail('widget');?>
		</div>
	    <div class="testimonials-profile"> 
	        <h4 class="name"> <?php the_title(); ?></h4>
	    </div>
	</div>		
</div>
