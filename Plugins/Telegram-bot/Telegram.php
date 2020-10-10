<?php

// https://api.telegram.org/bot<Token>/<Method>?<prop>=<value>&...

class Telegram {
    private $token;
    private $path;

    function __construct() {
        $this->token = Helper::get_setting("api_token");
        $this->path = Helper::get_setting("api_site");
    }

    // get main part of the query string
    function build_path() {
        return $this->path . "/bot" . $this->token;
    }

    // build query string
    function method($method_name, $props) {
        $mapping_arr = function($v, $k) { return $k . "=" . $v; };

        $props_str = implode("&", array_map($mapping_arr, $props, array_keys($props)));

        return $this->build_path() . "/$method_name" . "?$props_str";
    }
}