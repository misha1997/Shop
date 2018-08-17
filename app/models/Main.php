<?php namespace app\models;

use libs\QueryBuilder;

class Main
{
	function GetPost() {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->select()
			->from('products')
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
}
