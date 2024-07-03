<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$db_name = "message_board";
$db_host = "localhost";
$db_user = "message_board";
$db_pass = "message_board";

try {
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
} catch (Exception $e) {
    die("". $e->getMessage());
}