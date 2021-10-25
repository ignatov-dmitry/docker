<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <help@engotheme.com, info@engotheme.com>
 * @copyright  Copyright (C) 2015 engotheme.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.engotheme.com
 * @support  https://engotheme.com/
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );


extract( $atts );

$_id = anton_fnc_makeid();
$_count = 0;
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => $number,
	'post_status' => 'publish',
);

$query = new WP_Query($args);
?>

<div class="widget testimonials <?php echo esc_attr($el_class); ?>">
	<?php if($title!=''){ ?>
		<h3 class="widget-title">
			<span><?php echo esc_attr($title); ?></span>
		</h3>
	<?php } ?>
 
		<div id="carousel-thumnail-<?php echo esc_attr($_id); ?>" class="widget-content sync2-owl" data-ride="owlcarousel">
			<div id="sync2" class="owl-carousel" data-slide="<?php echo esc_attr($columns); ?>" data-pagination="false" data-navigation="false" data-desktopsmall="[980,3]" data-tablet="[768,2]" data-mobile="[479, 2]">
			<?php if($query->have_posts()){ ?>
				<?php while($query->have_posts()): $query->the_post(); ?>
						<?php  get_template_part( 'vc_templates/testimonials/testimonials', 'sync2' ); ?>
				<?php endwhile; ?>
			</div>
			<?php } ?>
			<div id="sync1" class="owl-carousel" data-pagination="false" data-navigation="false" >
				<?php if($query->have_posts()){ ?>
					<?php while($query->have_posts()): $query->the_post(); ?>

							<?php  get_template_part( 'vc_templates/testimonials/testimonials', 'sync1' ); ?>
					<?php endwhile; ?>
				<?php } ?>
			</div>
		</div>
	
</div>
<?php wp_reset_postdata(); ?>