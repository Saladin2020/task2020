<?php

use Saladin\Config;
use Saladin\jsonFile;

require_once __DIR__ . "/../vendor/autoload.php";

$path = Config::PATH_CONFIG("store_user");
$filename = $path . date("Y") . "_" . date("m") . '_user.json';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data["id"];//isset($_GET["id"]) ? $_GET["id"] : "";
$fullname = $data["fullname"];//isset($_GET["fullname"]) ? $_GET["fullname"] : "";

if ($id != '' && $fullname != '') {
    $arr_set = array(
        "id" => $id,
        "fullname" => $fullname,
    );
    foreach ($data as $key => $value) {
        if (!isset($arr_set[$key])) {
            $arr_set[$key] = $value;
        }
    }
    if (file_exists($filename)) {
        $result = jsonFile::load($filename);
        if ($result != '') {
            $index = -1;
            for ($i = 0; $i < count($result); $i++) {
                if ($result[$i]["id"] == $id) {
                    $index = $i;
                    break;
                }
            }
            if ($index != -1) {
                $result[$index] = $arr_set;
            } else {
                array_push($result, $arr_set);
            }
            jsonFile::store($result, $filename);
        } else {
            jsonFile::store([$arr_set], $filename);
        }
    } else {
        jsonFile::store([$arr_set], $filename);
    }
}
