<?php namespace app\controllers;

use Libs\DIContainer;

class ErrorController 
{
	public $di;

	function __construct() 
	{
		$this->di = new DIContainer();
	}
    function pageError() 
    {
        $this->di->get('error');
    }
    function DbError() 
    {
        $this->di->get('errorDb');
    }
}