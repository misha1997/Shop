<?php namespace Libs;

class DIContainer
{
    protected $arrConf = array();
    protected $components = array();
    protected $initArgs = array();

	function __construct() {
        $buffer = file_get_contents("app/config/di_config.json");
        $this->arrConf = json_decode($buffer, true);
	}
    function get($key)
    {
        $classes = $this->arrConf[$key]["classes"];
        $refactoring = new \ReflectionClass($classes);
        $this->components[$key] = $refactoring->newInstanceArgs($this->initArgs);

        return $this->components[$key];
    }
}

