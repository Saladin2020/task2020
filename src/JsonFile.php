<?php

namespace Saladin;

class jsonFile
{
    public static function store($objString, $filename)
    {
        $file = fopen($filename, "w") or die("Unable to open file!");
        fwrite($file, json_encode($objString, 1));
        fclose($file);
    }
    public static function load($filename)
    {
        $str = "";
        $file = fopen($filename, "r") or die("Unable to open file!");
        $str = fread($file, filesize($filename));
        fclose($file);
        return json_decode($str, 1);
    }
}