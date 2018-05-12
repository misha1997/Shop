<?php namespace Libs;

class Request
{
	function __construct() {
		$url = $_SERVER['REQUEST_URI'];
		$this->is_url($url);
	}

	function is_url($url) {
		$arr = parse_url($url);
		if(!preg_match("#^[a-z0-9_\/.]+$#", $arr['path'])){
			echo 'Error URL';
			exit;
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