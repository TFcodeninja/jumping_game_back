<?php

namespace App\Entity;

use App\Repository\ProjectileRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectileRepository::class)]
class Projectile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $speed = null;

    #[ORM\Column(length: 255)]
    private ?string $direction = null;

    #[ORM\Column]
    private ?int $damage = null;

    #[ORM\Column]
    private ?\DateTime $createdat = null;

    #[ORM\Column(length: 255)]
    private ?string $imagepath = null;

    #[ORM\ManyToOne(inversedBy: 'projectiles')]
    private ?Player $player = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpeed(): ?float
    {
        return $this->speed;
    }

    public function setSpeed(float $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getDirection(): ?string
    {
        return $this->direction;
    }

    public function setDirection(string $direction): static
    {
        $this->direction = $direction;

        return $this;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function setDamage(int $damage): static
    {
        $this->damage = $damage;

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

    public function getImagepath(): ?string
    {
        return $this->imagepath;
    }

    public function setImagepath(string $imagepath): static
    {
        $this->imagepath = $imagepath;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }
}
