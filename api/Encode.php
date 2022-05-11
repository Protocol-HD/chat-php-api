<?php

function encode($user_id, $user_email, $user_password, $user_nick_name, $exp)
{
    include_once '../config/Jwt.php';

    $jwt = new JWT();

    $id = $user_id;
    $id = base64_encode($id);

    $email = $user_email;
    $email = base64_encode($email);

    $password = $user_password;
    $password = base64_encode($password);

    $nick_name = $user_nick_name;
    $nick_name = base64_encode($nick_name);

    $token = $jwt->hashing(array(
        'exp' => time() + ($exp), // 만료기간
        'iat' => time(), // 생성일
        'id' => $id,
        'email' => $email,
        'password' => $password,
        'nick_name' => $nick_name
    ));

    return $token;
}
