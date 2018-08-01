<?php namespace app\view;

class ErrorDbView
{
	function __construct($view) 
	{
		$view->load('app/web/view_templates/error.tpl'); 
		$view->set('title', 'Error connect Db');
		$view->set('text', 'Error connect Db');
		
		$view->tplParse();
		echo $view->html;
	}
}