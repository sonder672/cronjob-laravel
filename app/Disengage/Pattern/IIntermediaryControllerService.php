<?php

namespace App\Disengage\Pattern;

interface IIntermediaryControllerService
{
    public function __invoke(object $dto);
}