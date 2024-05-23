<?php

namespace App\Controller;

use App\ApiResource\CalculTaxeFonciere;
use App\ApiResource\TaxeEnlevementOrdure;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaxeOrduresController extends AbstractController
{
    public function __invoke(TaxeEnlevementOrdure $data): TaxeEnlevementOrdure
    {
        $data->calculate();
        return $data;
    }
}