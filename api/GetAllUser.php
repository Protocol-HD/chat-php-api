<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';

$database = new Database();

$db = $database->getConnection();

$result = mysqli_query($db, 'SELECT * FROM user');

$dbdata = array();

while ($row = $result->fetch_assoc()) {
    $dbdata[] = $row;
}

echo json_encode($dbdata);
// while($row = mysqli_fetch_array($result)) {
//     echo $row['id'];
//     echo $row['email'];
//     echo $row['password'];
//     echo $row['nick_name'];
//     echo "<br/>";
// }
