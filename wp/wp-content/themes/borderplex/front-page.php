<?php get_header(); ?>

<section class="home--slider">
	<div class="js--home--carrusel">
	<?php
		$args = array(
			'post_type' => 'slider'
		);
		$slides = get_posts($args);
		?>
		<?php if (count($slides) > 0) { ?>
			<?php foreach ($slides as $slide) {
				setup_postdata($slide);
				$el_titulo = $slide->post_title;
				$text = get_field("text" , $slide->ID);
				$image = get_field("image" , $slide->ID);
				$link = get_field("link" , $slide->ID);
				?>

			<article class="slider">
				<figure>
					<picture>
						<?php
							$thumb_large_url_array = wp_get_attachment_image_src($image, 'borderplex-slider', true);
							$thumb_medium_url_array = wp_get_attachment_image_src($image, 'borderplex-medium', true);
							$thumb_thumb_url_array = wp_get_attachment_image_src($image, 'thumbnail-size', true);
							$thumb_large_url = $thumb_large_url_array[0];
							$thumb_medium_url = $thumb_medium_url_array[0];
							$thumb_thumb_url = $thumb_thumb_url_array[0];
						?>
						<source
								data-srcset="<?php echo $thumb_large_url; ?>"
								media="(min-width: 800)" />
						<source
							data-srcset="<?php echo $thumb_medium_url; ?>"
							media="(min-width: 500px)" />

						<img
							src="<?php ruta_imagenes();?>blank.gif"
							data-src="<?php echo $thumb_thumb_url; ?>"
							class="lazyload"
							alt="<?php echo $el_titulo; ?>" />
					</picture>
				</figure>

				<div class="slider_caption">
					<?php
					if ($text) { ?>
						<?php echo $text; ?>
					<?php }
					?>
					<div class="btn">
						<div class="btn_t yellow">
							<a href="<?php echo $link; ?>">LEARN MORE</a>
							<div class="btn_arrow"></div>
							<a href="<?php echo $link; ?>"> <img src="<?php ruta_imagenes(); ?>btn_arrow.png"/></a>
						</div>
					</div>
				</div>
			</article>

			<?php wp_reset_postdata(); } ?>
		<?php } else { ?>
			No slides
		<?php } ?>
	</div>

	<div class="green_b"></div>
</section>

<section>
	<div class="col_2">
		<h3>What is Borderplex Alliance?</h3>
		<?php
		$w_borderplex = get_field("w_borderplex", 'option');
		if ( $w_borderplex ) {
			echo $w_borderplex;
		}
		?>
		
	</div>
	<div class="col_2">
		<figure class="map">
			<img src="<?php ruta_imagenes(); ?>home_alliance.png" />
		</figure>
	</div>
</section>

<div class="green_b"></div>

<section>
	<div class="wrap">
		<div class="col_2">
			<div class="services_home">
				<?php
				$b_industries = get_field("b_industries", 'option');
				if ( $b_industries ) {
					$b_industries_array = wp_get_attachment_image_src($b_industries, 'borderplex-medium', true);
					$b_industries_url = $b_industries_array[0];
					?>
					<figure>
						<img src="<?php echo $b_industries_url; ?>" />
					</figure>
				<?php }
				?>
				<div class="btn">
					<div class="btn_t yellow">
						<a>LEARN MORE</a>
						<div class="btn_arrow"></div>
						<a> <img src="<?php ruta_imagenes(); ?>btn_arrow.png"/></a>
					</div>
				</div>
			</div>
		</div>
		<div class="col_2">
			<div class="services_home">
				<?php
				$b_initiatives = get_field("b_initiatives", 'option');
				if ( $b_initiatives ) {
					$b_initiatives_array = wp_get_attachment_image_src($b_initiatives, 'borderplex-medium', true);
					$b_initiatives_url = $b_initiatives_array[0];
					?>
					<figure>
						<img src="<?php echo $b_initiatives_url; ?>" />
					</figure>
				<?php }
				?>
				<div class="btn">
					<div class="btn_t yellow">
						<a>LEARN MORE</a>
						<div class="btn_arrow"></div>
						<a> <img src="<?php ruta_imagenes(); ?>btn_arrow.png"/></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="gray">
	<div class="wrap">
		<div class="col_2">
			<div class="news_box">
				<h3>News</h3>

				<?php 
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 2,
						'category__not_in' => 3
					);
					$blogPosts = get_posts($args);

					?>
					<?php if (count($blogPosts) > 0) { ?>

						<?php foreach ($blogPosts as $blogPost) { 
							setup_postdata($blogPost);

							$the_title = $blogPost->post_title;
							$the_excerpt = $blogPost->post_excerpt;
							?>

							<div class="news">
								<p class="title"><time class=""><?php echo get_the_date('M j, Y', $blogPost->ID); ?></time> <?php echo $the_title; ?></p>
								<p><?php echo $the_excerpt; ?></p>
								<div class="btn">
									<div class="btn_t green">
										<a href="<?php echo get_permalink($blogPost->ID); ?>">READ MORE</a>
										<div class="btn_arrow"></div>
										<a href="<?php echo get_permalink($blogPost->ID); ?>"> <img src="<?php ruta_imagenes(); ?>btn_arrow.png"/></a>
									</div>
								</div>
							</div>
						<?php wp_reset_postdata(); } ?>


					<?php } else { ?>

						<p>No Blog post</p>

					<?php } ?>

			</div>
		</div>
		<div class="col_2">
			<h3>Highlights</h3>

				<?php 
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 2,
						'cat' => 3
					);
					$blogPosts = get_posts($args);

					?>
					<?php if (count($blogPosts) > 0) { ?>

						<?php foreach ($blogPosts as $blogPost) { 
							setup_postdata($blogPost);

							$the_title = $blogPost->post_title;
							$the_excerpt = $blogPost->post_excerpt;
							$image = get_post_thumbnail_id($blogPost->ID);

							$thumb_thumb_url_array = wp_get_attachment_image_src($image, 'post-thumbnails', true);
							$thumb_thumb_url = $thumb_thumb_url_array[0];

							?>

							<div class="news news__highlights">
								<figure class="highlights">
									<img
											src="<?php ruta_imagenes(); ?>blank.gif"
											data-src="<?php echo $thumb_thumb_url; ?>"
											class="lazyload home--post--imagen"
											alt="<?php echo $the_title; ?>" />
								</figure>
								<div class="news--text">
									<p class="title"><time class=""><?php echo get_the_date('M j, Y', $blogPost->ID); ?></time> <?php echo $the_title; ?></p>
									<p><?php echo $the_excerpt; ?></p>
									<div class="btn">
										<div class="btn_t green">
											<a href="<?php echo get_permalink($blogPost->ID); ?>">READ MORE</a>
											<div class="btn_arrow"></div>
											<a href="<?php echo get_permalink($blogPost->ID); ?>"> <img src="<?php ruta_imagenes(); ?>btn_arrow.png"/></a>
										</div>
									</div>
								</div>
							</div>

						<?php wp_reset_postdata(); } ?>


					<?php } else { ?>

						<p>No Blog post</p>

					<?php } ?>
		</div>
	</div>
</section>

<?php
// get_sidebar();
get_footer(); ?>