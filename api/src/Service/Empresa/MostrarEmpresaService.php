<?php

namespace App\Service\Empresa;

use App\Repository\EmpresaElasticRepository;

class MostrarEmpresaService
{
    public function __construct(
        private readonly EmpresaElasticRepository $empresaElasticRepository
    ) {
    }

    public function __invoke(string $razonSocial): string
    {
        return $this->empresaElasticRepository->findPorRazonSocial($razonSocial);
    }
}
