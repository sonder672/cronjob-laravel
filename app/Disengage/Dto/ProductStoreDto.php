<?php

namespace App\Disengage\Dto;

final class ProductStoreDto
{
    private $state;
    private $nameProduct;
    private $price;
    private $description;

    public function __construct(bool $state, string $nameProduct, float $price, string $description)
    {
        $this->state = $state;
        $this->nameProduct = $nameProduct;
        $this->price = $price;
        $this->description = $description;
    }

    public function state(): bool
    {
        return $this->state;
    }

    public function nameProduct(): string
    {
        return $this->nameProduct;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function description(): string
    {
        return $this->description;
    }
}
