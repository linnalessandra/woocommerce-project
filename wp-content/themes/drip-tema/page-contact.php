<?php
get_header();
while( have_posts()){
     echo '<div class="contact-forum">';
    the_post();
    the_content();
    echo '</div>';
}
get_footer();