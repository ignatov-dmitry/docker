<?php 

get_header(); ?>

		<section class="btErrorPage gutter" style = "background-image: url(<?php echo esc_url_raw( get_parent_theme_file_uri( 'gfx/plug.png' ) ) ;?>)">
			<div class="port">
				
				<?php echo boldthemes_get_heading_html( 
					array ( 
						'superheadline' => esc_html__( 'We are sorry, page not found.', 'ippsum' ), 
						'headline' => esc_html__( 'Error 404.', 'ippsum' ),
						'size' => 'huge'
						) 
					)
				?>

				<div class="bt_bb_separator bt_bb_bottom_spacing_normal bt_bb_border_style_none"></div>

				<?php
					echo boldthemes_get_button_html( 
						array (
							'url' => home_url( '/' ), 
							'text' => esc_html__( 'BACK TO HOME', 'ippsum' ), 
							'style' => 'filled',
							'color_scheme' => 'dark-accent-skin',
							'size' => 'medium'
						)
					);
				?>

			</div>
		</section>

<?php get_footer();