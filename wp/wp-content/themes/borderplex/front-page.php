<?php get_header(); ?>

<section role="region" aria-labelledby="heading" class="archivo">

	<?php
		$args = array(
			'post_type' => 'proyecto'
		);
		$proyectos = get_posts($args);
		$contador = 0;
	?>
	<?php if (count($proyectos) > 0) { ?>
		<?php foreach ($proyectos as $proyecto) { $contador++; setup_postdata($proyecto);
			$el_titulo = $proyecto->post_title;
			$el_excerpt = $proyecto->post_excerpt;
			?>

		<article class="articulo">

			<header class="articulo--header">
				<a href="<?php echo get_permalink($proyecto->ID); ?>">
					<h2>
						<?php echo $el_titulo; ?>
					</h2>
				</a>
			</header>

			<div class="articulo--content">

				<figure id="fig1" role="group" aria-labelledby="caption">
					<picture>
						<?php
							$thumb_id = get_post_thumbnail_id();
							$thumb_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
							$thumb_medium_url_array = wp_get_attachment_image_src($thumb_id, 'tema-mitad', true);
							$thumb_large_url_array = wp_get_attachment_image_src($thumb_id, 'tema-full', true);
							$thumb_thumb_url = $thumb_thumb_url_array[0];
							$thumb_medium_url = $thumb_medium_url_array[0];
							$thumb_large_url = $thumb_large_url_array[0];
						?>
						<source srcset="<?php echo $thumb_large_url; ?>" media="(min-width: 1000px)">
						<source srcset="<?php echo $thumb_medium_url; ?>" media="(min-width: 800px)">
						<img srcset="<?php echo $thumb_thumb_url; ?>" alt="<?php echo $el_titulo; ?>">
					</picture>
					<figcaption id="caption"><?php echo $el_titulo; ?></figcaption>
				</figure>

				<?php echo $el_excerpt; ?>
			</div>

			<footer class="articulo--footer">
			</footer>

		</article>


		<div class="proyecto_box<?=($contador==1) ? ' long' : '';?>">
			<div class="titulo_proyecto">
				<a href="<?php echo get_permalink($proyecto->ID); ?>"><?php echo $proyecto->post_title; ?></a>
			</div>
			<div class="detalle_proyecto">
				<a href="<?php echo get_permalink($proyecto->ID); ?>"><?php echo $proyecto->post_excerpt; ?></a>
			</div>
			<figure>
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($proyecto->ID) ); ?>" alt="proyecto<?php echo $contador; ?>"/>
				<div class="fondo js-fondo"></div>
			</figure>
		</div>
		<?php wp_reset_postdata(); } ?>
	<?php } else { ?>
		
	<?php } ?>
</section>



<?php
// get_sidebar();
get_footer(); ?>