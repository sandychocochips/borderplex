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

				<section class="page__blockText" data-section="Block Text / Image Sides">
					<div class="wrap">
						<div class="col_1 page__blockText__content">
							<?php if ( $image ) { ?>
								<div class="col_2">
									<figure class="image_qua">
										<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
									</figure>
								</div>
							<?php } ?>
							<h3><?php echo $title; ?></h3>
							<?php echo $text; ?>
						</div>
					</div>
				</section>

			<?php elseif( get_row_layout() == 'bg_image' ): 

				$background_image = get_sub_field('background_image');
				$title = get_sub_field('title');
				$text_left = get_sub_field('text_left');
				$text_right = get_sub_field('text_right');

				$background_image_array = wp_get_attachment_image_src($background_image, 'borderplex-slider', true);
				$background_image_url = $background_image_array[0];
				?>

				<section data-section="Block Background Image" class="img_bg">
					<div class="wrap">
						<div class="col_2">
							<?php if ( $title ) { ?>
								<h3 class="white"><?php echo $title; ?></h3>
							<?php } ?>
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
					<div class="">
						<figure>
							<img src="<?php echo $background_image_url; ?>" alt="<?php echo $title; ?>" />
						</figure>
					</div>
				</section>
				<div class="green_b"></div>

			<?php elseif( get_row_layout() == 'items' ): 

				$items = get_sub_field('items'); ?>

				<section data-section="Block Items" class="wrap">
					<?php if($items){

						foreach($items as $item) {
							$title = $item['title'];
							$text = $item['text'];
							$image = $item['thumb'];
							$size = 'borderplex-medium';
							$thumb = $image['sizes'][ $size ];
							?>

							<div class="qua_box wrap">
								<?php if ($thumb) { ?>
									<figure>
										<img src="<?php echo $thumb; ?>" >
									</figure>
								<?php } ?>
								<div class="q_info">
									<h4><?php echo $title; ?></h4>
									<div class="page__blockItems__content">
										<?php echo $text; ?>
									</div>
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

			<?php elseif( get_row_layout() == 'block_table' ): 

				$title = get_sub_field('title');
				$table = get_sub_field('table'); ?>

				<section data-section="Block Table">
					<div class="col_1">
						<h3><?php echo $title; ?></h3>

				<?php if ( $table ) {
					echo '<table>';

					if ( $table['header'] ) {
						echo '<thead class="tabla_rsp">';
						echo '<tr class="tabla_hd">';
						foreach ( $table['header'] as $th ) {
							echo '<td class="hd_tr">';
							echo $th['c'];
							echo '</td>';
						}
						echo '</tr>';
						echo '</thead>';
					}

					echo '<tbody class="tabla_body">';

					foreach ( $table['body'] as $tr ) {
						echo '<tr class="tabla_cont">';
						$index_td = 0;
						foreach ( $tr as $td ) {
							echo '<td class="cont_tr" data-titulo="' . $table['header'][$index_td]['c'] .'">';
							echo $td['c'];
							echo '</td>';
							$index_td++;
						}
						echo '</tr>';
					}

					echo '</tbody>';
					echo '</table>';
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

				$icon = get_sub_field('icon');
				$title = get_sub_field('title');
				$text = get_sub_field('text');
				$text_right = get_sub_field('text_right');
				$full_imagen = get_sub_field('full_imagen');
				$two_columns_text = get_sub_field('two_columns_text');
				
				?>

				<section class="acordeon js--acordeon" data-section="Accordion">
					<div class="gray acordeon_gray">
						<div class="wrap">
							<figure>
								<img src="<?php echo $icon; ?>" />
							</figure>
							<h3><?php echo $title; ?></h3>
							<button class="acordeon_gray--btn">
								<img src="<?php ruta_imagenes(); ?>img--arrow__blanca.png" alt="">
							</button>
						</div>
					</div>
					<div class="wrap acordeon--texto">
						<?php if ( $text && !$text_right ) { ?>
							<div class="col_1">
								<?php echo $text; ?>
							</div>
						<?php } else if ( $text && $text_right ) { ?>
							<div class="col_2">
								<h3><?php echo $title; ?></h3>
								<?php echo $text; ?>
							</div>
							<div class="col_2">
								<?php echo $text_right; ?>
							</div>
						<?php } ?>
						<?php if($two_columns_text){
							echo "<div class='col_1 wrap page__twoCols__content'>";
							foreach($two_columns_text as $col) {
								$text_left = $col['text_left'];
								$text_right = $col['text_right'];
								?>

								<div class="col_2">
									<?php echo $text_left; ?>
								</div>
								<div class="col_2">
									<?php echo $text_right; ?>
								</div>
								
							<?php }
							echo "</div>";
						} ?>
						<?php if ( $full_imagen ) { ?>
							<figure class="page__twoCols__figure">
								<img src="<?php echo $full_imagen; ?>" >
							</figure>
						<?php } ?>
					</div>
				</section>
				<!-- <div class="green_b"></div> -->

			<?php elseif( get_row_layout() == 'two_columns' ): 

				$title = get_sub_field('title');
				$text_left = get_sub_field('text_left');
				$text_right = get_sub_field('text_right');
				?>

				<section data-section="Block Two columns">
					<div class="wrap">
						<div class="col_2">
							<h3><?php echo $title; ?></h3>
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

			<?php elseif( get_row_layout() == 'block_biography' ): 

				$biographies = get_sub_field('biographies'); ?>

				<section data-section="Block Biography" class="wrap">
					<?php if($biographies){

						foreach($biographies as $bio) {
							$name = $bio['name'];
							$text = $bio['text'];
							$image = $bio['image'];
							$contact = $bio['contact'];
							$more = $bio['more'];
							$title = $bio['title'];
							?>

							<div class="qua_box qua_box--bio wrap">
								<?php if ($image) { ?>
									<figure>
										<img src="<?php echo $image; ?>" >
									</figure>
								<?php } ?>
								<div class="q_info">
									<h4><?php echo $name; ?></h4>
									<?php if ($title) { ?>
										<h5 class="qua_box__title"><?php echo $title; ?></h5>
									<?php } ?>
									<?php echo $text; ?>
									<?php if ($more) { ?>
										<button class="bio__moreBtn js--bio__moreBtn" data-estado="oculto">
											<span>Read More</span> <img src="<?php ruta_imagenes(); ?>btn_arrow_down.png"/>
										</button>
										<div class="biography__more js--bio__more">
											<?php echo $more; ?>
										</div>
									<?php } ?>
									<?php if ($contact) { ?>
										<a href="mailto:<?php echo $contact; ?>" class="btn__link">
											<div class="btn">
												<div class="btn_t yellow">
													<div class="btn__texto">Send Email</div>
													<div class="btn__arrow"></div>
													<img src="<?php ruta_imagenes(); ?>btn_arrow.png"/>
												</div>
											</div>
										</a>
									<?php } ?>
								</div>
							</div>
						<?php }
					} ?>

			<?php elseif( get_row_layout() == 'block_image' ): 

				$imagen = get_sub_field('imagen');
				?>

				<section data-section="Block Image" class="page__blockImage__content">
					<figure>
							<img src="<?php echo $imagen; ?>" alt="<?php echo $title; ?>" />
						</figure>
				</section>

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
