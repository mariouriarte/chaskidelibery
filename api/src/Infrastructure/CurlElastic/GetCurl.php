<?php

namespace App\Infrastructure\CurlElastic;

class GetCurl
{
    public function __construct(
        private readonly string $path
    ) {
    }

    public function execute(string $query = null): string
    {
        $host = ConectionElastic::URL.$this->path;

        $ch = curl_init($host);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_USERPWD, ConectionElastic::USERNAME.":".ConectionElastic::PASSWORD);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadName);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $method = "GET";
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

        if ($query) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
        }

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
