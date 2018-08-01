<?php namespace app\models;

use Libs\QueryBuilder;

class Main
{
	function GetPost() {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->select()
			->from('test_table')
			->where('id', 1)
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
}
