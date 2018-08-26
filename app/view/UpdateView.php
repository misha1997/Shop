<?php namespace app\view;

class UpdateView
{
	function __construct($view, $main) 
	{
		$view->load('app/web/view_templates/admin/update.tpl');
		foreach ($main->GetPostId($_GET['up']) as $value) {
			$view->set('id', $value['id']);
			$view->set('title', $value['title']);
			$view->set('image', $value['image']);
			$view->set('price', $value['price']);
			$view->set('description', $value['description']);
		}
		$view->tplParse();
		echo $view->html;
	}
}