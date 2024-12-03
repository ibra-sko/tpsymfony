<?php
namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\RangeFilter;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ORM\Entity]
class Song {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private string $title;

    #[ORM\Column(type: "integer")]
    private int $length;

    #[ApiFilter(RangeFilter::class, properties: ['length'])]

    #[ORM\ManyToOne(targetEntity: Album::class, inversedBy: "songs")]
    private ?Album $album;
}
