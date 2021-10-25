
<?php 

if ( ! is_active_sidebar( 'newsletter' ) ) {
	return;
}
?>
<div id="pbr-newsletter" class="pbr-newsletter">
	<div class="container">
		<div>
			<?php dynamic_sidebar( 'newsletter' ); ?>
		</div>
	</div>	
</div>	
 