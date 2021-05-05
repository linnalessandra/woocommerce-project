<?php 
/* 
Template name: store
*/
get_header();
echo '<div class="main-stores">';
echo '<hr>';
$args = array(
    'post_type' => 'stores',
    'posts_per_page' => -1
    );
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
    while ( $loop->have_posts() ) : $loop->the_post();
        echo '<div class="stores-wrapper">';
        echo '<h2>';    
        echo the_title();
        echo '</h2>';
        $imgURL = get_the_post_thumbnail_url();
        echo '<div class="img-stores-wrapper">';
        echo '<img class="img-stores" src="'.$imgURL.'">';
        echo '</div>';
        echo '<p>';
        echo the_content();
        echo '</p>';
        echo 'Address: ' . get_post_meta( get_the_ID(), '_wporg_meta_key', true );
        echo '</div>';
        echo '<hr>';
    endwhile;
} else {
    echo __( 'No products found' );
}
wp_reset_postdata();

echo '</div>'; 
get_footer();