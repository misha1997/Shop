<?php namespace Libs;

use Libs\Router;
use app\controllers\ErrorController;

class FrontController {

    function run() {

		$rout = new Router();

        $patch = 'app\controllers\\'.ucfirst($rout->getController()).'Controller';
        if (class_exists($patch)) {
	        $action = ucfirst($rout->getAction());
	        $controller = new $patch();
	        $controller->$action();
        } else {
			$errorController = new ErrorController;
  			$errorController->pageError();
        }
        
    }
}