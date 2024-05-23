<?php

namespace App\Controller;

use App\ApiResource\CalculTaxeFonciere;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TaxeFonciereController extends AbstractController
{
    public function __invoke(CalculTaxeFonciere $data): CalculTaxeFonciere
    {
        $data->calculate();
        return $data;
    }
}