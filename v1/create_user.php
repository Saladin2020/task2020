<?php

use Saladin\Config;
use Saladin\JsonFile;

require_once __DIR__ . "/../vendor/autoload.php";

$path = Config::PATH_CONFIG("store_user");
$filename = $path . 'user.json';

$data = json_decode(file_get_contents("php://input"), true);
$id = $data["id"];//isset($_POST["id"]) ? $_POST["id"] : "";
$first_name = $data["first_name"];//isset($_POST["first_name"]) ? $_POST["first_name"] : "";
$last_name = $data["last_name"];//isset($_POST["last_name"]) ? $_POST["last_name"] : "";
$line_token = $data["line_token"];
$description = $data["description"];//isset($_POST["description"]) ? $_POST["description"] : "";
print_r($data);
if ($id != '' && $first_name != '' && $last_name != '') {
    $arr_set = array(
        "id" => $id,
        "first_name" => $first_name,
        "last_name" => $last_name,
        "line_token" => $line_token,
        "description" => $description
    );
    foreach ($_GET as $key => $value) {
        if (!isset($arr_set[$key])) {
            $arr_set[$key] = $value;
        }
    }
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
