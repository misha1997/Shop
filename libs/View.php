<?php namespace libs;

class View {
    function load($file) {
        global $currentFile, $tplDirectory;
        $file = $tplDirectory.$file;
        if(isset($file)) {
            $tplFile = fopen($file, 'r');
            if ($tplFile) { 
                while (!feof($tplFile)) {
                    $currentFile .= fgets($tplFile, 100);
                }
            fclose($tplFile);
            } else {
                echo "Tpl file not exist";
            }
        }
    }
    function set($tag, $target) {
        global $currentFile;
        $currentFile = str_replace($tag, $target, $currentFile);
    }
    function get() {
        global $currentFile;
        return $currentFile;
    }
}