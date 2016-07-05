<?php get_header();
// Esta plantilla también podría funcionar para search.php
?>

<section role="region" aria-labelledby="heading" class="archivo">
	<?php if ( have_posts() ) : ?>

	<header class="pagina--header">
		<h1><?php printf( __( 'Category Archives: %s', 'tema' ), single_cat_title( '', false ) ); ?></h1>
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
