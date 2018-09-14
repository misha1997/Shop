<?php namespace Libs;

class DIContainer
{
    protected $arrConf;
    protected $components;
    protected $initArgs = array();

    function __construct()
    {
        $buffer = file_get_contents("app/config/di_config.json");
        $this->arrConf = json_decode($buffer, true);
    }

    function get($key)
    {
        $classes = $this->arrConf[$key]["classes"];
        $arguments = $this->arrConf[$key]["arguments"];

        foreach ($arguments as $key) {
            $this->initArgs[$key] = $this->get($key);
        }

        $refactoring = new \ReflectionClass($classes);

        $this->components[$key] = $refactoring->newInstanceArgs($this->initArgs);
        return $this->components[$key];
    }
}
