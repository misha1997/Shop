<?php namespace app\view;

use app\models\Admin;

class AdminView
{
	function __construct($view) 
	{
		$admin = new Admin();

		$view->load('app/web/view_templates/admin/index.tpl');
		$view->set('title', 'Админ панель');
		
		foreach ($admin->GetPost() as $value) {
			$view->set('id', $value['id']);
			$view->set('title_post', $value['title']);
			$view->set('image', $value['image']);
			$view->set('price', $value['price']);
			$view->set('description', $value['description']);
			$posts[] = $view->parse('app/web/view_templates/admin/inc/post.tpl');
		}
		$view->set('post', $posts);

		$view->tplParse();
		echo $view->html;
	}
}