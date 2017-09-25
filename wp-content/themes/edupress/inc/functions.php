<?php
/**
* my custom function
* Created by: sang.do
* Date: 19/9/2017
*/
require get_template_directory() . '/inc/model/teacher.php';

add_action( 'admin_enqueue_scripts', 'url_wp_admin_ajax' );

$teacher = new Teacher();

function checkIssetKey($data, $key)
{
    if(isset($data)) {
        return $data[$key];
    }
    return '';
}
function url_wp_admin_ajax()
{
    wp_enqueue_script( 'my_script', get_template_directory_uri() . '/inc/js/admin.js' );

    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), '3.3.7');

    wp_enqueue_style('custom', get_template_directory_uri() . '/inc/css/custom.css', array(), '1.0');

    wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '3.3.7');

    wp_enqueue_style('gg-font', 'https://fonts.googleapis.com/icon?family=Material+Icons');

    wp_enqueue_style('gg-style', 'https://code.getmdl.io/1.3.0/material.indigo-pink.min.css', array(), '1.3');

    wp_enqueue_script('gg-js', 'https://code.getmdl.io/1.3.0/material.min.js', array(), '1.3.0');
}

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
        $icon = 'http://www.missnews.com.br/imagens/icon-topo-autor.png';
        add_menu_page('Giáo Viên', 'Giáo Viên', 'manage_options', 'teacher/list', 'show_list_teacher', $icon);
        add_submenu_page('teacher/list', 'Thêm mới', 'Thêm mới', 'manage_options', 'teacher/add', 'add_new_teacher');
    }
    add_action('admin_menu', 'my_plugin_menu_teacher');
endif;

function show_list_teacher()
{
    $_SESSION['admin_url_list'] = get_current_url();

    $GLOBALS['teacher']->create_table();
    $_SESSION['list_teacher'] = $GLOBALS['teacher']->getList();

    require get_template_directory() . '/inc/templates/teacher_list.php';
}
function add_new_teacher()
{
    $_SESSION['admin_url_add'] = get_current_url();
    unset($_SESSION['teacher_current']);
    if( isset($_REQUEST['id']) ) {

        $_SESSION['teacher_current'] = $GLOBALS['teacher']->show($_REQUEST['id']);
    }

    require get_template_directory() . '/inc/templates/add_teacher.php';
}

function get_current_url()
{
    $protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $url = $protocol. $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'];

    return $url;
}


// ajax wp-admin

function ajax_add_teacher() {

    $return = [];

    if ( isset($_REQUEST) ) {

        $data = $_REQUEST['teacher'];

        $return = $_REQUEST['redirect'];

        $GLOBALS['teacher']->store($data);

        wp_send_json_success( $return );
    }

    wp_die();
}

add_action( 'wp_ajax_add_teacher', 'ajax_add_teacher' );
add_action( 'wp_ajax_nopriv_add_teacher', 'ajax_add_teacher' );

add_action( 'wp_ajax_update_teacher', 'ajax_update_teacher' );
add_action( 'wp_ajax_nopriv_update_teacher', 'ajax_update_teacher' );

function ajax_update_teacher() {

    $return = [];

    if ( isset($_REQUEST) ) {

        $id = $_REQUEST['id'];

        $return = $_REQUEST['redirect'];

        $data = $_REQUEST['teacher'];

        $GLOBALS['teacher']->update($id, $data);

        wp_send_json_success( $return );
    }

    wp_die();
}

add_action( 'wp_ajax_delete_teacher', 'ajax_delete_teacher' );
add_action( 'wp_ajax_nopriv_delete_teacher', 'ajax_delete_teacher' );

function ajax_delete_teacher() {

    $return = [];

    if ( isset($_REQUEST) ) {

        $id = $_REQUEST['id'];

        $return = $_REQUEST['redirect'];

        $GLOBALS['teacher']->destroy($id);

        wp_send_json_success( $return );
    }

    wp_die();
}

function image_uploader_field( $name, $value = '', $src) {
    $image = ' button">Upload image';
    $image_size = 'full';
    $display = (!$value) ? 'none' : 'block';

    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

        $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
        $display = 'inline-block';

    }

    return '
    <div>
        <a href="#" class="misha_upload_image_button' . $image . '</a>
        <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $src . '" />
        <input type="hidden" name="img_id" value="' . $value . '" />
        <a href="#" class="misha_remove_image_button" style="display:inline-block;display:' . $display . '">Remove image</a>
    </div>';
}

// get list

function get_list_teacher()
{
    return $GLOBALS['teacher']->getList();
}
