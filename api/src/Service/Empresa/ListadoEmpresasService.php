<?php

namespace App\Service\Empresa;

use App\Repository\EmpresaElasticRepository;

class ListadoEmpresasService
{
    public function __construct(
        private readonly EmpresaElasticRepository $empresaElasticRepository
    ) {
    }

    public function __invoke(): string
    {
        return $this->empresaElasticRepository->findEmpresas();
    }
}
