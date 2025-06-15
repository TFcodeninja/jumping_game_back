<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column]
    private ?int $lives = null;

    #[ORM\Column]
    private ?int $max_scores = null;

    #[ORM\Column]
    private ?\DateTime $createdat = null;

    #[ORM\Column]
    private ?bool $hasweapon = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getLives(): ?int
    {
        return $this->lives;
    }

    public function setLives(int $lives): static
    {
        $this->lives = $lives;

        return $this;
    }

    public function getMaxScores(): ?int
    {
        return $this->max_scores;
    }

    public function setMaxScores(int $max_scores): static
    {
        $this->max_scores = $max_scores;

        return $this;
    }

    public function getCreatedat(): ?\DateTime
    {
        return $this->createdat;
    }

    public function setCreatedat(\DateTime $createdat): static
    {
        $this->createdat = $createdat;

        return $this;
    }

    public function hasweapon(): ?bool
    {
        return $this->hasweapon;
    }

    public function setHasweapon(bool $hasweapon): static
    {
        $this->hasweapon = $hasweapon;

        return $this;
    }
}
