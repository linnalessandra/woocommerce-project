<?php

/* 
Template name: Blog
*/
get_header();
?>

<div class ="main-blog">
    <div class ="blogpost-wrapper">
    <?php
$args = array(

    'post_type' => 'post',

    'posts_per_page' => 1

    'post_title' => 'News'

    );

$loop = new WP_Query( $args );

if ( $loop->have_posts() ) {

    while ( $loop->have_posts() ) : $loop->the_post();
        ?>
        <h2>
        <?php
        the_title();
        ?>
        </h2>
        <p>
        <?php
        the_content();
        ?>
        </p>
    <?php
endwhile;

} else {

    echo __( 'No posts found' );

}

wp_reset_postdata();
    ?>
    </div>
</div>
<?php
get_footer();
?>