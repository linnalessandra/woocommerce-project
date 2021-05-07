<?php
/* 
Template name: Start-Sida 
*/
get_header();
while( have_posts()){
    the_post();
    the_content();
}

echo "<div class='product_filter'<?php dynamic_sidebar('product_filter'); ?>";

get_footer();