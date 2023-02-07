<?php

namespace App\Entity;

use App\Repository\BeneficiaireDeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeneficiaireDeRepository::class)]
class BeneficiaireDe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomOrganisme = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOrganisme(): ?string
    {
        return $this->nomOrganisme;
    }

    public function setNomOrganisme(string $nomOrganisme): self
    {
        $this->nomOrganisme = $nomOrganisme;

        return $this;
    }
}
