<?php

require_once "ViewModel.php";

class Helper {
    // unique plugin key
    private static $id = "T-B_228_";

    // Get Post Option
    static function get_option($key) {
        $key = Helper::$id . $key;

        return get_option($key); 
    }

    // Set Post Option
    static function set_option($key, $value) {
        $key = Helper::$id . $key;

        is_null(get_option($key)) 
            ? add_option($key, $value)
            : update_option($key, $value);
    }

    /** prints view
     *
     * @param  string   $view_name    view name without extension
     * @param  array    $viewmodel    assoc array ["data_name" => "value", ...]
     */
    static function view($view_name, $viewmodel = null) {
        $path = plugin_dir_path(__FILE__) . "views/$view_name.php";

        if(!is_null($viewmodel))
            ViewModel::set_viewmodel($view_name, $viewmodel);

        require_once $path;
    }
}