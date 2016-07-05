<?php get_header(); ?>

<section role="region" aria-labelledby="heading">
	<article>
		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title() ?></h1>

		<? endwhile;?>
	</article>
</section>

<?php
get_footer();
