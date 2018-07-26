<?php namespace app\models;

use Libs\QueryBuilder;

class Main
{
	function GetPost() {
		$QueryBuilder = new QueryBuilder();
		$sql = $QueryBuilder
			->select()
			->from('test_table')
			->sql();

		$result = $QueryBuilder->row($sql);
		return $result;
	}
}
