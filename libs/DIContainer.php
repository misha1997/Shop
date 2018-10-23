<?php namespace Libs;

class DIContainer 
{
    protected $arrConf;
    protected $components;

    function __construct()
    {
        $buffer = file_get_contents("app/config/di_config.json");
        $this->arrConf = json_decode($buffer, true);
    }
    function get($key)
    {
        $classes = $this->arrConf[$key]["classes"];
        if (count($this->components) != 0 && in_array($key, $this->components)) {
            return $this->components[$key];
        }
        $arguments = $this->arrConf[$key]["arguments"];
        $initArgs = array();
        foreach ($arguments as $key) {
            if (count($this->components) == 0 || !in_array($key, $this->components)) {
                $this->components[$key] = $this->get($key);
            }
            $initArgs[$key] = $this->components[$key];
        }
        $refactoring = new \ReflectionClass($classes);
        $this->components[$key] = $refactoring->newInstanceArgs($initArgs);
        return $this->components[$key];
    }
}