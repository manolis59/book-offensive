<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[
        ORM\Id,
        ORM\Column(type: 'uuid', unique: true)
    ]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reviews')]
    public User $author;

    #[ORM\ManyToOne(targetEntity: Book::class, inversedBy: 'reviews')]
    public Book $book;

    #[ORM\Column(type: 'integer', nullable: true)]
    public int $note;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    public string $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    public string $body;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
