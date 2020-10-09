<?php

class Messenger {
    static private $arr;
    
    /**
     * Sets view model for current view
     *
     * @param  string   $view   current view name
     * @param  mixed    $arr    assoc viewmodel array 
     *                          ["date"] => "10.02.1992", ...
     * @return void
     */
    static function set_viewmodel($view, $data) {
        Messenger::$arr[$view] = $data;
    }

    static function get_viewmodel($view) {
        return Messenger::$arr[$view];
    }
}