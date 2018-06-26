<?php namespace Libs;

use app\controllers\ErrorController;

class FrontController
{
    public function run()
    {
        $di = new DIContainer1();
        $rout = $di->get(get_class());

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