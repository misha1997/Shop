<?php namespace libs;

use libs\View;

class Router {
	protected $routes = [];
	protected $params = [];

	//connecting and traversing file routes.json

    function __construct() {
        $buffer = file_get_contents('http://shop/app/config/routes.json');
        $arr = json_decode($buffer, true);
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }
	//get array routes
	function add($route, $params) {
		$route = '~^'.$route.'$~';
		$this->routes[$route] = $params[0];
	}
	//traversing and check routes
	function match() {
		$url = trim($_SERVER['REQUEST_URI'], '/');
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url, $matches)) {
				$this->params = $params;
				return true;
			}
		}
		return false;
	}
	//find controllers and action
	function run() {
		if ($this->match()) {
			$patch = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
			$action = ucfirst($this->params['action']).'Action';
			if (method_exists($patch, $action)) {
				$controller = new $patch($this->params);
				$controller->$action();
			} else {
				echo "Action not exist";
			}
		} else {
			echo "Router not exist";
		}
	}
}