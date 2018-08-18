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
	function GetPostId() 
	{	
        $this->di->get('postIdView');
	}
}