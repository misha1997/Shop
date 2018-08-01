<?php namespace libs;

class View {
    
    public $values = array();
    public $html;

    function load($file) {
        if(empty($file) || !file_exists($file)) {
            return false;
        } else {
            $this->html = join('',file($file));
        }
    }
    function set($key, $var) {
        $key = '['.$key.']';
        $this->values[$key] = $var;
    }
    function headers() {
        if (headers_sent()) {
            return headers_list();
        }
    }
    function tplParse() {
        foreach ($this->values as $key => $replace) {
            if (is_array($replace)) {
                $replace = implode($replace);
            }
            $this->html = $this->headers().str_replace($key, $replace, $this->html);
        }
    }
}