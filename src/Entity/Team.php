<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"team:read"}},
 *     denormalizationContext={"groups"={"team:write"}}
 * )
 * @ORM\Entity(repositoryClass=TeamRepository::class)
 */
class Team
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"team:read", "persoon:read", "groep:read", "agenda:read", "training:read", "club:read", "wedstrijd:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"team:read", "team:write", "persoon:read", "groep:read", "agenda:read", "training:read", "club:read", "wedstrijd:read"})
     */
    private $naam;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"team:read", "team:write"})
     */
    private $aantal;

    /**
     * @ORM\ManyToOne(targetEntity=Club::class, inversedBy="clubId")
     * @Groups({"team:write", "persoon:read"})
     */
    private $clubId;

    /**
     * @ORM\OneToMany(targetEntity=Persoon::class, mappedBy="teamId")
     * @Groups({"team:read", "team:write", "groep:write"})
     */
    private $teamId;

    /**
     * @ORM\OneToMany(targetEntity=Training::class, mappedBy="teamId")
     * @Groups({"team:write", "training:write"})
     */
    private $teamid;

    /**
     * @ORM\OneToMany(targetEntity=Wedstrijd::class, mappedBy="teamId")
     * @Groups({"team:write"})
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
