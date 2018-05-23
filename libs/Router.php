<?php namespace Libs;

use app\controllers\ErrorController;

class Router {

    protected $routes = [];
    protected $params = [];

    function __construct() {
        $request = new Request;
     
        $buffer = file_get_contents('app/config/routes.json');
        $arr = json_decode($buffer, true);
        foreach ($arr[$request->getPathInfo()] as $key => $val) {
	        $this->add($key, $val);
        }
    }

    function add($route, $params) {
        $this->routes[$route] = $params;
    }
    function match() {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $_SERVER['REQUEST_URI'], $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    function run() {
        if ($this->match()) {
            $patch = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            $action = ucfirst($this->params['action']).'Action';
            $controller = new $patch($this->params);
            $controller->$action();
        } else {
            (new ErrorController())->serverError($e);
        }
    }
}