<?php namespace app\controllers;

use libs\Controller;

class MainController extends Controller {
	function IndexAction () {
	    $this->view->render();
	}
}
