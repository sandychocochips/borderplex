<?php
/**
 * Template Name: Regional Data
 */
get_header(); ?>


<section role="region" aria-labelledby="heading" class="pagina">
	<?php
	// Start the Loop.
	while ( have_posts() ) : the_post(); ?>

	<article class="articulo">

		<header class="articulo--header">
			<h1><?php the_title(); ?></h1>
		</header>

		<div class="articulo--content">
			<?php the_content(); ?>
		</div>

		<footer class="articulo--footer">
		</footer>

	</article>

	<?php endwhile;
	?>
</section>

<?php
get_footer();
