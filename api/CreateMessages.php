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

$result =  mysqli_query($db, "INSERT INTO messages VALUES(null, $data->room_id, $data->send_user_id, '$data->message_text', default)");

echo $result;