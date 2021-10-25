<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com?>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/questions/
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );


extract( $atts );

$_id = pbrthemer_fnc_makeid();
$_count = 0;
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => $number,
	'post_status' => 'publish',
);

$query = new WP_Query($args);
?>

<div class="widget-nostyle pbr-testimonial testimonials testimonials-<?php echo esc_attr($el_class).' '.esc_attr($skin); ?>">
	<?php if($query->have_posts()){ ?>
		<?php if($title!=''){ ?>
			<h3 class="widget-title">
				<span><?php echo trim($title); ?></span>
			</h3>
		<?php } ?>
 
			<!-- Skin 1 -->
			<div id="carousel-<?php echo esc_attr($_id); ?>" class="widget-content owl-carousel-play" data-ride="owlcarousel">
					<div class="owl-carousel " data-slide="<?php echo esc_attr($columns); ?>" data-pagination="false" data-navigation="false" data-desktop="[1199,2]" data-desktopsmall="[980,1]" data-tablet="[768,1]">
					<?php  $_count=0; while($query->have_posts()):$query->the_post(); ?>
						<!-- Wrapper for slides -->
						<div class="item">
							<?php pbr_themer_get_template_part( 'vc_templates/testimonials/testimonials' ); ?>
						</div>
						<?php $_count++; ?>
					<?php endwhile; ?>
				</div>
			</div>
	<?php } ?>
</div>
<?php wp_reset_postdata(); ?>