<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" />
	<?php	wp_head(); ?>
	<!-- Código Analytics -->
</head>

<body <?php body_class(); ?>>
<header role="banner" id="encabezadoGeneral">
	<div id='logo'>
		<a href="<?php bloginfo( 'url' ); ?>">
		</a>
	</div>
	
	<input type="checkbox" class="checkbox__hack" id="checkbox__hack">
	<label for="checkbox__hack" class="checkbox-hack__label"></label> 

	<nav role="navigation" class="nav--top">
	<?php wp_nav_menu( array(
		'theme_location' => 'principal',
		'items_wrap'      => '<ul id="nav" class="nav--top__list">%3$s</ul>',
		'container' => ''
	) ); ?>
	</nav>

	<label for="main-nav-check" class="toggle-menu"></label>
	
</header>
<main role='main' class="main">