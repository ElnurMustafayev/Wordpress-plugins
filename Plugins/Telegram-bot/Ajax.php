<?php

class TbAjax {    
    /**
     * Execute the request
     *
     * @param  string   $url
     * @return mixed    status: bool|string
     */
    static function request($url) {
        $ajax = curl_init();
        curl_setopt($ajax, CURLOPT_URL, $url);
        curl_setopt($ajax, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ajax);
        curl_close($ajax);

        return $output;
    }
}

// Add Ajax actions
add_action("wp_ajax_send_message", "send_message");
add_action("wp_ajax_update_token", "update_token");

// When POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // POST from home page
    if(isset($_POST["message"]))
        do_action("wp_ajax_send_message", $_POST["message"]);

    // POST form admin page
    else if(isset($_POST["api_token"]))
        do_action("wp_ajax_update_token", $_POST["api_token"]);
}

// Send Message action
function send_message($message = "") {
    if(!empty($message)){
        $api = new Telegram();

        $props = ["text" => $message, "chat_id" => "-447729860"];
        $url = $api->method("sendMessage", $props);
        TbAjax::request($url);
    }
}

// Update token action
function update_token($token = "") {
    Helper::set_option("api_token", $token);
}