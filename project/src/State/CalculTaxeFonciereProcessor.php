<?php 

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\ApiResource\CalculTaxeFonciere;

class CalculTaxeFonciereProcessor implements ProcessorInterface
{
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        if ($data instanceof CalculTaxeFonciere) {
            $data->calculate();
        }

        return $data;
    }
}