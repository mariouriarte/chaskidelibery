<?php

namespace App\Repository;

use App\Entity\Empresa;
use App\Infrastructure\CurlElastic\GetCurl;
use App\Infrastructure\CurlElastic\PutCurl;
use JMS\Serializer\SerializerInterface;

class EmpresaElasticRepository
{
    public function __construct(
        private readonly SerializerInterface $serializer
    ) {
    }

    public function findPorRazonSocial(string $nombre): string
    {
        $curlConnection = new GetCurl('/empresa/_search');

        $qry = '{
              "query": {
                "match": {
                  "razon_social": "'.$nombre.'"
                }
              }
           }';

        return $curlConnection->execute($qry);
    }

    public function findEmpresas(): string
    {
        $curlConnection = new GetCurl('/empresa/_search');

        return $curlConnection->execute();
    }

    public function save(Empresa $empresa): string
    {
        $curl = new PutCurl('/empresa/_doc/'.$empresa->getId());

        $json = $this->serializer->serialize($empresa, 'json');
        return $curl->execute($json);
    }
}
