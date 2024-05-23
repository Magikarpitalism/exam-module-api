<?php

namespace App\ApiResource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use App\State\TaxeEnlevementOrdureProcessor;

#[ApiResource(
    operations: [
        new Post(
            uriTemplate: "/calculate/taxeOrdures",
            processor: TaxeEnlevementOrdureProcessor::class,
            openapiContext: [
                'summary' => 'Calculate garbage removal tax',
                'description' => 'Calculates the garbage removal tax based on the cadastral rental value of the property.'
            ],
            normalizationContext: ['groups' => ['taxeOrdures:read']],
            denormalizationContext: ['groups' => ['taxeOrdures:write']]
        )
    ]
)]
class TaxeEnlevementOrdure
{
    #[Groups(["taxeOrdures:write", "taxeOrdures:read"])]
    #[Assert\NotBlank]
    public float $valeurLocativeCadastrale;

    #[Groups(["taxeOrdures:read"])]
    public float $montantTaxeOrdures;

    public function calculate(): void
    {
        $this->montantTaxeOrdures = $this->valeurLocativeCadastrale * 0.5 * 0.0937;
    }
}
