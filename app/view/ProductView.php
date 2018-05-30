<?php namespace app\view;

use libs\View;

class ProductView extends View {
	function __construct() {

		$View = new View();

		$View->load('app/web/view_templates/default.tpl'); 
		$View->set('[title]', 'Product page');
		$View->set('[text]', 'Text this product page');
		
		echo $View->render();
	}
}