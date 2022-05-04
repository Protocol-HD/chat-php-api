<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';

$database = new Database();

$db = $database->getConnection();

$room_id = $_GET['room'];

$result = mysqli_query($db, "SELECT messages.id, messages.room_id, messages.send_user_id, messages.message_text, messages.send_time, user.nick_name FROM messages JOIN user ON messages.send_user_id = user.id WHERE messages.room_id = $room_id");

$dbdata = array();

while ( $row = $result->fetch_assoc())  {
    $dbdata[]=$row;
}

echo json_encode($dbdata);
