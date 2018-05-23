<?php namespace Libs;

use app\controllers\ErrorController;

class Request
{
	function __construct() {
        $arr = parse_url($_SERVER['REQUEST_URI']);
        if(!preg_match("#^[a-z0-9_\/.]+$#", $arr['path'])){
            (new ErrorController())->serverError();
        }
	}

    function getPathInfo() {
    	$method = $_SERVER['REQUEST_METHOD'];
    	switch ($method) {
    		case 'GET':
    			return $method;
    		break;
    		case 'POST':
    			return $method;
    		break;
    	}
    }
}