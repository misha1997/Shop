<?php namespace Libs;

use app\exceptions\PageException;

class Request
{
	function __construct() {
        $arr = parse_url($_SERVER['REQUEST_URI']);
        try {
            if(!preg_match("#^[a-z0-9_\/.]+$#", $arr['path'])){
                throw new PageException("EROR_URL");
            }
        } catch (\Exception $e) {
            $e->getMessage();
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