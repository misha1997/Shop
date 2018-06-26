<?php namespace Libs;

use app\controllers\ErrorController;

class DIContainer1
{
    protected $arrConf;
    protected $components;
    protected $initArgs = array();

    function __construct() {
        $buffer = file_get_contents("app/config/di_config1.json");
        $this->arrConf = json_decode($buffer, true);
    }
    function get($key)
    {
        $classes = $this->arrConf[$key]["classes"];
        try {
            $refactoring = new \ReflectionClass($classes);
        } catch (\ReflectionException $e) {
            $errorController = new ErrorController;
            $errorController->pageError();
        }
        $this->components[$key] = $refactoring->newInstanceArgs($this->initArgs);

        return $this->components[$key];
    }
}

