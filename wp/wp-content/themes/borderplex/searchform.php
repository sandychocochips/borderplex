<form action="/" method="get" class="search">
	<fieldset>
		<input type="image" alt="Search" src="<?php ruta_imagenes(); ?>icon__search.svg" />
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
	</fieldset>
</form>