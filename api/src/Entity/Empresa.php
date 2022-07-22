<?php

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class Empresa
{
    private string $id;
    private string $razonSocial;
    private string $descripcion;
    private ?string $telefono;
    private string $categoria;

    public function __construct(string $razonSocial, string $descripcion, string $telefono, string $categoria)
    {
        $this->id = Uuid::v4()->toRfc4122();

        $this->razonSocial = $razonSocial;
        $this->descripcion = $descripcion;
        $this->telefono = $telefono;
        $this->categoria = $categoria;
    }

    public function getId(): string
    {
        return $this->id;
    }

    
    public function getRazonSocial(): string
    {
        return $this->razonSocial;
    }

    /**
     * @param string $razonSocial
     */
    public function setRazonSocial(string $razonSocial): void
    {
        $this->razonSocial = $razonSocial;
    }

    
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }


    public function setTelefono(?string $telefono): void
    {
        $this->telefono = $telefono;
    }

    
    public function getCategoria(): string
    {
        return $this->categoria;
    }


    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }
}
