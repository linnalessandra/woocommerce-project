<?php
/* så att temat stödjer woocommerce, för att kunna köra template override */
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('widgets');
/* länkar till css and js */
function css_and_js(){
    wp_enqueue_style('styling1', get_template_directory_uri(). '/style.css' );
    wp_enqueue_style('styling2', get_template_directory_uri(). '/style-shop.css'); 
}
add_action('wp_enqueue_scripts', 'css_and_js');
/* kör funktionen show_my_menus vid en viss krok */
add_action('after_setup_theme', 'show_menus');
/* funktion för att kunna placera menyerna där du vill ha dem */
function show_menus(){
    register_nav_menu('mainmenu', 'Mainmenu');
}
/* 
    Detta används för att placera menyn
	$mainMenuArray = [
	'theme_location' => 'mainmenu'
	];
						
	wp_nav_menu($mainMenuArray);
						

*/

/* ta bort det under produktern (sidebar) */
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');