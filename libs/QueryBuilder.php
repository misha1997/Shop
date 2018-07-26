<?php namespace Libs;

use PDO;

class QueryBuilder extends Db
{

    protected $sql = [];
    protected $values = [];

    function row($sql, $params = []) {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    function query($sql, $params) {
        $stmts = $this->db->prepare($sql);
        $stmts->execute();
        return $stmts;
    }
    function select($select = '*') {
        $this->sql['select'] = "SELECT {$select}";
        return $this;
    }
    function from($table) {
        $this->sql['from'] = "FROM {$table}";
        return $this;
    }
    public function update($table) {
        $this->sql['update'] = "UPDATE {$table}";
        return $this;
    }
    public function sql() {
        if(!empty($this->sql)) {
            foreach ($this->sql as $key => $value) {
                $sql .= $value;
            }
        }
        return $sql;
    }
}