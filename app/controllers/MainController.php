<?php namespace app\controllers;

use libs\View;

class MainController{
	function indexAction(){	
		$View = new View();
		$View->load('app/web/view_templates/default.tpl'); 
		$View->set('[title]', 'Home page');
		$View->set('[text]', 'Text this page');
		echo $View->get();
	}
}