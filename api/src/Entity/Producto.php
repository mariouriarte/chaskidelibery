<?php

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class Producto
{
    private string $id;
    private string $titulo;
    private string $descripcion;
    private float $precio;
    private string $categoria;
    private int $stock;
    private string $empresa_id;

    public function __construct(
        string $titulo,
        string $descripcion,
        float $precio,
        string $categoria,
        int $stock,
        string $empresa_id
    ) {
        $this->id = Uuid::v4()->toRfc4122();
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->stock = $stock;
        $this->empresa_id = $empresa_id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function getEmpresaId(): string
    {
        return $this->empresa_id;
    }

    public function setEmpresaId(string $empresa_id): void
    {
        $this->empresa_id = $empresa_id;
    }
}
