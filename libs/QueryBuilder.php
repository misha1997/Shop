<?php namespace Libs;

use PDO;
use libs\Db;

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
        $this->reset();
        $this->sql['select'] = "SELECT {$select} ";
        return $this;
    }
    function delete($select = '*') {
        $this->reset();
        $this->sql['delete'] = "DELETE {$delete}";
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
        $this->reset();
        $this->sql['update'] = "UPDATE {$table}";
        return $this;
    }
    function insert($table) {
        $this->sql['insert'] = "INSERT INTO {$table} ";
        return $this;
    }
    function values($column, $value) {
        $this->sql['values'][] = "{$column}";
        $this->params[] = $value;
        return $this;
    }
    function set($column) {
        $this->sql['set'] = "{$column}";
        return $this;
    }
    function sql() {
        if(!empty($this->sql)) {
            foreach ($this->sql as $key => $value) {
                if ($key == 'set') {
                    $sql .= ' SET ';
                }
                if ($key == 'values') {
                    $sql .= '(';
                    foreach ($value as $key) {
                        $sql .= $key;
                        if (count($value) > 1 && next($value)) {
                            $sql .= ', ';
                        }
                    }
                    $sql .= ') VALUES (';
                    foreach ($this->params as $key) {
                        if ($key == '') {
                            $sql .= 'NULL';
                        } else {
                            $sql .= '\''.$key.'\'';
                        }
                        if (count($this->params) > 1 && next($this->params)) {
                            $sql .= ', ';
                        }
                    }
                    $sql .= ')';
                }
                else if ($key == 'where') {
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

    function reset() {
        $this->sql = [];
        $this->values = [];
    }
}