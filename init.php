<?php
require 'vendor/autoload.php';
require 'server/router.php';

use Pa\Pa;

// todo: php catch. add js file with basic funcs
// phpchromapplication
if ($_SERVER["REQUEST_URI"] == '/phpapplication.js') {
	header('Content-Type: application/javascript');
	die('const phpapp = {}; window.phpapp = phpapp;');
}

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
	return false;
}

Pa::start();
