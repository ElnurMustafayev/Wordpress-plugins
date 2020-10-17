<?php

namespace TelegramBot\App\Providers;

class Bootstrap
{
	public function __construct() {
		new Ajax();

		$this->register_defines();
		$this->register_sidebar_menu();
	}

	// Register defines
	private function register_defines() {
		// project ROOT path
		define("PLUGIN_DIR", dirname( __DIR__ ));
        define("PLUGIN_URL", plugin_dir_url(PLUGIN_DIR) . "App");
	}

	// Register sidebar menu actions
	private function register_sidebar_menu() {
		add_action("admin_menu", function() {
			// add menu
			$telegram_logo = "https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg";
			add_menu_page("Telegram Bot", "Telegram Bot", 4, sanitize_key("home"), [$this, "home_page"], $telegram_logo);
			
			// add submenu
			add_submenu_page(sanitize_key("home"), "Admin panel", "Admin panel", 4, "admin_page", [$this, "admin_page"]);
		});
	}

	// print home page
	public function home_page() {
		Pages::controller("Main", "TempClass", "SayHello", "John");
		Pages::action("Main", "SaySomething", "Nigga");
	}

	// print admin page
	public function admin_page() {
		$model = [
			"name"	=> "Elnur",
			"data"	=> [1,3,7, "test", null],
			"cat"	=> Pages::asset("Main", "img", "cat_in_mask.jpg"),
			"style"	=> Pages::asset("Main", "css", "styles.css"),
		];
		Pages::view("Main", "index", $model);
	}
}