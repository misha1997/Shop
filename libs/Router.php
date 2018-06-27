<?php namespace Libs;

class Router
{
    function __construct($request) {
        $buffer = file_get_contents('app/config/routes.json');
        $arr = json_decode($buffer, true);
        foreach ($arr[$request->getMethod()] as $key => $val) {
            if (preg_match($key, $request->getUri())){
                $this->controller = $val["controller"];
                $this->action = $val["action"];
                return true;
            }
        }
        return false;
    }

    function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }
}