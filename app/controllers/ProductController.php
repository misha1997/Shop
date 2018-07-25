<?php namespace app\controllers;

use Libs\DIContainer;

class ProductController
{
	function allProduct() 
	{	
        $di = new DIContainer();
        $di->get('product');
	}
}