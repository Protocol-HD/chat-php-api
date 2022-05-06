<?php

function decode($token)
{
    include_once '../config/Jwt.php';

    $jwt = new JWT();

    // $token = "eyJhbGciOiJzaGEyNTYiLCJ0eXAiOiJKV1QifS57ImV4cCI6MTY1MTkyMjQwMywiaWF0IjoxNjUxODE0NDAzLCJpZCI6MTAsImVtYWlsIjoiZEdWemRFQm5iV0ZwYkM1amIyMD0iLCJwYXNzd29yZCI6IllXUnRhVzR4TWpNMCJ9LjU5M2UyNWQyMzM1NjcwNmViY2MxMzU0ZTY2NjIxZjZmMDE2NDNkYjJkOTBmNjAzNDZhMzFiYTJmY2NlZjliYWI=";

// jwt에서 유저 정보 가져오기
    // $data = $jwt->dehashing($token);
    $data = $jwt->dehashing($token);

    if ($data) {
        $id = base64_decode($data['id']);
        $email = base64_decode($data['email']);
        $password = base64_decode($data['password']);
        $nick_name = base64_decode($data['nick_name']);

        return array(
            'id' => $id,
            // 'email' => $email,
            // 'password' => $password,
            'nick_name' => $nick_name,
        );
    } else {
        return false;
    }

    // echo base64_decode($data['email']);
    // echo "\n";
    // echo base64_decode($data['password']);

// $parted = explode('.', base64_decode($token));

// $payload = json_decode($parted[1], true);

// var_dump($payload);

// echo "<br/><br/>";
// echo "email: " . base64_decode($payload['email']);
// echo "<br/><br/>";
// echo "password: " . base64_decode($payload['password']);
}
