<?php

namespace TelegramBot\App\Providers;

class Pages {

    // $controller->$method($data);
    public static function controller($page, $controller, $method, $data = []) {
        $path = Helper::build_path(["Pages", $page, "Controllers", $controller]);

        if(file_exists($path)) {
            $class = "\TelegramBot\App\Pages\\$page\Controllers\\$controller";
            $obj = new $class;

            if(method_exists($obj, $method))
                return $obj->$method($data);
                
            exit("Method \"$method\" doesn't exist in \"$controller\" controller...");
        }
        exit ("Controller \"$controller\" doesn't exist in \"$page\" page...");
    }

    // Action->$method($data)
    public static function action($page, $method, $data = []) {
        return Pages::controller($page, "Action", $method, $data);
    }

    // Show: $page/Views/$view.php
    public static function view($page, $view, $data = []) {
        $path = Helper::build_path(["Pages", $page, "Views", $view]);

        if(file_exists($path)){
            ViewModel::set_vm($page, $view, $data);
            require_once $path;
        }
        else
            exit("View \"$view\" doesn't exist in \"$page\" page...");
    }

    // Get full path to asset
    public static function asset($page, $folder, $file, $version = null) {
        $file .= (is_null($version) ? "" : "?ver=$version");
        
        return Helper::build_path(["Pages", $page, "Assets", $folder, $file], false, false);
    }
}