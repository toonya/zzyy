<?php
function zzyy_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	//load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'zzyy' ) );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	/*
add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );
*/

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'zzyy_setup' );

// ----------------------------------------
// ! load bootstrap support & css/js files
// ----------------------------------------

function loadBootstrap() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'admin-javascript', get_template_directory_uri() . '/js/admin.js', array('jquery'), '1.0.0', true );
    	wp_enqueue_media(); //call the media management.
}

add_action( 'admin_enqueue_scripts', 'loadBootstrap' );


require_once('post-type/bonsai.php');
require_once('functions/banner-option.php');
require_once('functions/add-setting.php');
require_once('functions/qn/qn-support.php');

// ----------------------------------------
// ! cunstomer system page
// ----------------------------------------

add_action( 'admin_menu', 'my_menu_pages');
function my_menu_pages() {
	//remove page
	$cc_remove_page = array(
		'edit.php',
		'edit.php?post_type=page',
		'tools.php',
		'index.php',
		'upload.php',
		'post-new.php?post_type=page',
		'edit-comments.php',
		'themes.php',
		'plugins.php',
		'users.php',
		'options-general.php'
		);

	foreach($cc_remove_page as $id=>$menu){
		remove_menu_page($menu);
	}
	//remove subpage
	$remove_submenu_page = array(
		'edit.php?post_type=page' => 'post-new.php?post_type=page',
		'edit.php' => 'post-new.php',
		'users.php' => 'profile.php'
		);

	foreach($remove_submenu_page as $menu=>$submenu){
		remove_submenu_page($menu,$submenu);
	};
	remove_submenu_page('edit.php','edit-tags.php?taxonomy=category');
	remove_submenu_page('edit.php','edit-tags.php?taxonomy=post_tag');
	remove_submenu_page('users.php','user-new.php');
	remove_submenu_page('upload.php','upload.php');
	remove_submenu_page('upload.php','media-new.php');

	//add pageevernote:///view/283963/s10/80680381-86d9-4e14-808c-fa782a0160a0/80680381-86d9-4e14-808c-fa782a0160a0/
	add_menu_page( '新闻', '新闻', 'manage_options', 'edit.php', '', '', 1 );
	add_menu_page( '页面', '页面', 'manage_options', 'edit.php?post_type=page', '', '', 2 );
	add_menu_page( '导航', '导航', 'manage_options', 'nav-menus.php', '', '', 3);
	add_menu_page( '图片库', '图片库', 'manage_options', 'upload.php', '', '', 10);
}