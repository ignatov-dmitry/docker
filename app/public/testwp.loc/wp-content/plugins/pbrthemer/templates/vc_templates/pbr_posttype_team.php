<?php
	$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
	extract( $atts );

    $args = array(
        'post_type' => 'team',
        'posts_per_page' => $number
    );
    $loop = new WP_Query( $args );
    $count = 0;
    switch ($columns_count) {
        case '6':
            $class_column = 'col-lg-2 col-md-2 col-sm-6';
            break;
        case '4':
            $class_column='col-md-3 col-sm-6';
            break;
        case '3':
            $class_column='col-md-4 col-sm-12';
            break;
        case '2':
            $class_column='col-md-6 col-sm-6';
            break;
        default:
            $class_column='col-md-12 col-sm-12';
            break;
    }
?>
<div class="widget-nostyle">
	<div class="widget-content">
		<div class="row">
			<?php while( $loop->have_posts() ): $loop->the_post();
                $job =  get_post_meta( get_the_ID(), 'team_job', true );
                $class_col = ($count++%$columns_count==0)? 'first-row' : '';
			?>
			<div class="<?php echo esc_attr($class_column).' '.esc_attr($class_col);?>">
				<div class="team-v1">
				    <div class="team-header">
				      <a href="<?php echo esc_url( get_permalink() );?>" title="<?php the_title();?>"><?php the_post_thumbnail('widget', '', 'class="radius-x"');?> </a>
				    </div>     
				    <div class="team-body">
				        <div class="team-body-content">
				          <h3 class="team-name"><a href="<?php echo esc_url( get_permalink() );?>"><?php the_title(); ?></a></h3>
				            <p><?php echo esc_html( $job ); ?></p>
				        </div>
				    </div>
				</div>
			</div>	
			<?php endwhile; ?>
		</div>	
	</div>
</div>	
<?php wp_reset_postdata();