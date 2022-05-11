<?php
include_once '../config/Database.php';
include_once "Encode.php";

function auth($email, $password)
{
    $database = new Database();

    $db = $database->getConnection();

    $result = mysqli_query($db, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");

    $row = mysqli_fetch_assoc($result);

    if (count((array) $row)) {
        echo json_encode(array(
            "access_token" => encode($row['id'], $row["email"], $row["password"], $row["nick_name"], 60 * 10),
            "refresh_token" => encode($row['id'], $row["email"], $row["password"], $row["nick_name"], 60 * 60),
        ));
        // echo encode($row['id'], $row["email"], $row["password"], $row["nick_name"], 60*60);
    } else {
        echo false;
    }
}
