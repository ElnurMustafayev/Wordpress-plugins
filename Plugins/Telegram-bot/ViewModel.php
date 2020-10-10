<?php

class ViewModel {
    static private $arr;
    
    /**
     * Sets view model for current view
     *
     * @param  string   $view   current view name
     * @param  array    $arr    assoc viewmodel array 
     *                          ["date"] => "10.02.1992", ...
     * @return void
     */
    static function set_viewmodel($view, $data) {
        ViewModel::$arr[$view] = $data;
    }

    /**
     * Gets current view's view model 
     *
     * @param  string   $view   current view name
     * 
     * @return array            assoc viewmodel array 
     */
    static function get_viewmodel($view) {
        return ViewModel::$arr[$view];
    }
}