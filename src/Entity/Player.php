<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private ?int $maxScore = null;

    #[ORM\Column]
    private ?\DateTime $createdAt = null;

    #[ORM\Column]
    private ?bool $hasWeapon = null;

    /**
     * @var Collection<int, Score>
     */
    #[ORM\OneToMany(targetEntity: Score::class, mappedBy: 'player')]
    private Collection $scores;

    /**
     * @var Collection<int, Projectile>
     */
    #[ORM\OneToMany(targetEntity: Projectile::class, mappedBy: 'player')]
    private Collection $projectiles;

    public function __construct()
    {
        $this->scores = new ArrayCollection();
        $this->projectiles = new ArrayCollection();
    }

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

    public function getMaxScore(): ?int
    {
        return $this->maxScore;
    }

    public function setMaxScore(int $maxScore): static
    {
        $this->maxScore = $maxScore;
        return $this;
    }

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getHasWeapon(): ?bool
    {
        return $this->hasWeapon;
    }

    public function setHasWeapon(bool $hasWeapon): static
    {
        $this->hasWeapon = $hasWeapon;
        return $this;
    }

    /**
     * @return Collection<int, Score>
     */
    public function getScores(): Collection
    {
        return $this->scores;
    }

    public function addScore(Score $score): static
    {
        if (!$this->scores->contains($score)) {
            $this->scores->add($score);
            $score->setPlayer($this);
        }

        return $this;
    }

    public function removeScore(Score $score): static
    {
        if ($this->scores->removeElement($score)) {
            if ($score->getPlayer() === $this) {
                $score->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Projectile>
     */
    public function getProjectiles(): Collection
    {
        return $this->projectiles;
    }

    public function addProjectile(Projectile $projectile): static
    {
        if (!$this->projectiles->contains($projectile)) {
            $this->projectiles->add($projectile);
            $projectile->setPlayer($this);
        }

        return $this;
    }

    public function removeProjectile(Projectile $projectile): static
    {
        if ($this->projectiles->removeElement($projectile)) {
            if ($projectile->getPlayer() === $this) {
                $projectile->setPlayer(null);
            }
        }

        return $this;
    }
}
