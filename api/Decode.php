<?php

function decode($token)
{
    include_once '../config/Jwt.php';

    $jwt = new JWT();

    $data = $jwt->dehashing($token);

    if ($data != -1 && $data != -2) {
        $id = base64_decode($data['id']);
        $email = base64_decode($data['email']);
        $password = base64_decode($data['password']);
        $nick_name = base64_decode($data['nick_name']);

        return array(
            'id' => $id,
            'email' => $email,
            'password' => $password,
            'nick_name' => $nick_name,
        );
    } else {
        echo $data;
    }
}
