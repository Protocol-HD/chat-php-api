<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once "Decode.php";
include_once "../config/Auth.php";

$json = file_get_contents("php://input");
$data = json_decode($json);

$login = decode($data->refresh_token);

if ($login) {
    auth($login["email"], $login["password"]);
} else {
    echo $login;
}


