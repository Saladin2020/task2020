<?php

namespace Saladin;

use PDO;
use PDOException;

class Database
{
    public function connect($DB_CONFIG)
    {
        $conn = null;
        try {
            $conn = new PDO(
                "mysql:host={$DB_CONFIG['HOSTNAME']};dbname={$DB_CONFIG['DATABASE']}",
                $DB_CONFIG['USERNAME'],
                $DB_CONFIG['PASSWORD'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $conn = $e->getMessage();
        }
        return $conn;
    }
}
