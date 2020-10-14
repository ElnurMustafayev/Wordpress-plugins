<?php

namespace TelegramBot\App\Providers;

class Bootstrap
{
	public function __constructor() {
		new Ajax();

		$this->register_defines();
		$this->register_sidebar_menu();
	}

	// Register defines
	private function register_defines() {
		define( 'PLUGIN_DIR', dirname( __DIR__ ));
	}

	// Register sidebar actions
	public function register_sidebar_menu() {
		// add section
		add_action("admin_menu", function() {
			$telegram_logo = "https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg";
			add_menu_page("Telegram Bot", "Telegram Bot", 4, sanitize_key("home"), array($this, "home_page"), $telegram_logo);
		});

		// add submenu
		add_action("admin_menu", function() {
			add_submenu_page(sanitize_key("home"), "Admin panel", "Admin panel", 4, "admin_page", array($this, "admin_page"));
		});
	}

	// print home page
	public function home_page() {
		echo "menu";
	}

	// print admin page
	public function admin_page() {
		echo "settings";
	}
}