<?php

include "helper.php";

// Check POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["plugin_switch"])) 
        EP_Helper::set_option("with_featured", $_POST["plugin_switch"]);
}

// If Plugin is ON
if(EP_Helper::get_option("with_featured") === "on") {
    add_filter('manage_posts_columns', 'add_columns');
    add_action('manage_posts_custom_column', "custom_columns_content", 10, 2);
}

// Add new Columns to Posts page in admin panel
function add_columns($columns) {
    return array_merge($columns, array(
        'featured_img'  => 'Featured image',
    ));
}

// Add content to custom columns
function custom_columns_content($column_key, $post_id) {
    switch ($column_key) {
        case 'featured_img':
            echo get_the_post_thumbnail($post_id);
            break;
    };
}