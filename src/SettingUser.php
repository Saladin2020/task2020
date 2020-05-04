<?php

namespace Saladin;

class SettingUser
{
    private $count;
    private $user;

    public function __construct($user)
    {
        $this->count = 0;
        $this->user = $user;
    }
    public function update_balance($class)
    {
        $this->count++;
        $this->user[$class]--;
    }
    public function get_balance($class)
    {
        return $this->user[$class];
    }
    public function get_user()
    {
        $this->user["count"] = $this->count;
        return $this->user;
    }
}
