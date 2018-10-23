<?php namespace app\view;

class PostIdView
{
	function __construct($view, $main) 
	{
		$view->load('app/web/view_templates/pagePostId.tpl');

		foreach ($main->GetPostId($_GET['post']) as $value) {
			$view->set('title', $value['title']);
			$view->set('image', $value['image']);
			$view->set('price', $value['price']);
			$view->set('description', $value['description']);
		}

		$view->tplParse();
		echo $view->html;
	}
}