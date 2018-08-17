<?php namespace app\view;

use app\models\Admin;

class UpdateView
{
	function __construct($view) 
	{
		$admin = new Admin();
		$view->load('app/web/view_templates/admin/update.tpl');
		foreach ($admin->GetPostId($_GET['up']) as $value) {
			$view->set('title', $value['title']);
			$view->set('image', $value['image']);
			$view->set('price', $value['price']);
			$view->set('description', $value['description']);
		}
		$view->tplParse();
		echo $view->html;
	}
}