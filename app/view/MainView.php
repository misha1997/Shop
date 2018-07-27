<?php namespace app\view;

use app\models\Main;

class MainView
{
	function __construct($view) 
	{
		$main = new Main();

		$view->load('app/web/view_templates/default.tpl'); 
		$view->set('title', 'Home page');

		foreach ($main->GetPost() as $value) {
			$new_array[] = $value['name'];
		}
		$view->set('text', $new_array);

		$view->tpl_parse();
		echo $view->html;
	}
}