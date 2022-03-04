<?php

namespace App\Repository\Eloquent;

use App\Models\Product;
use App\Repository\Contract\IProductStore;

final class ProductStore implements IProductStore
{
    private $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function store(object $dto): void
    {
        $this->model->create([
            'name_product' => $dto->nameProduct(),
            'description' => $dto->description(),
            'price' => $dto->price(),
            'state' => $dto->state()
        ]);
    }
}
