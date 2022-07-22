<?php

namespace App\Controller;

use App\Service\Empresa\ListadoEmpresasService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
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
class ListadoEmpresasController extends AbstractFOSRestController
{
    public function __construct(
        private readonly ListadoEmpresasService $empresasMostrarService
    ) {
    }

    /**
     * Listado de empresas
     *
     * @Rest\Get ("/")
     *
     * @param SerializerInterface $serializer
     *
     * @return JsonResponse
     */
    public function execute(SerializerInterface $serializer): JsonResponse
    {
        $res = $this->empresasMostrarService->__invoke();

        return new JsonResponse(json_decode($res, true));
    }

}
