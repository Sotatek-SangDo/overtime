<?php
/**
* Created by: sang.do
* Date: 19/9/2017
*/

if( ! function_exists('query_get_posts_by_category') ) :

    function query_get_posts_by_category($slug, $post_per_page, $paged)
    {
        $category = get_category_by_slug($slug);
        return new WP_QUERY([
                'cat'           => $category->term_id,
                'post_per_page' => $post_per_page,
                'paged'         => $paged
            ]);
    }
endif; // end if function