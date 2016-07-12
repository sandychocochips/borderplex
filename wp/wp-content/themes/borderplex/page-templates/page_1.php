<?php
/**
 * Template Name: Custom Page
 */
get_header(); ?>


<section role="region" aria-labelledby="heading" class="pagina">
	<?php
	// Start the Loop.
	while ( have_posts() ) : the_post(); ?>

	<?php

	// check if the flexible content field has rows of data
	if( have_rows('blocks') ):

		// loop through the rows of data
		while ( have_rows('blocks') ) : the_row();

			if( get_row_layout() == 'text_image_sides' ):

				$title = get_sub_field('title');
				$text = get_sub_field('text');
				$image = get_sub_field('image'); ?>

				<section data-section="Block Text / Image Sides">
					<div class="wrap">
						<div class="col_2">
							<h3><?php echo $title; ?></h3>
							<?php echo $text; ?>
						</div>
						<?php if ( $image ) { ?>
							<div class="col_2">
								<figure class="image_qua">
									<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
								</figure>
							</div>
						<?php } ?>
					</div>
				</section>


			 <?php elseif( get_row_layout() == 'bg_image' ): 

				$background_image = get_sub_field('background_image');
				$title = get_sub_field('title');
				$text_left = get_sub_field('text_left');
				$text_right = get_sub_field('text_right');

				$background_image_array = wp_get_attachment_image_src($background_image, 'full', true);
				$background_image_url = $background_image_array[0];
				?>

				<section data-section="Block Background Image" class="img_bg"
				<?php if ($background_image) { ?>
					style="background-image: url(<?php echo $background_image_url; ?>)"
				<?php } ?>
				>
					<div class="wrap">
						<div class="col_2">
							<h3 class="white"><?php echo $title; ?></h3>
							<?php echo $text_left; ?>
						</div>
						<?php if ($text_right) { ?>
							<div class="col_2">
								<div class="p_sp">
									<?php echo $text_right; ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</section>
				<div class="green_b"></div>


			<?php elseif( get_row_layout() == 'items' ): 

				$items = get_sub_field('items'); ?>

				<section data-section="Block Items">				

				<?php if($items){

					foreach($items as $item) {
						$title = $item['title'];
						$text = $item['text'];
						$thumb = $item['thumb'];
						$size = "thumbnail";
						$url_thumb = $thumb['sizes'][ $size ];
						?>

						<div class="qua_box">
							<?php if ($thumb) { ?>
								<figure>
									<img src="<?php echo $thumb; ?>" >
								</figure>
							<?php } ?>
							<div class="q_info">
								<h4><?php echo $title; ?></h4>
								<?php echo $text; ?>
							</div>
						</div>
					<?php }
				} ?>

				</section>
				<div class="green_b"></div>

			<?php elseif( get_row_layout() == 'full_text' ): 

				$title = get_sub_field('title');
				$text = get_sub_field('text'); ?>

				<section class="gray block--gray" data-section="Block Full Text">
					<div class="col_1">
						<h3><?php echo $title; ?></h3>
						<?php echo $text; ?>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'table' ): 

				$title = get_sub_field('title');
				$table = get_sub_field('table'); ?>

				<section data-section="Block Table">
					<div class="col_1">
						<h3><?php echo $title; ?></h3>

				<?php if ( $table ) {
					echo '<div class="tabla">';
					echo '<div class="tabla_rsp">';

					if ( $tabla['header'] ) {
						echo '<div class="tabla_hd">';
						foreach ( $tabla['header'] as $th ) {
							echo '<div class="hd_tr">';
							echo $th['c'];
							echo '</div>';
						}
						echo '</div>';
					}

					foreach ( $tabla['body'] as $tr ) {
						echo '<div class="tabla_cont">';
						$index_td = 0;
						foreach ( $tr as $td ) {
							echo '<div class="cont_tr" data-titulo="' . $tabla['header'][$index_td]['c'] .'">';
							echo $td['c'];
							echo '</div>';
							$index_td++;
						}
						echo '</div>';
					}

					echo '</div>';
					echo '</div>';
				} ?>

				</div>
				</section>

			<?php elseif( get_row_layout() == 'bullets' ): 

				$title = get_sub_field('title');
				$list = get_sub_field('list'); ?>

				<section class="gray" data-section="Block Bullets">
					<div class="col_1">
						<h3><?php echo $title; ?></h3>

						<?php if($list){
							echo "<ul>";
							foreach($list as $item) {
								$list_item = $item['list_item']; ?>

								<li><?php echo $list_item; ?></li>
								
							<?php }
							echo "</ul>";
						} ?>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'triple' ): 

				$columns = get_sub_field('title');
				?>

				<section  data-section="Triple">

					<div class="wrap">

					<?php if($columns){

						foreach($columns as $column) {
							$title = $column['title'];
							$text = $column['text'];
							$thumb = $column['thumb'];
							$size = "borderplex-medium";
							$url_thumb = $thumb['sizes'][ $size ];
							?>

							<div class="col_3">
								<div class="places">
									<figure><img src="<?php echo $thumb; ?>" /></figure>
									<div class="btn">
										<div class="btn_t blue">
											<a href="#" title="<?php echo $title; ?>">LEARN MORE</a>
											<div class="btn_arrow"></div>
											<a href="#" title="<?php echo $title; ?>"> <img src="images/btn_arrow.png"/></a>
										</div>
									</div>
								</div>
							</div>
						<?php }
					} ?>

					</div>
					
				</section>

			<?php elseif( get_row_layout() == 'accordion' ): 

				$title = get_sub_field('title');
				$text = get_sub_field('text'); ?>

				<section class="acordeon" data-section="Accordion">
					<div class="gray acordeon_gray">
						<div class="wrap">
							<figure>
								<img src="<?php ruta_imagenes(); ?>icon--regionalOverview.png" />
							</figure>
							<h3><?php echo $title; ?></h3>
							<button class="acordeon_gray--btn">
								<img src="<?php ruta_imagenes(); ?>img--arrow__blanca.png" alt="">
							</button>
						</div>
					</div>
					<div class="wrap acordeon--texto">
						<div class="col_2">
							<h3><?php echo $title; ?></h3>
							<p>
								<?php echo $text; ?>
							</p>
						</div>
						<div class="col_2">
							<p class="acordeon_p">
								Vivamus enim, mi Vivamus enim, mi Vivamus enim, miVivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, miVivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, miVivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, miVivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, mi Vivamus enim, miVivamus enim,
							</p>
						</div>
					</div>
				</section>
				<!-- <div class="green_b"></div> -->

			<?php endif;

		endwhile;

	else :

	    // no layouts found

	endif;

	?>

	<?php endwhile;
	?>
</section>

<?php
get_footer();
