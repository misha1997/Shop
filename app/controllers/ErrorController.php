<?php namespace app\controllers;

use libs\View;

class ErrorController {
    function serverError() {
        $View = new View();
		$View->load('app/web/view_templates/error.tpl'); 
		$View->set('[title]', '404');
		$View->set('[text]', 'Page 404');
		echo $View->get();
    }
}