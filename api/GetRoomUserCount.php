<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';

$database = new Database();

$db = $database->getConnection();

$result = mysqli_query($db, "SELECT COUNT(DISTINCT(any_value(send_user_id))) AS user_count, any_value(room.id) AS room_id FROM messages JOIN room ON messages.room_id = room.id GROUP BY room.id");

$dbdata = array();

while ($row = $result->fetch_assoc()) {
    $dbdata[] = $row;
}

echo json_encode($dbdata);
