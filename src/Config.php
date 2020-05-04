<?php

namespace Saladin;

class Config
{
    private const path = [
        "store_user" => "../store/user/",
        "store_task" => "../store/task/",
        "store_cetagory" => "../store/cetagory/",
    ];
    private const database = [
        "master" => [
            "HOSTNAME" => "localhost",
            "DATABASE" => "aroundme",
            "USERNAME" => "root",
            "PASSWORD" => ""
        ],
        'slave' => [
            "HOSTNAME" => "",
            "DATABASE" => "",
            "USERNAME" => "",
            "PASSWORD" => ""
        ]
    ];
    public static function DB_CONFIG($name)
    {
        if(isset(self::database[$name]) != NULL){
            return self::database[$name];
        }else{
            echo "not found '".$name."'<br>";
            return null;
        }
    }
    public static function PATH_CONFIG($name)
    {
        if(isset(self::path[$name]) != NULL){
            return self::path[$name];
        }else{
            echo "not found '".$name."'<br>";
            return null;
        }
    }
}
