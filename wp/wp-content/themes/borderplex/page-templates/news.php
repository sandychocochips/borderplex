<?php
/**
 * Template Name: News
 */
get_header(); ?>


<section class="gray home__news">
	<div class="wrap">
		<div class="col_2 home__news__newsArchive">
			<h3>Latest from Borderplex alliance</h3>

			<?php 
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 5,
				// 'category__not_in' => 3
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
						<a href="<?php echo get_permalink($blogPost->ID); ?>" class="btn__link">
							<div class="btn">
								<div class="btn_t green">
									<div class="btn__texto">READ MORE</div>
									<div class="btn__arrow"></div>
									<img src="<?php ruta_imagenes(); ?>btn_arrow.png"/>
								</div>
							</div>
						</a>
					</div>
				<?php wp_reset_postdata(); } ?>


			<?php } else { ?>

				<p>No Blog post</p>

			<?php } ?>
		</div>
		<div class="home__news__border"></div>
		<div class="col_2 home__news__highlights">
			<h3>Borderplex in the News</h3>

				<?php 
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 5,
						// 'cat' => 3
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
								<?php if ($image) {?>
									<figure class="highlights">
										<img
												src="<?php ruta_imagenes(); ?>blank.gif"
												data-src="<?php echo $thumb_thumb_url; ?>"
												class="lazyload home--post--imagen"
												alt="<?php echo $the_title; ?>" />
									</figure>
								<?php } ?>
								<div class="news--text">
									<p class="title"><time class=""><?php echo get_the_date('M j, Y', $blogPost->ID); ?></time> <?php echo $the_title; ?></p>
									<p><?php echo $the_excerpt; ?></p>
									<a href="<?php echo get_permalink($blogPost->ID); ?>"  class="btn__link">
										<div class="btn">
											<div class="btn_t green">
												<div class="btn__texto">READ MORE</div>
												<div class="btn__arrow"></div>
												<img src="<?php ruta_imagenes(); ?>btn_arrow.png"/>
											</div>
										</div>
									</a>
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
get_footer();
