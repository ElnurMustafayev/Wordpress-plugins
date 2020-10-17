<?php

namespace TelegramBot\App\Providers;

class ViewModel {
    private static $view_models;
    
    /**
     * Sets data in viewmodel
     *
     * @param  array $key   key: ["page name", "view name"]
     */
    public static function set_vm($page, $view, $data) {
        $key = ViewModel::key($page, $view);

        ViewModel::$view_models[$key] = $data;
    }

    /**
     * Gets viewmodel for current view
     *
     * @param  array $key   key: ["page name", "view name"]
     * 
     * @return mixed        viewmodel for current view
     * @return false        if viewmodel doesn't exist
     */
    public static function get_vm($page, $view) {
        $key = ViewModel::key($page, $view);

        return array_key_exists($key, ViewModel::$view_models)
                    ? ViewModel::$view_models[$key]
                    : false;
    }

    // Build a key: "Page>View"
    private static function key($page, $view, $glue = ">") {
        return implode($glue, [$page, $view]);
    }

}