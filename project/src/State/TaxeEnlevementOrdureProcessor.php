<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\TaxeEnlevementOrdure;

class TaxeEnlevementOrdureProcessor implements ProcessorInterface
{
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        if ($data instanceof TaxeEnlevementOrdure) {
            $data->calculate();
        }

        return $data;
    }
}