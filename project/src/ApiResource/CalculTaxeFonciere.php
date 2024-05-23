<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use App\State\CalculTaxeFonciereProcessor;

#[ApiResource(
    operations: [
        new Post(
            uriTemplate: "/calculate/taxeFonciere",
            processor: CalculTaxeFonciereProcessor::class,
            openapiContext: [
                'summary' => 'Calculate property tax',
                'description' => 'Calculates the property tax based on cadastral value derived from property area and price per square meter.'
            ],
            normalizationContext: ['groups' => ['calculTaxeFonciere:read']],
            denormalizationContext: ['groups' => ['calculTaxeFonciere:write']]
        )
    ]
)]
class CalculTaxeFonciere
{
    #[ApiProperty]
    #[Groups(["calculTaxeFonciere:write", "calculTaxeFonciere:read"])]
    #[Assert\NotBlank]
    public float $surfaceHabitable;

    #[ApiProperty]
    #[Groups(["calculTaxeFonciere:write", "calculTaxeFonciere:read"])]
    #[Assert\NotBlank]
    public float $prixMetreCarre;

    #[ApiProperty]
    #[Groups(["calculTaxeFonciere:read"])]
    public float $montantTaxeFonciere;

    public function calculate(): void
    {
        $this->montantTaxeFonciere = $this->surfaceHabitable * $this->prixMetreCarre * 0.005;
    }
}