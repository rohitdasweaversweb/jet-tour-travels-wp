<?php
// Services Custom Post 
function create_custom_post_type_services()
{
    $labels = array(
        'name' => _x('Services', 'post type general name', 'textdomain'),
        'singular_name' => _x('Service', 'post type singular name', 'textdomain'),
        'menu_name' => _x('Services', 'admin menu', 'textdomain'),
        'name_admin_bar' => _x('Service', 'add new on admin bar', 'textdomain'),
        'add_new' => _x('Add New', 'service', 'textdomain'),
        'add_new_item' => __('Add New Service', 'textdomain'),
        'new_item' => __('New Service', 'textdomain'),
        'edit_item' => __('Edit Service', 'textdomain'),
        'view_item' => __('View Service', 'textdomain'),
        'all_items' => __('All Services', 'textdomain'),
        'search_items' => __('Search Services', 'textdomain'),
        'parent_item_colon' => __('Parent Services:', 'textdomain'),
        'not_found' => __('No services found.', 'textdomain'),
        'not_found_in_trash' => __('No services found in Trash.', 'textdomain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'textdomain'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
        //'taxonomies' => array('category', 'post_tag')
    );

    register_post_type('services', $args);
}
add_action('init', 'create_custom_post_type_services');

add_action('mailpoet_subscription_before_subscribe', function ($data) {
    $email = $data['email'];
    global $wpdb;
    $result = $wpdb->get_results("SELECT email, status FROM wp_mailpoet_subscribers WHERE email = '$email'");

    if (count($result) > 0) {
        throw new \MailPoet\UnexpectedValueException("E-Mail id already exists!");
    }
}, 10, 1);

?>