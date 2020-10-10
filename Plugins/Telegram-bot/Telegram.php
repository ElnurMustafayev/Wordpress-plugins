<?php

class Telegram {
    private $token;
    private $path = "https://api.telegram.org";

    function __construct() {
        $this->token = Helper::get_option("api_token");
    }

    // get main part of the query string
    function build_path() {
        return empty($this->token)
                    ? false
                    : $this->path . "/bot" . $this->token;
    }

    // build query string
    function method($method_name, $props) {
        $mapping_arr = function($v, $k) { return $k . "=" . $v; };

        $props_str = implode("&", array_map($mapping_arr, $props, array_keys($props)));

        if($this->build_path() === false)
            exit("API Token not found!");
        else 
            return $this->build_path() . "/$method_name" . "?$props_str";
    }
}