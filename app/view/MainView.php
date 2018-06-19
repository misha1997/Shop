<?php namespace app\view;

use libs\View;

class MainView extends View {
	function __construct() {

		$View = new View();

		$View->load('app/web/view_templates/default.tpl'); 
		$View->set('[title]', 'Home page');
		$View->set('[text]', 'Text this page');
		
		echo $View->render();
	}
}