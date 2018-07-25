<?php namespace app\view;

class ProductView 
{
	function __construct($view) 
	{
		$view->load('app/web/view_templates/default.tpl'); 
		$view->set('[title]', 'Product page');
		$view->set('[text]', 'Text this product page');
		
		echo $view->render();
	}
}