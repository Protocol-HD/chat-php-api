<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';

$room_id = $_GET['room'];

$database = new Database();

$db = $database->getConnection();

$result = mysqli_query($db, "DELETE FROM messages WHERE room_id = $room_id");
$result = mysqli_query($db, "DELETE FROM room WHERE id = $room_id");

echo $result;
