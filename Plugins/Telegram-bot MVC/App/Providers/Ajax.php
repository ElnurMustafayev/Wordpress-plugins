<?php

namespace TelegramBot\App\Providers;

use TelegramBot\App\Pages\Main\Controllers\Ajax as MainAjax;
use TelegramBot\App\Pages\Settings\Controllers\Ajax as SettingsAjax;

class Ajax
{
    use MainAjax;
    use SettingsAjax;

    public function __construct()
    {
        $methods = get_class_methods($this);

        foreach ($methods as $method) {
            if ($method === '__construct') {
                continue;
            }

            add_action('wp_ajax_' . $method, function () use ($method) {
                $this->$method();

                exit;
            });
        }
    }
}
