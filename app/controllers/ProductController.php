<?php namespace app\controllers;

use app\view\ProductView;
use Libs\DIContainer;

class ProductController
{
	function allProduct() {	
		$di = new DIContainer();
        $productView = $di->get('product.view');
	}
}