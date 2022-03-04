<?php

namespace App\Repository\Eloquent;

use App\Models\Product;
use App\Models\Request;
use App\Repository\Contract\IRequestStore;

final class RequestStore implements IRequestStore
{
    private $model;

    public function __construct()
    {
        $this->model = new Request();
    }

    public function store(): void
    {
        $this->model->create();
    }
}