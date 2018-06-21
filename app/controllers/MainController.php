<?php namespace app\controllers;

use app\view\MainView;
use Libs\DIContainer;

class MainController
{
	function index() {	
		$di = new DIContainer();
        $indexView = $di->get('index.view');
	}
}