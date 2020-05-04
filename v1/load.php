<?php

/*use Saladin\Config;
use Saladin\Database;

require_once __DIR__."/vendor/autoload.php";

$conn = new Database();
$connection = $conn->connect(Config::DB_CONFIG("master"));
$sql = "SELECT * FROM regis";
$stmt = $connection->prepare($sql);
$stmt->execute();
echo json_encode($stmt->fetchAll(PDO::FETCH_NAMED));*/

use Saladin\CalendarTask;

require_once __DIR__."/../vendor/autoload.php";

$data = json_decode(file_get_contents("php://input"), true);
$year = $data["year"];
$month = $data["month"];

$t = new CalendarTask();
$json_form = array(
    "message" => "success",
    "body" => $t->getCalendarTask($year, $month)
);
echo json_encode($json_form);
