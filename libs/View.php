<?php namespace libs;

class View {
	public $patch;
	public $route;

	function __construct($route) {
		$this->route = $route;
		$this->patch = $route['controller'];
	}
	function render() {
		require 'app/web/view_templates/'.$this->patch.'.php';
	}
}

 ?>