<?php namespace app\controllers;

use Libs\DIContainer;

class MainController
{
	function index() 
	{	
        $di = new DIContainer();
        $di->get('main');
	}
}