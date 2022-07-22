<?php

namespace App\Service\Empresa;

use App\Entity\Empresa;
use App\Repository\EmpresaElasticRepository;
use Symfony\Component\HttpFoundation\Request;

class RegistrarEmpresaService
{
    public function __construct(
        private readonly EmpresaElasticRepository $empresaElasticRepository
    ) {
    }

    public function __invoke(Request $request): string
    {
        $data = json_decode($request->getContent(), true);

        $empresa = new Empresa(
            razonSocial: $data['razon_social'],
            descripcion: $data['descripcion'],
            telefono: $data['telefono'],
            categoria: $data['categoria']
        );

        return $this->empresaElasticRepository->save($empresa);

    }
}
