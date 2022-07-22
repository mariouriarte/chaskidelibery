<?php

namespace App\Controller;

use App\Service\Empresa\RegistrarEmpresaService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class DomicilioPacienteController
 *
 * Brinda servicios a la web, sus métodos retornan datos
 * del Paciente autenticado
 *
 * @Route("/api/v1/empresa")
 */
class RegistrarEmpresasController extends AbstractFOSRestController
{
    public function __construct(
        private readonly RegistrarEmpresaService $registrarEmpresaService
    ) {
    }

    /**
     * Listado de empresas
     *
     * @Rest\Put ("/")
     *
     * @param Request             $request
     * @param SerializerInterface $serializer
     *
     * @return JsonResponse
     */
    public function execute(Request $request, SerializerInterface $serializer): JsonResponse
    {
        $res = $this->registrarEmpresaService->__invoke($request);

        return new JsonResponse(json_decode($res, true));
    }

}
