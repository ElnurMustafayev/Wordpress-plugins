<?php

require_once "Helper.php";

add_action("wp_ajax_send_message", "send_message");

// Send Message action
function send_message($message = "") {
    $option_key = "message";

    if(!empty($message))
        Helper::set_option($option_key, $message);
}

// When POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST["message"]))
        do_action("wp_ajax_send_message", $_POST["message"]);
}