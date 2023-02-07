<?php

namespace App\Entity;

use App\Repository\QualificationsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualificationsRepository::class)]
class Qualifications
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomQualification = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomQualification(): ?string
    {
        return $this->nomQualification;
    }

    public function setNomQualification(string $nomQualification): self
    {
        $this->nomQualification = $nomQualification;

        return $this;
    }
}
