<?php

namespace App\Disengage\Pattern;

use App\Disengage\Pattern\IIntermediaryControllerService;

final class ProxyPattern implements IIntermediaryControllerService
{
    private $service;

    public function __construct(IIntermediaryControllerService $service)
    {
        $this->service = $service;
    }

    public function __invoke(object $dto)
    {
        return $this->service->__invoke($dto);
    }
}
