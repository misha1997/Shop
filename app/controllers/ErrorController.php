<?php namespace app\controllers;

use app\view\ErrorView;

class ErrorController {
    function pageError() {
        $errorView = new ErrorView();
    }
}