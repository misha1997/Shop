<?php namespace app\view;

class MainView 
{
	function __construct($view) 
	{
		$view->load('app/web/view_templates/default.tpl'); 
		$view->set('[title]', 'Home page');
		$view->set('[text]', 'Text this page');
		
		echo $view->render();
	}
}