<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';

$json = file_get_contents("php://input");
$data = json_decode($json);

$database = new Database();

$db = $database->getConnection();

$result =  mysqli_query($db, "INSERT INTO room VALUES(null, $data->owner_id, '$data->name')");

echo $result;