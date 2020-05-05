<?php

use Saladin\Auth;

require_once __DIR__ . "/../vendor/autoload.php";

$data = json_decode(file_get_contents("php://input"), true);
if(Auth::login($data["user"], $data["password"])){
    echo json_encode(array("message"=>"login"),1);
}else{
    echo json_encode(array("message"=>"incorrect"),1);
}

if(isset($_GET["logout"])==1){
    Auth::logout();
}