<?php

namespace App\Entity;

use App\Repository\EnemyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnemyRepository::class)]
class Enemy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $health = null;

    #[ORM\Column]
    private ?int $damage = null;

    #[ORM\Column]
    private ?float $speed = null;

    #[ORM\Column(length: 255)]
    private ?string $size = null;

    #[ORM\Column]
    private ?float $spawnfrequency = null;

    #[ORM\Column(length: 255)]
    private ?string $imagepath = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): static
    {
        $this->health = $health;

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

    public function getSpeed(): ?float
    {
        return $this->speed;
    }

    public function setSpeed(float $speed): static
    {
        $this->speed = $speed;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getSpawnfrequency(): ?float
    {
        return $this->spawnfrequency;
    }

    public function setSpawnfrequency(float $spawnfrequency): static
    {
        $this->spawnfrequency = $spawnfrequency;

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
}
