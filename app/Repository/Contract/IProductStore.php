<?php

namespace App\Repository\Contract;

interface IProductStore
{
    public function store(object $dto): void;
}