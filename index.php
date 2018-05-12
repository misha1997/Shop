<?php

use Libs\Router;
use Libs\Request;

ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class) {
	$patch = str_replace('\\', '/', $class . ".php");
	if (file_exists($patch)) {
		require_once $patch;
	}
});

$router = new Router;
$router->run();