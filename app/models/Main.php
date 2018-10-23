<?php namespace app\models;

use libs\QueryBuilder;

class Main
{
	function GetPost($offset, $page) {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->select('*')
			->from('products')
			->orderBy('id', 'asc')
			->limit($page)
			->offset($offset)
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
	function GetCount() {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->select()
			->count('id')
			->from('products')
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
	function GetPostId($id) {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->select('*')
			->from('products')
			->where('id', $id)
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
}
