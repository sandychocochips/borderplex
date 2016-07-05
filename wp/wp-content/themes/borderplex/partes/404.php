<?php get_header(); ?>

<section role="region" aria-labelledby="heading" class="pagina">
	<article class="articulo">

		<header class="articulo--header">
			<h1>Algo salió mal.</h1>
		</header>

		<div class="articulo--content">
			<p>¡Ups! No encontramos lo que estás buscando :(<br>
			Intenta utilizando nuestro buscador.
			</p>

			<?php get_search_form(); ?>
		</div>

	</article>
</section>


<?php
get_footer();
