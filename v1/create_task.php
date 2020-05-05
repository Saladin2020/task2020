<?php

use Saladin\Config;
use Saladin\JsonFile;

require_once __DIR__ . "/../vendor/autoload.php";

$path = Config::PATH_CONFIG("store_task");
$filename = $path . date("Y") . "_" . date("m") . '_task.json';

$data = json_decode(file_get_contents("php://input"), true);
$day = $data["day"];//isset($_GET["day"]) ? $_GET["day"] : "";
$status = $data["status"];//isset($_GET["status"]) ? $_GET["status"] : "";
$task_name = $data["task_name"];//isset($_GET["task"]) ? $_GET["task"] : "";
$description = $data["description"];//isset($_GET["description"]) ? $_GET["description"] : "";
$max_number_position = $data["max_number_position"];//isset($_GET["max_number_position"]) ? $_GET["max_number_position"] : "";
/*"STATUS": "normal",
      "a": {
        "max_number_position": 1,
        "users": [
          {
            "id": "001",
            "fullname": "saladin",
            "a": 4,
            "b": "5",
            "c": "8",
            "count": 1
          }
        ]
      },*/
if ($task_name != '' && $max_number_position != '') {

    $arr_set[$task_name] = array(
        "description" => $description,
        "max_number_position" => $max_number_position,
        "users" => []
    );
    $task_list[$day] = array(
        "status" => $status,
        "task" => $arr_set
    );
    if (file_exists($filename)) {
        $result = JsonFile::load($filename);
        if ($result != '') {
            $index = -1;
            for ($i = 0; $i < count($result); $i++) {
                if (isset($result[$i][$day])) {
                    $index = $i;
                    break;
                }
            }
            if ($index != -1) {

                if (isset($result[$index][$day]["task"][$task_name])) {
                    $result[$index][$day]["task"] = $arr_set;
                } else {
                    $result[$index][$day]["task"][$task_name] = $arr_set[$task_name];
                }
            } else {
                array_push($result, $task_list);
            }
            JsonFile::store($result, $filename);
        } else {
            JsonFile::store([$task_list], $filename);
        }
    } else {
        JsonFile::store([$task_list], $filename);
    }
}
