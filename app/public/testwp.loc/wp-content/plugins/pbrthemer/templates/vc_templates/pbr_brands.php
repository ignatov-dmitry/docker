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
$args = array(
	'post_type' => 'brands',
	'posts_per_page'=> $number
);
$loop = new WP_Query($args);
$col = floor(12/$columns_count);
if ( $loop->have_posts() ) :
	$_count = 1; 
?>
	<div class="widget widget-brand-logo<?php echo (($el_class!='')?' '.$el_class:''); ?>">
		<?php if(!empty($title)){ ?>
			<h4 class="widget-title-v2 text-center">
				<span><?php echo trim($title); ?></span>
				<?php if(trim($descript)!=''){ ?>
		            <span class="widget-desc">
		                <?php echo trim($descript); ?>
		            </span>
		        <?php } ?>
			</h4>
		<?php } ?>

		<?php if('grid' === $style): ?>
			<div class="row grid-layout">
				<?php while ( $loop->have_posts() ) : $loop->the_post();  ?>
						<div class="<?php echo ($_count%$columns==0)? 'first' :'' ;?> col-lg-<?php echo esc_attr($col); ?> col-md-<?php echo esc_attr($col); ?> col-sm-6 col-xs-6">
							<?php
								$link = get_post_meta(get_the_ID(),'brands_brank_link',true);
								$link = $link ? $link : '#';
							?>
					 		<?php if ( has_post_thumbnail() ): ?>
						 		<a href="<?php echo esc_url($link); ?>" class="item-brand text-center" title="<?php the_title(); ?>">
									<?php the_post_thumbnail( 'brand-logo' ); ?>
								</a>
							<?php endif ; ?>
						</div>
						<?php $_count++; ?>
			<?php endwhile; ?>
			</div>
		<?php else: ?>

			<div class="widget-content">
				<div class="widget-brands-inner owl-carousel-play" id="productcarouse-<?php echo esc_attr($_id); ?>" data-ride="carousel">
					<?php if( $loop->post_count > $columns_count ){ ?>
					<div class="carousel-controls">
						<a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="prev" class="left carousel-control carousel-xs">
							<i class="fa fa-chevron-left"></i>
						</a>
						<a href="#productcarouse-<?php echo esc_attr($_id); ?>" data-slide="next" class="right carousel-control carousel-xs">
							<i class="fa fa-chevron-right"></i>
						</a>
					</div>
					<?php } ?>
					<div class="owl-carousel" data-slide="<?php echo esc_attr($columns_count);?>"  data-singleItem="true" data-navigation="true" data-pagination="false">
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php   echo '<div class="item">'; ?>
							<?php
								$link = get_post_meta(get_the_ID(),'brands_brank_link',true);
								$link = $link ? $link : '#';
							?>
							<!-- Product Item -->
							<div class="item-brand text-center">
								<a href="<?php echo esc_url($link); ?>" target="_blank">
									<?php the_post_thumbnail( 'brand-logo' ); ?>
								</a>
							</div>
							<!-- End Product Item -->

						<?php  echo '</div>'; ?>
						<?php $_count++; ?>
					<?php endwhile; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>