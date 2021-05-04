<?php 
/**
* Template Name: Stores-page
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
           /*  $link_store = get_permalink();
            echo '<a href="'.$link_store.'">';
            echo the_title();
            echo '</a>'; */
            echo '<h2>';
            echo the_title();
            echo '</h2>';
            echo '<p>';
            echo the_excerpt();
            echo '</p>';
            /* echo the_post_thumbnail(); */
            $imgURL = get_the_post_thumbnail_url();
            echo '<div class="img-stores-wrapper">';
            echo '<img class="img-stores" src="'.$imgURL.'">';
            echo '</div>';
            echo '</div>';
            echo '<hr>';
        endwhile;
    } else {
        echo __( 'No products found' );
    }
    wp_reset_postdata();
    
    echo '</div>';
get_footer();