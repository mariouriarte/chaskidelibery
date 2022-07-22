<?php

namespace App\Repository;

use App\Infrastructure\CurlElastic\GetCurl;

class EmpresaElasticRepository
{
    public function findEmpresas(): string
    {
        $curlConnection = new GetCurl('/empresa/_search');
        return $curlConnection->execute();

//        $username = 'elastic';
//        $password = 'adminPassword';
//        $host = 'http://192.168.200.50:9200/empresa/_search';
//
//        $ch = curl_init($host);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
////        curl_setopt($ch, CURLOPT_HEADER, 1);
//        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
////        curl_setopt($ch, CURLOPT_POST, 1);
////        curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadName);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        $result = curl_exec($ch);
//        curl_close($ch);
//
//        dump(json_decode($result));
//        die;
//
//        return '';

//        $ch = curl_init();
//        $method = "GET";
////        $url = "http://localhost:9200/empresa/_search";
//        $url = "192.168.200.50:9200";
//        $username = 'elastic';
//        $password = 'adminPassword';
//
//        $qry = '{
//        "size" : 10,
//        "fields" : "usr",
//                "query" : {
//                        "term" : { "usr":"stratawing"}
//                }
//        }';
//
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//        curl_setopt($ch, CURLOPT_HEADER, 1);
//        curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
//        curl_setopt($ch, CURLOPT_PORT, 9200);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
////        curl_setopt($ch, CURLOPT_POSTFIELDS, $qry);
//        $result = curl_exec($ch);
//        curl_close($ch);
//        dump(json_decode($result));


    }

}
