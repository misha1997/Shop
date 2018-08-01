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
			$array[] = "<p>".$value['id']." - ".$value['name']."</p>";
		}
		$view->set('text', $array);

		$view->tplParse();
		echo $view->html;
	}
}