<?php namespace libs;

use PDO;
use app\controllers\ErrorController;

class Db
{
	protected $db;

	function __construct() {
        $buffer = file_get_contents('app/config/db_config.json');
        $this->arrConfBd = json_decode($buffer, true);
        try {
            $this->db = new PDO('mysql:host='.$this->get('host').';dbname='.$this->get('name').';charset=utf8', $this->get('user'), $this->get('pass'));
            return $this->db;
        } catch (\PDOException $e) {
        	$errorController = new ErrorController;
        	die($errorController->DbError());
        }
	}
    function get($keyBd) {
        foreach ($this->arrConfBd as $key => $val) {
        	if ($key == $keyBd) {
        		return $val;
        	}
        }
    }
}