<?php namespace app\view;

use app\models\Main;

class MainView
{
	function __construct($view) 
	{
		$main = new Main();

		$view->load('app/web/view_templates/pageMain.tpl');
		$view->set('title', 'Главная страница');

		foreach ($main->GetPost() as $value) {
			$view->set('id', $value['id']);
			$view->set('title_post', $value['title']);
			$view->set('image', $value['image']);
			$view->set('price', $value['price']);
			$posts[] = $view->parse('app/web/view_templates/inc/post.tpl');
		}
		$view->set('post', $posts);

		$view->tplParse();
		echo $view->html;
	}
}