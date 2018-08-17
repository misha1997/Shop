<?php namespace libs;

class View {
    
    public $values = array();
    public $html;
    public $parse_tpl;

    function load($file) {
        if(empty($file) || !file_exists($file)) {
            return false;
        } else {
            $this->html = join('',file($file));
        }
    }
    function set($key, $val) {
        if (!is_array($val)) {
            $this->values['['.$key.']'] = $val;
        } elseif(is_array($val)) {
            foreach ($val as $k => $v) {
                $this->values['['.$key.']'] .= $v;
            }
        } else {
            $this->values[$name] = "";
        }
    }
    function headers() {
        if (headers_sent()) {
            return headers_list();
        }
    }
    function parse($tpl) {
        $this->parse_tpl = file_get_contents($tpl);
        foreach ($this->values as $k => $v) {
            $this->parse_tpl = str_replace($k, $v, $this->parse_tpl);
        }
        return $this->parse_tpl;
    }
    function tplParse() {
        preg_match_all("/\[include\=(.*?[.tpl])\]/is", $this->html, $mas);
        foreach ($mas[0] as $k => $v) {
            $this->html = str_replace($mas[0][$k], $this->parse($mas[1][$k]), $this->html);
        }
        foreach ($this->values as $key => $replace) {
            $this->html = $this->headers().str_replace($key, $replace, $this->html);
        }
    }
}