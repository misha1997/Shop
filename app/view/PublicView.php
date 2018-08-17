<?php namespace app\view;

class PublicView
{
	function __construct($view) 
	{
		$view->load('app/web/view_templates/admin/public.tpl');
		$view->set('title', 'Добавление товара');
		$view->tplParse();
		echo $view->html;
	}
}