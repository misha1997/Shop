<?php namespace app\controllers;

use Libs\DIContainer;

class ErrorController 
{
    function pageError() 
    {
        $di = new DIContainer();
        $di->get('error');
    }
}