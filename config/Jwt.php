<?php
class JWT
{
    protected $alg;
    protected $secret_key;

    public function __construct()
    {
        $this->alg = 'sha256';
        $this->secret_key = "comets-arthur";
    }

    public function hashing(array $data): string
    {
        $header = json_encode(array(
            'alg' => $this->alg,
            'typ' => 'JWT',
        ));

        $payload = json_encode($data);
        $signature = hash($this->alg, $header . $payload . $this->secret_key);

        return base64_encode($header . '.' . $payload . '.' . $signature);
    }

    public function dehashing($token)
    {
        $parted = explode('.', base64_decode($token));
        $signature = $parted[2];

        if (hash($this->alg, $parted[0] . $parted[1] . $this->secret_key) != $signature) {
            return false; // 시그니쳐 오류
        }

        $payload = json_decode($parted[1], true);
        if ($payload['exp'] < time()) {
            return false; // 만료 오류
        }

        return json_decode($parted[1], true);
    }
}
