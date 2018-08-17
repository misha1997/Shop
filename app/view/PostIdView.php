<?php namespace app\view;

use app\models\Main;

class PostIdView
{
	function __construct($view) 
	{
		$main = new Main();

		$view->load('app/web/view_templates/pagePostId.tpl');

		foreach ($main->GetPostId() as $value) {
			$view->set('title', $value['title']);
			$view->set('image', $value['image']);
			$view->set('price', $value['price']);
			$view->set('description', $value['description']);
		}

		$view->tplParse();
		echo $view->html;
	}
}