<?php

namespace Saladin;

class Auth
{

    public static function login($u, $p)
    {
        $status = false;
        $path = Config::PATH_CONFIG("auth");
        $rs = JsonFile::load($path);
        $jsonuser = $rs[0]["user"];
        $jsonpassword = $rs[0]["password"];
        if (md5($u) == $jsonuser && md5($p) == $jsonpassword) {
            session_start();
            $_SESSION = array(
                'Allow' => true,
            );
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }
    public static function logout()
    {
        session_start();
        session_destroy();
    }
}
