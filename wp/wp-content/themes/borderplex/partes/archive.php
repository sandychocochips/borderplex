<?php get_header(); ?>

<section role="region" aria-labelledby="heading" class="pagina">
	<?php if ( have_posts() ) : ?>

	<header class="pagina--header">
		<h1>
			<?php
				if ( is_day() ) :
					printf( __( 'Daily Archives: %s', 'tema' ), get_the_date() );
				elseif ( is_month() ) :
					printf( __( 'Monthly Archives: %s', 'tema' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'tema' ) ) );
				elseif ( is_year() ) :
					printf( __( 'Yearly Archives: %s', 'tema' ), get_the_date( _x( 'Y', 'yearly archives date format', 'tema' ) ) );
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
			// Paginación
		else :
			// If no content, include the "No posts found" template.
		endif;
	?>
</section>

<?php
get_footer();
