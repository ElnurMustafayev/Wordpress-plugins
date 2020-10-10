<?php
/**
* Plugin Name: Telegram-Bot
* Description: Telegram bot
* Version: 1.0
* Author: Elnur Mustafayev
* Author URI: https://github.com/ElnurMustafayev
**/

require_once "Ajax.php";
require_once "Backend.php";
require_once "Telegram.php";

// Build the query string
$telegram = new Telegram();
$message = Helper::get_option("message");
$props = ["text" => $message, "chat_id" => "-447729860"];
echo "<p style='text-align: center;'>" . $telegram->method("sendMessage", $props) . "</p>";