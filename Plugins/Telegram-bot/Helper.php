<?php

require_once "Messenger.php";

class Helper {
    // unique plugin key
    private static $id = "T-B_228_";
    
    // get assoc array of config parameters
    static function get_config() {
        // get config file path
        $config_path = plugin_dir_path(__FILE__) . "settings.json";

        // if file exists
        if(file_exists($config_path)) {
            $file = fopen($config_path, "r");
            $json = fread($file, filesize($config_path));
            $assoc = json_decode($json, true);
            fclose($file);
            return $assoc;
        }

        return [];
    }

    // get config setting
    static function get_setting($setting) {
        $config = Helper::get_config();

        return array_key_exists($setting, $config)
                    ? $config[$setting]
                    : null;
    }

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
            Messenger::set_viewmodel($view_name, $viewmodel);

        require_once $path;
    }
}