<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ORM\Entity]
class Artist {
#[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
private ?int $id = null;

#[ORM\Column(length: 255)]
#[Assert\NotBlank]
private string $name;

#[ORM\Column(length: 255)]
private string $style;

#[ORM\OneToMany(mappedBy: "artist", targetEntity: Album::class)]
private $albums;
}

