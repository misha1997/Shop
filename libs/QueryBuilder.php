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
    function select($select = '') {
        $this->sql['select'] = "SELECT {$select} ";
        return $this;
    }
    function count($count) {
        $this->sql['count'] = " COUNT({$count}) AS count ";
        return $this;
    }
    function delete($select = '*') {
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
    function orderBy($field, $order)
    {
        $this->sql['order_by'] = " ORDER BY {$field} {$order}";
        return $this;
    }
    function limit($limit) {
        $this->sql['limit'] = " LIMIT {$limit}";
        return $this;
    }
    function offset($offset) {
        $this->sql['offset'] = " OFFSET {$offset}";
        return $this;
    }
    function update($table) {
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
    public function set($data, $val) {
        $this->sql['set'][] = "{$data} = '$val'";
        return $this;
    }
    function sql() {
        if(!empty($this->sql)) {
            foreach ($this->sql as $key => $value) {
                switch ($key) {
                    case 'set':
                        $sql .= ' SET ';
                        foreach ($value as $key) {
                            $sql .= $key;
                            if (count($value) > 1 && next($value)) {
                                $sql .= ', ';
                            }
                        }
                        break;
                    case 'values':
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
                            if ($key == end($this->params)) {
                                $sql .= '';
                            } else {
                                $sql .= ', ';
                            }
                        }
                        $sql .= ')';
                        break;
                    case 'where':
                        $sql .= ' WHERE ';
                        foreach ($value as $key) {
                            $sql .= $key;
                            if (count($value) > 1 && next($value)) {
                                $sql .= ' AND ';
                            }
                        }
                        break;
                    default:
                        $sql .= $value;
                        break;
                }
            }
        }
        return $sql;
    }
}