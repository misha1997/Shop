<?php namespace app\controllers;

use libs\View;

class ProductController{
	function allProductAction(){	
		$View = new View();
		$View->load('app/web/view_templates/default.tpl'); 
		$View->set('[title]', 'Product page');
		$View->set('[text]', 'Text this product page');
		echo $View->get();
	}
}