<?php
get_header();
//echo '<div class="contact-forum"';
while (have_posts()) {
    the_post();
    the_content();
}
//echo '</div>';
get_footer();
