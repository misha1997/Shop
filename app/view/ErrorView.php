<?php namespace app\view;

class ErrorView 
{
	function __construct($view) 
	{
		$view->load('app/web/view_templates/error.tpl'); 
		$view->set('[title]', '404');
		$view->set('[text]', 'Page 404');
		
		echo $view->render();
	}
}