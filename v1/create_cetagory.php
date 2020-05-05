<?php

use Saladin\Config;
use Saladin\JsonFile;

require_once __DIR__ . "/../vendor/autoload.php";

$path = Config::PATH_CONFIG("store_cetagory");
$filename = $path . 'cetagory_task.json';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data["id"]; //isset($_GET["id"]) ? $_GET["id"] : "";
$name = $data["name"]; //isset($_GET["name"]) ? $_GET["name"] : "";
$max_number_position = $data["max_number_position"];
$description = $data["description"]; //isset($_GET["description"]) ? $_GET["description"] : "";

if ($id != '' && $name != '') {
    $arr_set = array(
        "id" => $id,
        "name" => $name,
        "max_number_position" => $max_number_position,
        "description" => $description
    );
    if (file_exists($filename)) {
        $result = JsonFile::load($filename);
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
            JsonFile::store($result, $filename);
        } else {
            JsonFile::store([$arr_set], $filename);
        }
    } else {
        JsonFile::store([$arr_set], $filename);
    }
}
