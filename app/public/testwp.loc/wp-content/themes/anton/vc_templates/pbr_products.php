<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     ENGOTHEME Team <help@engotheme.com, info@engotheme.com>
 * @copyright  Copyright (C) 2015 engotheme.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.engotheme.com
 * @support  https://engotheme.com/
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );



switch ($columns_count) {

	case '6': 
		$class_column = 'col-lg-2 col-md-4 col-sm-6 col-xs-12';
		break;

	case '4':
		$class_column='col-md-3 col-sm-6';
		break;

	case '5':
		$class_column='col-lg-5 col-sm-6 col-xs-12';
		break;
		
	case '3':
		$class_column='col-md-4 col-sm-4';
		break;

	case '2':
		$class_column='col-md-6 col-sm-6';
		break;
		
	default:
		$class_column='col-md-12 col-sm-12';
		break;
}

if($type=='') return;


global $woocommerce;

$_id = anton_fnc_makeid();
$_count = 1;

if(  strtolower($term_id) == 'none' ){
	$term_id = null;
}

$link = vc_build_link($link_button);

$loop = anton_fnc_woocommerce_query( $type, $number, $term_id );

echo "<div class='widget widget-".esc_attr($style) . " widget-products".((!empty($el_class))?" ".$el_class:'')."'>";

if($title!=''){ ?>
	<div class="widget-text-heading ">
		<h3 class="widget-title">
	      <span class="visual-title"><?php echo esc_attr( $title ); ?></span>
		</h3>
		<?php if( isset($subtitle) && $subtitle ){ ?><span class="subtitle"><?php echo esc_html($subtitle); ?></span> <?php } ?>
	</div>
<?php }

if ( $loop->have_posts() ) : ?>
	<div class="widget-content">
		<div class="<?php echo esc_attr( $style ); ?>-wrapper">
			<?php wc_get_template( 'widget-products/'.$style.'.php' , array( 'loop'=>$loop,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$number ) ); ?>
		</div>

		<?php if (!empty(trim($text_button)) && !empty(trim($link['url']))): ?>
			<div class="button-links">
				<a class="btn-theme" href="<?php echo esc_url($link['url']); ?>">
	                <?php echo esc_attr($text_button); ?>
	            </a>
			</div>	            
        <?php endif; ?>
	</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php echo "</div>" ?>
