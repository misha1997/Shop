<?php namespace app\controllers;

use app\view\ErrorView;
use Libs\DIContainer;

class ErrorController 
{
    function pageError() {
    	$di = new DIContainer();
        $errorView = $di->get('error.view');
    }
}