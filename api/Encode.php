<?php

function encode($user_id, $user_email, $user_password, $user_nick_name)
{
    include_once '../config/Jwt.php';

    $jwt = new JWT();

    $id = $user_id;
    $id = base64_encode($id); // .이 들어가도 JWT가 분리되지 않기 위한 base64 인코딩
    
    $email = $user_email;
    $email = base64_encode($email);

    $password = $user_password;
    $password = base64_encode($password);

    $nick_name = $user_nick_name;
    $nick_name = base64_encode($nick_name);

    // 유저 정보를 가진 jwt 만들기
    $token = $jwt->hashing(array(
        'exp' => time() + (60 * 60 * 30), // 만료기간
        'iat' => time(), // 생성일
        'id' => $id,
        'email' => $email,
        'password' => $password,
        'nick_name' => $nick_name
    ));

    // var_dump($token);
    return $token;
}
