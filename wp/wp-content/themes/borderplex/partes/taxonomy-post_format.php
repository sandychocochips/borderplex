<?php get_header(); ?>

<section role="region" aria-labelledby="heading" class="archivo">
	<?php if ( have_posts() ) : ?>

	<header class="pagina--header">
		<h1>
		<?php
			if ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'tema' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'tema' );

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'tema' );

			elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
				_e( 'Audio', 'tema' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'tema' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'tema' );

			elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
				_e( 'Galleries', 'tema' );

			else :
				_e( 'Archives', 'tema' );

			endif;
		?>
		</h1>
	</header>

	<?php
			while ( have_posts() ) : the_post(); ?>

			<article class="articulo">

				<header class="articulo--header">
					<h2><?php the_title(); ?></h2>
				</header>

				<div class="articulo--content">
					<?php the_content(); ?>
				</div>

				<footer class="articulo--footer">
				</footer>

			</article>

			<? endwhile;
			// Paginación.
		else :
			// If no content, include the "No posts found" template.
		endif;
	?>
</section>

<?php
get_footer();
