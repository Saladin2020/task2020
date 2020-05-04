<?php

namespace Saladin;

class CalendarTask
{
    private $user;
    private $calendar;
    public function __construct()
    {
        $this->user = [];
        $this->calendar = [];
    }
    public function prepareUser($userData)
    {
        array_push($this->user, new SettingUser($userData));
    }

    private function myDateFormat($year, $month, $day)
    {
        $str = "";
        $str = (strlen($day) == 1) ? "0" . $day : $day;
        $str = $year . '-' . $month . '-' . $str;
        return $str;
    }

    private function calendarGenerator($month, $year)
    {
        $path_cetagory = Config::PATH_CONFIG("store_cetagory");
        $filename_cetagory = $path_cetagory . 'cetagory_task.json';
        $result = jsonFile::load($filename_cetagory);
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($i = 0; $i < $day; $i++) {

            $this->calendar[$i] = array(
                "DAY" => ($i + 1),
                "DATE" => $this->myDateFormat($year, $month, ($i + 1)),
                "DAY_NAME" => date("l", strtotime($this->myDateFormat($year, $month, ($i + 1)))),
                "STATUS" => "normal",
            );
            foreach ($result as $value) {
                $this->calendar[$i][$value["id"]] = array(
                    "max_number_position" => isset($value["max_number_position"]) ? $value["max_number_position"] : 0,
                    "users" => []
                );
            }
        }
    }

    public function setTask($day, $taskName, $taskData)
    {
        $this->calendar[($day - 1)][$taskName] = $taskData;
    }
    public function setUserInCalendar()
    {
        $class = [];
        $user_list = [];
        $path_cetagory = Config::PATH_CONFIG("store_cetagory");
        $filename_cetagory = $path_cetagory . 'cetagory_task.json';
        $result = jsonFile::load($filename_cetagory);
        foreach ($result as $rs) {
            array_push($class, $rs["id"]);
        }
        for ($i = 0; $i < count($this->calendar); $i++) {
            for ($j = 0; $j < count($class); $j++) {
                if (isset($this->calendar[$i][$class[$j]])) {
                    if (empty($user_list)) {
                        $user_list = range(0, count($this->user) - 1);
                    }
                    while (!empty($user_list)) {
                        $user_index = array_rand($user_list, 1);
                        if (isset($this->user[$user_index]->get_user()[$class[$j]])) {
                            if ($this->user[$user_index]->get_balance($class[$j]) > 0) {
                                if ($this->ruleTaskGap($this->calendar, $i, $class[$j], $this->user[$user_index]->get_user()["id"]) && $this->ruleTaskNumberPosition($this->calendar[$i][$class[$j]])) {
                                    $this->user[$user_index]->update_balance($class[$j]);
                                    array_push($this->calendar[$i][$class[$j]]["users"], $this->user[$user_index]->get_user());
                                }
                            }
                        }
                        $user_list = array_diff($user_list, array($user_index));
                    }
                }
            }
        }
    }
    public function ruleTaskGap($cal, $cur_index, $cur_class, $cur_user)
    {
        #Rule
        $prev = true;
        if ($cur_class == "a") {
            if ($cur_index == 0) {
                $prev = true;
            } else {
                for ($i = 0; $i < count($cal[$cur_index - 1]["c"]["users"]); $i++) {
                    if ($cal[$cur_index - 1]["c"]["users"][$i]["id"] == $cur_user) {
                        $prev = false;
                        break;
                    }
                }
            }
        } elseif ($cur_class == "c") {
            for ($i = 0; $i < count($cal[$cur_index]["b"]["users"]); $i++) {
                if ($cal[$cur_index]["b"]["users"][$i]["id"] == $cur_user) {
                    $prev = false;
                    break;
                }
            }
        }
        return $prev;
    }
    public function ruleTaskNumberPosition($cur_cal)
    {
        if (count($cur_cal["users"]) == $cur_cal["max_number_position"]) {
            return false;
        } else {
            return true;
        }
    }
    public function getCalendarTask($year, $month)
    {
        //$year = date("Y");
        //$month = date("m");

        $path_user = Config::PATH_CONFIG("store_user");
        $filename_user = $path_user . $year . "_" . $month . '_user.json';
        $result = jsonFile::load($filename_user);
        for ($i = 0; $i < count($result); $i++) {
            $this->prepareUser($result[$i]);
        }

        $this->calendarGenerator($month, $year);

        ///set task
        $path_task = Config::PATH_CONFIG("store_task");
        $filename_task = $path_task . $year . "_" . $month . '_task.json';
        if (file_exists($filename_task)) {
            $result = jsonFile::load($filename_task);
            for ($i = 0; $i < count($result); $i++) {
                foreach ($result[$i] as $k0 => $v0) {
                    $this->setTask($k0, "STATUS", $v0["status"]);
                    foreach ($v0["task"] as $k1 => $v1) {
                        $this->setTask(
                            $k0,
                            $k1,
                            $v1
                        );
                    }
                }
            }
        }

        $this->setUserInCalendar();
        return $this->calendar;
    }
}
