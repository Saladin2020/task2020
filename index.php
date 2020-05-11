<?php
session_start();
if (!isset($_SESSION["Allow"])) {
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="assets/fonts/kanit.css" rel="stylesheet">

    <script src="assets/js/vue.js"></script>
    <script src="assets/js/axios.min.js"></script>
    <script src="assets/js/vue-append.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <title>Task2020</title>
    <style>
        body {
            font-family: 'Kanit';
        }

        th,
        td {
            white-space: nowrap;
        }
    </style>
</head>


<body>
    <?php require_once './page/layout/sidemenu.php'; ?>
    <div id="main">
        <?php require_once './page/layout/navbar.php'; ?>
        <div id="app_content">
            <div v-append="content">
            </div>
        </div>
    </div>
</body>
<script src="./page/jsLibs/content.js"></script>

</html>