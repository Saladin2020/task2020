<?php
$url = isset($_GET['page']) ? $_GET['page'] : "";
if ($url !== "") {
    $page = './page/' . $url . '.php';
    if (file_exists($page)) {
        require $page;
    } else {
        echo 'page not found';
    }
} else {
    require './page/home.php';
}
