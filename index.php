<?php

use libs\Router;
use libs\View;
use libs\Controller;
use libs\Model;
//autoload function
spl_autoload_register(function($class) {
	$path = str_replace('\\', '/', $class . '.php');
	if (file_exists($path)) {
		require_once $path;
	} else {
		echo "Class not exist";
	}
});

$router = new Router;

$router->run();