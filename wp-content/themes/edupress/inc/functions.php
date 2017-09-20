<?php
/**
* my custom function
* Created by: sang.do
* Date: 19/9/2017
*/

if( !function_exists('custom_pagination') ) :

    function custom_pagination($num_pages = '', $page_range = '', $paged='')
    {
        if (empty($page_range)) {
            $page_range = 2;
        }
        global $paged;
        if (empty($paged)) {
            $paged = 1;
        }
        if ($num_pages == '') {
            global $wp_query;
            $num_pages = $wp_query->max_num_pages;
            if(!$num_pages) {
                $num_pages = 1;
            }
        }
        $pagination_args = array(
            'base'            => trailingslashit(get_pagenum_link(1) .'%_%'),
            'format'          => 'page/%#%',
            'total'           => $num_pages,
            'current'         => $paged,
            'show_all'        => False,
            'end_size'        => 3,
            'mid_size'        => $page_range,
            'prev_next'       => True,
            'prev_text'       => __('Previous Page'),
            'next_text'       => __('Next Page'),
        );
        $paginate_links = paginate_links($pagination_args);
        if ($paginate_links) {
            echo "<nav class='custom-pagination'>";
            echo $paginate_links;
            echo "</nav>";
        }
    }
endif;
//get post views
if( !function_exists('getPostViews') ) :
    function getPostViews($postID){
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0 View";
        }
        return $count.' Views';
    }
endif;

// function to count views.
if( !function_exists('setPostViews') ) :
    function setPostViews($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }
endif;


if( !function_exists('my_plugin_menu_teacher')) :
    function my_plugin_menu_teacher() {
        add_menu_page(__('Teacher', 'edupress'), __('Teacher', 'edupress'), 'manage_options', 'teacher/list', 'show_list_teacher' );
        add_submenu_page(__FILE__, __('Danh Sách', 'edupress'), 'Danh S', 'manage_options', __FILE__.'/custom', 'show_list_teacher');
        add_submenu_page(__FILE__, __('Add new', 'edupress'), __('Add new', 'edupress'), 'manage_options', __FILE__.'/about', 'add_new_teacher');
    }
    add_action('admin_menu', 'my_plugin_menu_teacher');
endif;
    
function show_list_teacher()
{
    echo 'hello';
}