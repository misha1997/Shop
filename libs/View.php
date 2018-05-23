<?php namespace libs;

class View {

    protected $currentFile;
    protected $tplDirectory;

    function load($file) {
        $file = $this->tplDirectory.$file;
        if(isset($file)) {
            $tplFile = fopen($file, 'r');
            if ($tplFile) { 
                while (!feof($tplFile)) {
                    $this->currentFile .= fgets($tplFile, 100);
                }
            fclose($tplFile);
            } else {
                (new ErrorController())->serverError();
            }
        }
    }
    function set($tag, $target) {
        $this->currentFile = str_replace($tag, $target, $this->currentFile);
    }
    function get() {
        return $this->currentFile;
    }
}