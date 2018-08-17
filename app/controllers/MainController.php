<?php namespace app\controllers;

use Libs\DIContainer;

class MainController
{
	protected $di;

	function __construct() 
	{
		$this->di = new DIContainer();
	}
	function index() 
	{	
        $this->di->get('mainView');
	}
	function postId() 
	{	
        $this->di->get('postIdView');
	}
}