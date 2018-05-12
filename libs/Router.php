<?php namespace Libs;

class Router {

    protected $routes = [];
    protected $params = [];

    function __construct() {
        $request = new Request;
     
        $buffer = file_get_contents('http://shop/app/config/routes.json');
        $arr = json_decode($buffer, true);
        foreach ($arr[$request->getPathInfo()] as $key => $val) {
	        $this->add($key, $val);
        }
    }
    function add($route, $params) {
        $this->routes[$route] = $params;
    }
    function match() {
        $url = $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    function run() {
        if ($this->match()) {
            $patch = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($patch)) {
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
        } else {
            echo "Class not exist";
        }
    }
}