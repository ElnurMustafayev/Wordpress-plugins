<?php
/**
 * Plugin Name: Telegram-Bot
 * Description: Telegram bot
 * Version: 1.0
 * Author: Elnur Mustafayev
 * Author URI: https://github.com/ElnurMustafayev
 **/

use TelegramBot\App\Providers\Bootstrap;

require_once __DIR__ . "/vendor/autoload.php";

new Bootstrap();