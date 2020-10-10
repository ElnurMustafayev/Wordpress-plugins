<?php

add_action('admin_menu', 'add_menu');

// Add plugin menu in sidebar
function add_menu() {
    // Add "Telegram Bot" menu
    $telegram_logo = "https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg";
    add_menu_page("Telegram Bot", "Telegram Bot", 4, sanitize_key("home"), "plugin_home_page", $telegram_logo);
    
    // Add "Admin panel" submenu
    add_submenu_page(sanitize_key("home"), "Admin panel", "Admin panel", 4, sanitize_key("admin"), "plugin_admin_panel_page");
}

// Home page output
function plugin_home_page() {
    Helper::view("home");
}

// Admin panel page output
function plugin_admin_panel_page(){
    Helper::view("admin");
}