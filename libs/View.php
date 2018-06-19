<?php namespace libs;

class View {

    protected $currentFile;
    protected $tplDirectory;

    function load($file) {
        $file = $this->tplDirectory.$file;
        if(isset($file)) {
            $tplFile = fopen($file, 'r');
            while (!feof($tplFile)) {
                $this->currentFile .= fgets($tplFile, 100);
            }
            fclose($tplFile);
        }
    }
    function set($tag, $target) {
        $this->currentFile = str_replace($tag, $target, $this->currentFile);
    }
    function headers() {
        if (headers_sent()) {
            return headers_list();
        }
    }
    function render() {
        $this->headers();
        return $this->currentFile;
    }
}