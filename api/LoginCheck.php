<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once "Decode.php";

$json = file_get_contents("php://input");
$data = json_decode($json);

$login = decode($data->token);

if ($login) {
    echo json_encode($login);
} else {
    echo 0;
}

// $database = new Database();

// $db = $database->getConnection();

// $result = mysqli_query($db, "SELECT * FROM user WHERE email = '$data->email' AND password = '$data->password'");

// $row = mysqli_fetch_assoc($result);

// if (count((array)$row)) {
//     echo encode($row["email"], $row["password"]);
// } else {
//     echo false;
// }
