<?php namespace app\models;

use libs\QueryBuilder;

class Admin
{
	function PublicTovar($title, $description, $price, $filename) {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->insert('products')
			->values('id', '')
			->values('title', $title)
			->values('description', $description)
			->values('price', $price)
			->values('image', $filename)
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
	function GetPostId($id) {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->select()
			->from('products')
			->where('id', $id)
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
	function DeletTovar($id) {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->delete()
			->from('products')
			->where('id', $id)
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
	function UpdateTovar($id, $title, $description, $price, $filename) {
		$queryBuilder = new QueryBuilder();
		$sql = $queryBuilder
			->update('products')
			->set('title', $title)
			->set('description', $description)
			->set('price', $price)
			->set('image', $filename)
			->where('id', $id)
			->sql();
		$result = $queryBuilder->query($sql, $queryBuilder->params);
		return $result;
	}
}
