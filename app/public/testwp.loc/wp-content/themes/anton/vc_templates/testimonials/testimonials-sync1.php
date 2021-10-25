<?php 
	$job = get_post_meta( get_the_ID(), 'testimonials_job', true); 
	$name = get_post_meta( get_the_ID(), 'testimonials_name', true);
?>
<div class="testimonials-wrap">		
	<div class="testimonials-body">
		<div class="testimonials-quote"><?php the_content() ?></div>
		<div class="testimonials-meta">		    
		    <div class="testimonials-profile"> 
		        <h4 class="name"> <?php echo trim($name); ?></h4>
		        <span class="job"><?php echo trim($job); ?></span>
		    </div>
	    </div>
	</div>		
</div>