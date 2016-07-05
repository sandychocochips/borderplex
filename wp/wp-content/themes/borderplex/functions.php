<?php

// Setup del tema
if ( ! function_exists( 'tema_setup' ) )
{
	function tema_setup() {
		// Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 387, 162, false );
		add_image_size( 'tema-full', 1230, 864, false );
		add_image_size( 'tema-mitad', 810, 864, false );

		// Menús
		register_nav_menus( array(
			'principal'   => __( 'Menú principal', 'tema' ),
		) );

	}
}
add_action( 'after_setup_theme', 'tema_setup' );

// Clases del body
function tema_body_classes( $classes ) {
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}
	return $classes;
}
add_filter( 'body_class', 'tema_body_classes' );

// Title
function tema_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}
	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'tema' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'tema_wp_title', 10, 2 );


// Quitar admin_barra si no es administrador
add_filter( 'show_admin_bar', function($content){
	return ( current_user_can('administrator') ) ? $content : false;
});

// Quitar extras del admin bar
function wps_admin_bar() {
	 global $wp_admin_bar;
	 $wp_admin_bar->remove_menu('wp-logo');
	 $wp_admin_bar->remove_menu('about');
	 $wp_admin_bar->remove_menu('wporg');
	 $wp_admin_bar->remove_menu('documentation');
	 $wp_admin_bar->remove_menu('support-forums');
	 $wp_admin_bar->remove_menu('feedback');
	 $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );

// Correo de salida de Wordpress
function new_mail_from($old) {
 return 'noreply@.com';
}
add_filter('wp_mail_from', 'new_mail_from');

// Autor del correo de salida de Wordpress
function new_mail_from_name($old) {
 return '';
}
add_filter('wp_mail_from_name', 'new_mail_from_name');

// Ruta imágenes
function ruta_imagenes(){
	$template = get_template_directory_uri();
	echo $template.'/imgs/';
}

// Quitar opción de editar de los posts
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);

// Quitar versión de Wordpress
function remove_admin_stuff( $translated_text, $untranslated_text, $domain ) {
	$custom_field_text = 'You are using <span class="b">WordPress %s</span>.';
	if ( is_admin() && $untranslated_text === $custom_field_text ) {
		return '';
	}
	return $translated_text;
}
add_filter('gettext', 'remove_admin_stuff', 20, 3);

// Estilos personalizados para login
function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/login.css' );
}
add_action('login_head', 'login_css');

// Estilos personalizados para admin
function admin_style() {
	wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

// Link personalizado para login
function wpc_url_login(){
	return "http://.com/"; // your URL here
}
add_filter('login_headerurl', 'wpc_url_login');

// Quitar cosas extras en el wp-head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// Footer personalizado para el admin
function remove_footer_admin () {
	echo "Administrador de ";
} 
add_filter('admin_footer_text', 'remove_footer_admin');

// Editar el menú admin
function revcon_change_post_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'Noticias';
	$submenu['edit.php'][5][0] = 'Noticias';
	$submenu['edit.php'][10][0] = 'Agregar noticia';
	$submenu['edit.php'][15][0] = 'Categorías';
	$submenu['edit.php'][16][0] = 'Etiquetas de noticias';

	// Remover menús
	remove_menu_page('link-manager.php');
	remove_menu_page('edit-comments.php');
	remove_menu_page('tools.php');

	// Remover submenús
	remove_submenu_page('themes.php','customize.php');
	remove_submenu_page('themes.php','theme-editor.php');
	remove_submenu_page('plugins.php','plugin-install.php');
	remove_submenu_page('plugins.php','plugin-editor.php');
	remove_submenu_page('options-general.php','options-discussion.php');

}
add_action( 'admin_menu', 'revcon_change_post_label' );

// Editar el post de Entradas
function revcon_change_post_object() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Noticias';
	$labels->singular_name = 'Noticia';
	$labels->add_new = 'Agregar noticia';
	$labels->add_new_item = 'Agregar noticia';
	$labels->edit_item = 'Editar noticia';
	$labels->new_item = 'Noticia';
	$labels->view_item = 'Ver noticia';
	$labels->search_items = 'Buscar noticias';
	$labels->not_found = 'Noticias no encontradas';
	$labels->not_found_in_trash = 'Noticias no encontradas en la basura';
	$labels->all_items = 'Todas las noticias';
	$labels->menu_name = 'Noticias';
	$labels->name_admin_bar = 'Noticias';
}
add_action( 'init', 'revcon_change_post_object' );

// Llamar hoja de estilos y funciones-min.js
function tema_name_scripts(){
	wp_enqueue_style( 'styles', get_stylesheet_uri() );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/funciones-min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'tema_name_scripts' );

// Reordenar el menú
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php', // Posts
        'edit.php?post_type=ctp', // Post CPT
        'edit.php?post_type=page', // Pages
        'separator2', // Second separator
        'upload.php', // Media
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'options-general.php', // Settings
        // 'link-manager.php', Links
        // 'edit-comments.php', Comments
        // 'tools.php', Tools
        'separator3', // Second separator
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');
