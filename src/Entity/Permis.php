<?php

namespace App\Entity;

use App\Repository\PermisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PermisRepository::class)]
class Permis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typePermis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypePermis(): ?string
    {
        return $this->typePermis;
    }

    public function setTypePermis(string $typePermis): self
    {
        $this->typePermis = $typePermis;

        return $this;
    }
}
