<?php

include "feature.php";

add_action('admin_menu', 'addMenu');

// Add plugin menu in sidebar
function addMenu() {
    $page_title = "Elnur-Plugin";
    $menu_title = "Elnur-Plugin";
    $menu_slug = sanitize_key("home");
    $callback_fn = "pluginHomePage";

    add_menu_page($page_title, $menu_title, 4, $menu_slug, $callback_fn);
}

// Plugin home page output
function pluginHomePage() {
    // create viewmodel
    $vm = ["on_off" => EP_Helper::get_option("with_featured")];

    // prints view
    EP_Helper::view("home", $vm);
}