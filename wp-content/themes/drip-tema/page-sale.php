<?php
/* 
Template name: REA 
*/
do_action('rea');

get_header();
while( have_posts()){
    the_post();
    the_content();
}

get_footer();