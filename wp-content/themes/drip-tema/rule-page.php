<?php
/* Template Name: rule-page */

get_header();

?>
    <div class="startPhoto">
	    <img  src="<?= get_template_directory_uri() . '/img/hejsan.jpeg' ?>">
        <h1> <?php the_title() ?></h1>
    </div>

<div class="rules">
<?php


while( have_posts()) {
    the_post();
    the_content();
}

?>
    
</div>



<?php 
    get_footer();
?>

