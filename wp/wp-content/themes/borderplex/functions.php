<?php

// Setup del borderplex
if ( ! function_exists( 'borderplex_setup' ) )
{
	function borderplex_setup() {
		// Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 330, 330, true );
		add_image_size( 'borderplex-medium', 500, 500, true );
		add_image_size( 'borderplex-slider', 1800, 500, true );

		// Menús
		register_nav_menus( array(
			'main'   => __( 'Main menu', 'borderplex' ),
			'top'   => __( 'Top menu', 'borderplex' ),
		) );

	}
}
add_action( 'after_setup_theme', 'borderplex_setup' );

// Clases del body
function borderplex_body_classes( $classes ) {
	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}
	return $classes;
}
add_filter( 'body_class', 'borderplex_body_classes' );

// Title
function borderplex_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'borderplex' ), max( $paged, $page ) );
	}
	return $title;
}
add_filter( 'wp_title', 'borderplex_wp_title', 10, 2 );


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
 return 'noreply@borderplexalliance.org';
}
add_filter('wp_mail_from', 'new_mail_from');

// Autor del correo de salida de Wordpress
function new_mail_from_name($old) {
 return 'Borderplex Alliance';
}
add_filter('wp_mail_from_name', 'new_mail_from_name');

// Ruta imágenes
function ruta_imagenes(){
	$template = get_template_directory_uri();
	echo $template.'/images/';
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
	return "http://www.borderplexalliance.org"; // your URL here
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
	echo "Borderplex Alliance Administrator";
} 
add_filter('admin_footer_text', 'remove_footer_admin');

// Editar el menú admin
function revcon_change_post_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][15][0] = 'Categories';
	$submenu['edit.php'][16][0] = 'Tags';

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
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'News not found';
	$labels->not_found_in_trash = 'News not found in trash';
	$labels->all_items = 'All the News';
	$labels->menu_name = 'News';
	$labels->name_admin_bar = 'News';
}
add_action( 'init', 'revcon_change_post_object' );

// Llamar hoja de estilos y funciones-min.js
function borderplex_name_scripts(){
	wp_enqueue_style( 'styles', get_stylesheet_uri() );
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/funciones-min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'borderplex_name_scripts' );

// Reordenar el menú
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php', // Posts
        'edit.php?post_type=slider', // Post CPT
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



// CPT
function cpt_borderplex() {
	register_post_type('slider', array(
		'label' => 'Slider',
		'description' => '',
		'menu_icon' => 'dashicons-align-center',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'map_meta_cap' => true,
		'hierarchical' => true,
		'rewrite' => array('slug' => 'slider', 'with_front' => true),
		'query_var' => true,
		'has_archive' => true,
		'supports' => array('title'),
		'labels' => array (
			'name' => 'Slide',
			'singular_name' => 'Slide',
			'menu_name' => 'Slide',
			'add_new' => 'Add new',
			'add_new_item' => 'Add new Slide',
			'edit' => 'Edit',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view' => 'New',
			'view_item' => 'New Slide',
			'search_items' => 'Search',
			'not_found' => 'Not found',
			'not_found_in_trash' => 'Not found in trash',
			'parent' => 'Parent Slide',
		)
	) );
}
add_action('init', 'cpt_borderplex');

// Ver custom post types en búsquedas y categorías
function query_post_type($query) {
	if(is_category() || is_tag()) {
	   $post_type = get_query_var('post_type');
		if($post_type)
			$post_type = $post_type;
		else
			$post_type = array('nav_menu_item','post','cpt', 'carrusel'); // replace cpt to your custom post type
			$query->set('post_type',$post_type);
			return $query;
   }
}
// add_filter('pre_get_posts', 'query_post_type');

// Páginas de Configuración para Options de ACF
function my_options_page_settings ( $options ) {
	$options['title'] = __('Config');
	$options['pages'] = array(
		__('Header'),
		__('Home'),
		__('Footer')
	);
	
	return $options;
}
add_filter('acf/options_page/settings', 'my_options_page_settings');

// Insertar Breadcrumb    
function the_breadcrumb() {
    global $post;
    echo '<ul class="breadcrumb--list">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Borderplex';
        echo '</a></li><li> &gt; </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> &gt; </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> &gt; </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator"> &gt; </li>';
                }
                echo $output;
                echo $title;
            } else {
                echo '<li>'.get_the_title().'</li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    echo '</ul>';
}

// Selector de idiomas en el footer
function languages_list_footer(){
	$languages = icl_get_languages('skip_missing=0&orderby=code');
	if(!empty($languages)){
		echo '<div class="">';
			foreach($languages as $l){

			if(!$l['active']){
				echo '<a href="'.$l['url'].'">[ ';
				echo icl_disp_language($l['native_name']);
				echo ' ]</a>';
			}
		}
		echo '</div>';
	}
}

add_action( 'admin_init', 'my_remove_menu_pages' );
function my_remove_menu_pages() {

	global $user_ID;
	if ( current_user_can( 'borderplex' ) ) {
		remove_menu_page( 'options-general.php' );
		remove_menu_page( 'edit.php?post_type=acf' );
		// remove_menu_page( 'admin.php?page=aiowpsec' );
	}
}