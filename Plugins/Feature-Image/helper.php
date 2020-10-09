<?php

include "messenger.php";

class EP_Helper {
    // unique plugin key
    private static $id = "228ep_";
    
    // Get Post Option
    static function get_option($key) {
        $key = EP_Helper::$id . $key;

        return get_option($key); 
    }

    // Set Post Option
    static function set_option($key, $value) {
        $key = EP_Helper::$id . $key;

        is_null(get_option($key)) 
            ? add_option($key, $value)
            : update_option($key, $value);
    }

    /** prints view
     *
     * @param  string   $view_name    view name without extension
     * @param  array    $viewmodel    assoc array
     */
    static function view($view_name, $viewmodel) {
        $path = plugin_dir_path(__FILE__) . "views/$view_name.php";

        Messenger::set_viewmodel($view_name, $viewmodel);

        require_once $path;
    }
}