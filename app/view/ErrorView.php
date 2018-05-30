<?php namespace app\view;

use libs\View;

class ErrorView extends View {
	function __construct() {

		$View = new View();

		$View->load('app/web/view_templates/error.tpl'); 
		$View->set('[title]', '404');
		$View->set('[text]', 'Page 404');
		
		echo $View->render();
	}
}