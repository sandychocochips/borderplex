<?php
get_header(); ?>

<section role="region" aria-labelledby="heading" class="archivo">
	<?php if ( have_posts() ) : ?>

	<header class="pagina--header">
		<h1><?php printf( __( 'Tag Archives: %s', 'tema' ), single_tag_title( '', false ) ); ?></h1>
		<?php
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
		?>
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
