<?php namespace Libs;

class Request
{
    function getUri() {
        $arr = parse_url($_SERVER['REQUEST_URI']);
        if(preg_match("#^[a-z0-9_\/.]+$#", $arr['path'])){
            return $_SERVER["REQUEST_URI"];
        }
    }

    function getMethod() {
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