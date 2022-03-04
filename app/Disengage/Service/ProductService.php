<?php

namespace App\Disengage\Service;

use App\Disengage\Pattern\IIntermediaryControllerService;
use App\Repository\Contract\IProductStore;

final class ProductService implements IIntermediaryControllerService
{
    private $repository;

    public function __construct(IProductStore $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(object $dto)
    {
        $this->repository->store($dto);
    }
}
