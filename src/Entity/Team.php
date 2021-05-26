<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $naam;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aantal;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="clubId")
     */
    private $clubId;

    /**
     * @ORM\OneToMany(targetEntity=Persoon::class, mappedBy="teamId")
     */
    private $teamId;

    /**
     * @ORM\OneToMany(targetEntity=Training::class, mappedBy="teamId")
     */
    private $teamid;

    /**
     * @ORM\OneToMany(targetEntity=Wedstrijd::class, mappedBy="teamId")
     */
    private $wedstrijds;

    public function __construct()
    {
        $this->teamId = new ArrayCollection();
        $this->teamid = new ArrayCollection();
        $this->wedstrijds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getAantal(): ?int
    {
        return $this->aantal;
    }

    public function setAantal(?int $aantal): self
    {
        $this->aantal = $aantal;

        return $this;
    }

    public function getClubId(): ?Club
    {
        return $this->clubId;
    }

    public function setClubId(?Club $clubId): self
    {
        $this->clubId = $clubId;

        return $this;
    }

    /**
     * @return Collection|Persoon[]
     */
    public function getTeamId(): Collection
    {
        return $this->teamId;
    }

    public function addTeamId(Persoon $teamId): self
    {
        if (!$this->teamId->contains($teamId)) {
            $this->teamId[] = $teamId;
            $teamId->setTeamId($this);
        }

        return $this;
    }

    public function removeTeamId(Persoon $teamId): self
    {
        if ($this->teamId->removeElement($teamId)) {
            // set the owning side to null (unless already changed)
            if ($teamId->getTeamId() === $this) {
                $teamId->setTeamId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Wedstrijd[]
     */
    public function getWedstrijds(): Collection
    {
        return $this->wedstrijds;
    }

    public function addWedstrijd(Wedstrijd $wedstrijd): self
    {
        if (!$this->wedstrijds->contains($wedstrijd)) {
            $this->wedstrijds[] = $wedstrijd;
            $wedstrijd->setTeamId($this);
        }

        return $this;
    }

    public function removeWedstrijd(Wedstrijd $wedstrijd): self
    {
        if ($this->wedstrijds->removeElement($wedstrijd)) {
            // set the owning side to null (unless already changed)
            if ($wedstrijd->getTeamId() === $this) {
                $wedstrijd->setTeamId(null);
            }
        }

        return $this;
    }
}
