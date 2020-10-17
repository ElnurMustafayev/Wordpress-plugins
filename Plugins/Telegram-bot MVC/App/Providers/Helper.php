<?php

namespace TelegramBot\App\Providers;

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
    
    /**
     * ROOT . inner/inner/.../inner.php
     *
     * @param  array    $inners     names off inner folders/files
     *                              ex: [Main, Controllers, Ajax]
     * 
     * @return string               ROOT . inner/inner/.../inner.php
     */
    static function build_path($inners, $file_path = true, $is_php = true) {
        $glued_inners = implode("/", $inners);

        $extension = $is_php ? ".php" : "";
        $start = $file_path ? PLUGIN_DIR : PLUGIN_URL;
        
        // _ROOT_\inner\...\inner.$extension
        return $start . "/" . $glued_inners . $extension;
    }
}