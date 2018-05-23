<?php namespace app\controllers;

use libs\View;
//use libs\Logger;

class ErrorController {
    function serverError() {
    	// Logger::getLogger($name)->log($data);
    	// Logger::$PATH = dirname(__FILE__);

        $View = new View();
		$View->load('app/web/view_templates/error.tpl'); 
		$View->set('[title]', '404');
		$View->set('[text]', 'Page 404');
		echo $View->get();
    	
    }
}