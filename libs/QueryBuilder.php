<?php namespace Libs;

use PDO;

class QueryBuilder extends Db
{

    protected $sql = [];
    protected $values = [];
    public $params = [];

    function query($sql, $params) {
        $stmts = $this->db->prepare($sql);
        $stmts->execute($params);
        $result = $stmts->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function select($select = '*') {
        $this->sql['select'] = "SELECT {$select} ";
        return $this;
    }
    function from($table) {
        $this->sql['from'] = "FROM {$table}";
        return $this;
    }
    function where($column, $value, $operator = '=') {
        $this->sql['where'][] = "{$column} {$operator} ?";
        $this->params[] = $value;
        return $this;
    }
    function update($table) {
        $this->sql['update'] = "UPDATE {$table}";
        return $this;
    }
    function sql() {
        if(!empty($this->sql)) {
            foreach ($this->sql as $key => $value) {
                if ($key == 'where') {
                    $sql .= ' WHERE ';
                    foreach ($value as $key) {
                        $sql .= $key;
                        if (count($value) > 1 && next($value)) {
                            $sql .= ' AND ';
                        }
                    }
                } else {
                    $sql .= $value;
                }
            }
        }
        return $sql;
    }
}