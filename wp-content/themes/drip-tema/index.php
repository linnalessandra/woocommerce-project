<?php
get_header();

?>

<div class="widgets">
    <?php 
    /* dynamic_sidebar('frontpagewidgetone'); 
    dynamic_sidebar('frontpagewidgettwo');  */
    
    ?>
</div>

<?php 

while( have_posts()){
    the_post();
    the_content();
}
get_footer();

?> 




