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
    wp_enqueue_style('styling3', get_template_directory_uri(). '/style-blog.css'); 
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
/* custom post type */
function custom_post_type_stores(){
    $myTestArray = array( 'thumbnail', 'title', 'editor');
    register_post_type('stores', [
        'public' => true,
        'label' => 'Stores',
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => $myTestArray
        ]);
        register_taxonomy('address', 'stores', [
            'labels' => [
                'name' => 'Address'
            ],
            'hierarchical' => true,
            ]);
            
        }
add_action('init', 'custom_post_type_stores');

/* skapar en cutom meta box  */
function add_custom_meta_box_stores() {
    $screens = [ 'post', 'stores' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'stores-meta-box',               
            'Address',      
            'stores_custom_box_html',  
            $screen                            
        );
    }
}
/* denna genererar det som syns i redigeringsläget */
function stores_custom_box_html( $post ) {
    $value = get_post_meta( $post->ID, '_wporg_meta_key', true );
    ?>
    <label for="wporg_field">Description for this field</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="Drottninggatan 53" <?php selected( $value, 'Drottninggatan 53' ); ?>>Drottninggatan 53</option>
        <option value="Kungsgatan 41" <?php selected( $value, 'Kungsgatan 41' ); ?>>Kungsgatan 41</option>
        <option value="Kullagatan 12" <?php selected( $value, 'Kullagatan 12' ); ?>>Kullagatan 12</option>
    </select>
    <?php
}
add_action( 'add_meta_boxes', 'add_custom_meta_box_stores' );
/* denna funktion gör så att datan från meta-boxen sparas*/
function wporg_save_postdata( $post_id ) {
    if ( array_key_exists( 'wporg_field', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['wporg_field']
        );
    }
}
add_action( 'save_post', 'wporg_save_postdata' );


/* Wdiget för sökfält i header */
register_sidebar([
    'name' => 'Search Widget',
    'Description' => 'Widget för sökfält i headern',
    'id' => 'searching',
    'before_widget' => false,
]);
/* Wdiget för PUFF */
register_sidebar([
    'name' => 'Puff Widget',
    'Description' => 'Widget för puff av blogginlägg',
    'id' => 'puff',
    'before_widget' => '<div id="puff">',
    'after_widget' => '</div>',
]);

