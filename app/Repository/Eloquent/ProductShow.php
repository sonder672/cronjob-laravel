<?php

namespace App\Repository\Eloquent;

use App\Models\Product;
use App\Repository\Contract\IProductShow;

final class ProductShow implements IProductShow
{
    private $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function all()
    {
        return $this->model->all();
    }
}