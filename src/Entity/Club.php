<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"club:read"}},
 *     denormalizationContext={"groups"={"club:write"}}
 * )
 * @ORM\Entity(repositoryClass=ClubRepository::class)
 */
class Club
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"club:read", "postcode:read", "persoon:read", "agenda:read", "team:read", "wedstrijd:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"club:read", "club:write", "postcode:read", "persoon:read", "agenda:read", "team:read", "wedstrijd:read"})
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"club:read", "club:write", "postcode:read"})
     */
    private $straat;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"club:read", "club:write", "postcode:read"})
     */
    private $huisnr;

    /**
     * @ORM\OneToMany(targetEntity=Team::class, mappedBy="clubId")
     * @Groups({"club:write", "postcode:read"})
     */
    private $clubId;

    /**
     * @ORM\ManyToOne(targetEntity=Postcode::class, inversedBy="postcodeId")
     * @Groups({"club:read", "club:write", "postcode:write"})
     */
    private $postcodeId;

    /**
     * @ORM\OneToMany(targetEntity=Wedstrijd::class, mappedBy="clubThuis")
     * @Groups({"club:write", "postcode:read"})
     */
    private $wedstrijds;

    /**
     * @ORM\OneToMany(targetEntity=Wedstrijd::class, mappedBy="clubUit")
     * @Groups({"club:write", "postcode:read"})
     */
    private $wedstrijdsuit;

    public function __construct()
    {
        $this->clubId = new ArrayCollection();
        $this->wedstrijds = new ArrayCollection();
        $this->wedstrijdsuit = new ArrayCollection();
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

    public function getStraat(): ?string
    {
        return $this->straat;
    }

    public function setStraat(string $straat): self
    {
        $this->straat = $straat;

        return $this;
    }

    public function getHuisnr(): ?int
    {
        return $this->huisnr;
    }

    public function setHuisnr(int $huisnr): self
    {
        $this->huisnr = $huisnr;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getClubId(): Collection
    {
        return $this->clubId;
    }

    public function addClubId(Team $clubId): self
    {
        if (!$this->clubId->contains($clubId)) {
            $this->clubId[] = $clubId;
            $clubId->setClubId($this);
        }

        return $this;
    }

    public function removeClubId(Team $clubId): self
    {
        if ($this->clubId->removeElement($clubId)) {
            // set the owning side to null (unless already changed)
            if ($clubId->getClubId() === $this) {
                $clubId->setClubId(null);
            }
        }

        return $this;
    }

    public function getPostcodeId(): ?Postcode
    {
        return $this->postcodeId;
    }

    public function setPostcodeId(?Postcode $postcodeId): self
    {
        $this->postcodeId = $postcodeId;

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
            $wedstrijd->setClubThuis($this);
        }

        return $this;
    }

    public function removeWedstrijd(Wedstrijd $wedstrijd): self
    {
        if ($this->wedstrijds->removeElement($wedstrijd)) {
            // set the owning side to null (unless already changed)
            if ($wedstrijd->getClubThuis() === $this) {
                $wedstrijd->setClubThuis(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Wedstrijd[]
     */
    public function getWedstrijdsuit(): Collection
    {
        return $this->wedstrijdsuit;
    }

    public function addWedstrijdsuit(Wedstrijd $wedstrijdsuit): self
    {
        if (!$this->wedstrijdsuit->contains($wedstrijdsuit)) {
            $this->wedstrijdsuit[] = $wedstrijdsuit;
            $wedstrijdsuit->setClubUit($this);
        }

        return $this;
    }

    public function removeWedstrijdsuit(Wedstrijd $wedstrijdsuit): self
    {
        if ($this->wedstrijdsuit->removeElement($wedstrijdsuit)) {
            // set the owning side to null (unless already changed)
            if ($wedstrijdsuit->getClubUit() === $this) {
                $wedstrijdsuit->setClubUit(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->naam;
    }
}
