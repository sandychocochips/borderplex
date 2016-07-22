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

<header role="banner">
	<div class="wrap">
		<?php
			$logo_header = get_field('logo_header', 'option');
			if ($logo_header) { ?>
				<figure>
					<a href="<?php bloginfo( 'url' ); ?>">
						<img src="<?php echo $logo_header; ?>"/>
					</a>
				</figure>
			<?php }
		?>
	</div>


	<div class="header_right">
		<?php

		wp_nav_menu( array(
			'theme_location' => 'top',
			'items_wrap'      => '<ul>%3$s</ul>',
			'container' => ''
		) );
		?>
		<?php get_search_form(); ?>
		
		<?php
		$social = get_field('social', 'option'); 

		if($social) { ?>

		<div class="social_media">

			<?php
			foreach($social as $soc) {
				$icon = $soc['icon'];
				$link = $soc['link'];
				?>

				<a href="<?php echo $link; ?>" class="twitter">
					<img src="<?php echo $icon; ?>" >
				</a>

			<?php } ?>

		</div>
		<?php } 
		?>
	</div>

	<div>

	<input type="checkbox" class="checkbox__hack" id="checkbox__hack">
	<label for="checkbox__hack" class="checkbox-hack__label"></label> 

	<nav role="navigation" class="nav--top">
		<div class="wrap">
			<?php 
			wp_nav_menu( array(
				'theme_location' => 'main',
				'items_wrap'      => '<ul id="nav" class="nav--top__list">%3$s</ul>',
				'container' => '',
				'depth' => 2
			) );
			?>
		</div>
	</nav>

	</div>

	<label for="main-nav-check" class="toggle-menu"></label>
	<?php
	if ( !is_home() ) { ?>
	<div class="breadcrumb">
		<div class="wrap">
			<div class="a_breadcrum">
				<?php the_breadcrumb(); ?>
			</div>
			<?php
			if ( !icl_object_id($post->ID, 'post', true) ) {
				languages_list_footer();
			}
			?>
		</div>
	</div>
	<?php }
	?>
</header>

<main role='main' class="main">