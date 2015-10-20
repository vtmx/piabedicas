<?php
    dynamic_sidebar( $index );
    posts_nav_link();
    wp_link_pages( $args );
    the_tags();

    comment_form();
    wp_list_comments( $args );
    paginate_comments_links();
?>
