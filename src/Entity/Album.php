<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource]
#[ORM\Entity]
class Album {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private string $title;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date;

    #[ORM\ManyToOne(targetEntity: Artist::class, inversedBy: "albums")]
    private ?Artist $artist;

    #[ORM\OneToMany(mappedBy: "album", targetEntity: Song::class)]
    private $songs;
}
